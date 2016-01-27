<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EstatusMesa;

class Mesa extends Model
{
    protected $table = 'tbl_mesas';

    public function estatusmesas(){
        return $this->hasOne('App\EstatusMesa','id','estatusmesas_id');
    }

    public function pedidos(){
        return $this->hasOne('App\Pedido','id','mesas_id');
    }
}
