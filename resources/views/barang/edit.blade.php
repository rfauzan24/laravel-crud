@extends('layouts.main')

@section('container')

@section('title', 'Edit Data Barang')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Data Barang</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
          <li class="breadcrumb-item active">Edit Data Barang</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content-header">
	<div class="container-fluid">
		<div class="col-md-12">            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Barang</h3>
              </div>

              @foreach ($tb_barang as $tba)
              
              <form action="{{ action('BarangController@update', $tba->id_barang) }}" method="post">

              	{{ csrf_field() }}

                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" 
                    value="{{ $tba->nama_barang }}">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" placeholder="Harga" name="harga" 
                    value="{{ $tba->harga }}">
                  </div>
                  <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" placeholder="Stok" name="stok" 
                    value="{{ $tba->stok }}">
                  </div>
                </div>

                @endforeach                

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
	</div>
	
</div>

@endsection