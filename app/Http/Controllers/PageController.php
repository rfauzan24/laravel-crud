<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\{Barang, Penjualan};

class PageController extends Controller
{
    public function index(){
        return view('index');
    }

    public function barang(){
        $tb_barang = Barang::all();
    	return view('barang.table', ['tb_barang' => $tb_barang]);
    }

    public function penjualan(){
        $ret['tb_penjualan'] = Penjualan::with('barang')->get();
		return view('penjualan.table', $ret);
    }
}
