@extends('layouts.main')

@section('container')

@section('title', 'Edit Data Penjualan')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Data Penjualan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Data Penjualan</a></li>
          <li class="breadcrumb-item active">Edit Data Penjualan</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content-header">
	<div class="container-fluid">
		<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Penjualan</h3>
                </div>            

                <form action="{{ action('PenjualanController@update', $penjualan) }}" method="post">

              	{{ csrf_field() }}

                <div class="card-body">
                    <div class="form-group">
                    <label for="" class="form-control-label">Nama Barang :</label>
                    <select class="form-control" name="id_barang" required="">
                        <option selected="" disabled="" value="">Pilih Barang</option>
                        @foreach($tb_barang as $tba)
                        <option value="{{$tba->id_barang}}" {{$tba->id_barang == $penjualan->id_barang ? 'selected' : ''}}>{{ $tba->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="form-group">
                        <label for="harga">Jumlah</label>
                        <input type="text" class="form-control" placeholder="Jumlah Barang" name="jumlah" id="jumlah">
                    </div>                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
	</div>
	
</div>

@endsection