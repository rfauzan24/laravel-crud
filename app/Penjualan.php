<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = "tb_penjualan";

 
  	public function barang()
    {
    	return $this->belongsTo('App\Barang','id_barang');
    }

    public function pembeli()
    {
    	return $this->belongsTo('App\Pembeli','id_pembeli');
    }
}
