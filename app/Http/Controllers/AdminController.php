<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Mesa;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
	public function verMesas()
    {
    	$servicios = Mesa::where('activo',1)->with("estatusmesas")->get();
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

}
