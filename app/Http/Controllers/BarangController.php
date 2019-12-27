<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;

class BarangController extends Controller
{
    public function add() {
    	return view('barang.add');
    }

    public function store(Request $request) {				

		$save = [];
		$save['nama_barang'] = $request->nama_barang;
		$save['harga'] = $request->harga;
		$save['stok'] = $request->stok;

		// dd($save);

		Barang::insert($save);
		
		return redirect('barang');
	 
	}

	public function edit($id_barang) {
		$tb_barang = Barang::where('id_barang', decrypt($id_barang))->get();		

		return view('barang.edit',['tb_barang' => $tb_barang]);
	}

	public function update(Request $request) {
		
		Barang::where('id_barang',$request->id_barang)->update([
			'nama_barang' => $request->nama_barang,
			'harga' => $request->harga,
			'stok' => $request->stok
		]);
		
		return redirect('barang');
	}

	public function delete($id) {
		
		$tb_barang = Barang::find(decrypt($id))->delete();
			
		return redirect('barang');
	}
}