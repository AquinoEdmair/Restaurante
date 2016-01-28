<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Mesa;
use App\Categoria;
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


    public function nuevosPedidosmesa($id)
    {
        $mesa = Mesa::where('id',$id)->where('estatusmesas_id',2)->where('activo',1)->with('estatusmesas')->with('pedido')->get();
        return \Response::json(['error' => 'false', 'msg' => $mesa, 'status' => '200'], 200);
    }


}
