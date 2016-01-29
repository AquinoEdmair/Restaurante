<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Mesa;
use App\Categoria;
use App\DetallePedido;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
	public function verMesas()
    {
    	$servicios = Mesa::where('activo',1)->orderBy('nombre')->with('estatusmesas')->with('pedido')->get();
        return view('servicios.servicios')->with(compact('servicios'));
    }

    public function obtieneMesas()
    {
    	$mesas = Mesa::where('activo',1)->orderBy('nombre')->with('estatusmesas')->get();
    	return \Response::json(['error' => 'false', 'msg' => $mesas, 'status' => '200'], 200);
    }

    public function actualizaMesa(Request $request)
    {
    	$mesa = Mesa::find($request->idMesa);
    	$mesa->asignacion = 1;
    	$mesa->uuid = $request->uuid;
    	$mesa->save();

    	return \Response::json(['error' => 'false', 'msg' => $mesa, 'status' => '200'], 200);
    }

    public function obtieneCategorias()
    {
    	$categorias = Categoria::where('activo',1)->with('productos')->get();
    	return \Response::json(['error' => 'false', 'msg' => $categorias, 'status' => '200'], 200);
    }

    public function nuevosPedidosmesalaravel($id)
    {
        $mesa = Mesa::where('id',$id)->where('estatusmesas_id',2)->where('activo',1)->with('estatusmesas')->with('pedido')->first();
        $html = "";
        $ids_detallePedido = "";
        if($mesa->pedido){
            if($mesa->pedido->detallespedidos){
                foreach ($mesa->pedido->detallespedidos as $detalle) {
                    $ids_detallePedido .=  $detalle->id.',';
                    $html .='<div class="media">'
                                .'<div class="media-left">'
                                    .'<a href="#">'
                                        .'<img class="media-object" src="'.$detalle->producto->imagen_principal.'" class="thumb" height="75" width="75" alt="a picture">'
                                    .'</a>'
                                .'</div>'
                                .'<div class="media-body">'
                                    .'<ul class="list-group">'
                                        .'<li class="list-group-item">'
                                            .'<font color="black"><strong><td>Nombre:</td></strong></font>'
                                            .'<td> '.$detalle->producto->nombre.' </td>'
                                        .'</li>'
                                        .'<li class="list-group-item">'
                                            .'<font color="black"><strong><td>Descripción:</td></strong></font>'
                                            .'<td> '.$detalle->producto->detalles.' </td>'
                                        .'</li>'
                                        .'<li class="list-group-item">'
                                            .'<font color="black"><strong><td> Cantidad: </td></strong></font>'
                                            .'<font color="red"><td>'.$detalle->cantidad.' &nbsp; &nbsp; &nbsp;</td></font>'
                                            .'<font color="black"><strong><td> Precio: </td></strong></font>'
                                            .'<font color="red"><td>$'.$detalle->precio.' &nbsp; &nbsp; &nbsp;</td></font>'
                                            .'<font color="black"><strong><td> Subtotal: </td></strong></font>'
                                            .'<font color="red"><td>$'.$detalle->subtotal.' </td></font>'
                                        .'</li>'
                                        .'<li class="list-group-item">'
                                            .'<font color="black"><strong><td> Observaciones: </td></strong></font>'
                                            .'<td> '.$detalle->observaciones.' </td>'
                                        .'</li>' 
                                    .'</ul>'
                                .'</div>'
                            .'</div>';
                }
                
            }
        }
        $html2 = "";
        $html2 .='<form action="downNotificationsByMesa" method="post">'       
                    .'<input type="hidden" name="id_mesa" value="'.$id.'">'
                    .'<input type="hidden" name="id_detallePedido" value="'.$ids_detallePedido.'">'
                    .'<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>'
                    .'<button type="submit" class="btn btn-primary arriba">Aceptar</button>'
                .'</form>';
        return \Response::json(['error' => 'false', 'msg' => $html, 'msg2' => $html2 , 'status' => '200'], 200);
    }

    public function pedidosMesalaravel($id)
    {
        $mesa = Mesa::where('id',$id)->where('estatusmesas_id',2)->where('activo',1)->with('estatusmesas')->with('pedidos')->first();
        $html = "";
        if($mesa->pedido){
            if($mesa->pedido->detallespedidostodos){

                foreach ($mesa->pedido->detallespedidostodos as $detalle) {
                    $html .='<div class="media">'
                                .'<div class="media-left">'
                                    .'<a href="#">'
                                        .'<img class="media-object" src="'.$detalle->producto->imagen_principal.'" class="thumb" height="75" width="75" alt="a picture">'
                                    .'</a>'
                                .'</div>'
                                .'<div class="media-body">'
                                    .'<ul class="list-group">'
                                        .'<li class="list-group-item">'
                                            .'<font color="black"><strong><td>Nombre:</td></strong></font>'
                                            .'<td> '.$detalle->producto->nombre.' </td>'
                                        .'</li>'
                                        .'<li class="list-group-item">'
                                            .'<font color="black"><strong><td>Descripción:</td></strong></font>'
                                            .'<td> '.$detalle->producto->detalles.' </td>'
                                        .'</li>'
                                        .'<li class="list-group-item">'
                                            .'<font color="black"><strong><td>Cantidad:</td></strong></font>'
                                            .'<font color="red"><td>'.$detalle->cantidad.' &nbsp; &nbsp; &nbsp;</td></font>'
                                            .'<font color="black"><strong><td>Precio:</td></strong></font>'
                                            .'<font color="red"><td>$'.$detalle->precio.' &nbsp; &nbsp; &nbsp;</td></font>'
                                            .'<font color="black"><strong><td>Subtotal:</td></strong></font>'
                                            .'<font color="red"><td>$'.$detalle->subtotal.' </td></font>'
                                        .'</li>'
                                        .'<li class="list-group-item">'
                                            .'<font color="black"><strong><td>Observaciones:</td></strong></font>'
                                            .'<td> '.$detalle->observaciones.' </td>'
                                        .'</li>' 
                                    .'</ul>'
                                .'</div>'
                            .'</div>';
                }
                
            }
        }
        return \Response::json(['error' => 'false', 'msg' => $html, 'status' => '200'], 200);
    }

    public function downNotificationsByMesa(Request $request)
    {
        $id_mesa = $request->id_mesa;
        if(strlen($request->id_detallePedido) > 0)
        {
            $ids_detallePedido = $myString = trim($request->id_detallePedido, ',');
            $myArray = explode(',', $ids_detallePedido);
            foreach($myArray as $id_detallePedido){
                $detallespedidos = DetallePedido::find($id_detallePedido);
                $detallespedidos->estatusdetallespedidos_id = 2;
                $detallespedidos->save();
            }
        }       
        return redirect()->back();
    }

}
