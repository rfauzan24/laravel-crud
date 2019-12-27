<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "tb_barang";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_barang";
}
