<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Mesa;

class AdminController extends BaseController
{
	public function verMesas()
    {
    	$servicios = Mesa::where('activo',1)->with("estatusmesas")->get();
    	return view('servicios.servicios')->with(compact('servicios'));
    }

}
