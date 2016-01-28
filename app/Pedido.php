<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'tbl_pedidos';

    public function detallespedidos(){
        return $this->hasMany('App\DetallePedido','pedidos_id','id')->with('producto')->where('estatusdetallespedidos_id',1);
    }

    public function detallespedidostodos(){
        return $this->hasMany('App\DetallePedido','pedidos_id','id');
    }
}
