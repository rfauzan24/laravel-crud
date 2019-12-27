<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\{Barang, Penjualan};

class PenjualanController extends Controller
{
    public function add() {
    	$ret['tb_barang'] = Barang::get();
    	return view('penjualan.add', $ret);
    }

    public function store(Request $request) {

    	$tb_penjualan = new Penjualan;
        $tb_penjualan->id_barang = $request->id_barang;
        $tb_penjualan->jumlah = $request->jumlah;        
        $tb_penjualan->save();

		// dd($tb_penjualan);
		
		return redirect('penjualan');
	 
	}

	public function edit(Penjualan $Penjualan) {
		$tb_barang = Barang::get();
        $ret['tb_barang'] = $tb_barang;

        $ret['penjualan'] = $penjualan;
        return view('penjualan.edit', $ret);
	}

	public function update(Request $request, Penjualan $Penjualan) {
		
		$penjualan->id_barang = $request->id_barang;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->save();

        return redirect('penjualan')->with('alert-success', 'Berhasil mengubah penjualan');
	}

	public function delete($id) {
		
		$tb_penjualan = Penjualan::find(decrypt($id))->delete();
			
		
		return redirect('penjualan');
	}
}
