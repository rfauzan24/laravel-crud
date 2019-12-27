@extends('layouts.main')

@section('container')

@section('title', 'Data Barang')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Barang</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Barang</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <a href="{{url('barang/add')}}" class="btn btn-success float-right">Tambah</a>
      </div><!-- /.col -->      
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
	<div class="container-fluid">
		<div class="card mb-2">            
            <div class="card-body">
              <table id="order-listing" class="table table-bordered table-striped">
                <thead>
                <tr>                	
                	<th>Nama Barang</th>
                	<th>Harga</th>
                	<th>Stok</th>
                	<th>#</th>
                </tr>
                </thead>
                <tbody>


                @foreach($tb_barang as $tba)

                <tr>                	
                	<td>{{ $tba->nama_barang }}</td>
                	<td style="text-align: center;">{{ $tba->harga }}</td>
                	<td style="text-align: center;">{{ $tba->stok }}</td>
                	<td style="text-align: center;">
                        <a class="btn btn-warning btn-sm btn-action" title="Edit" 
                        href="{{ url('barang/edit/'.encrypt($tba->id_barang)) }}">
                            <i class="fa fa-pen"></i>
                        </a>
                        <a class="btn btn-danger btn-sm btn-action" title="Hapus" 
                        onclick="return confirm('Apakah yakin menghapus data ini ?')" 
                        href="{{ url('barang/delete/'.encrypt($tba->id_barang)) }}" style="color: white">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>

                @endforeach

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
	</div>
</div>

<style type="text/css">
	th{
		text-align: center;
	}
</style>

@endsection

@section('page-script')

<script src="{{asset('vendor')}}/datatables/jquery.dataTables.js"></script>
<script src="{{asset('vendor')}}/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<link rel="stylesheet" href="{{asset('vendor')}}/datatables-bs4/css/dataTables.bootstrap4.css">

<script>
    (function($) {
        'use strict';
        $(function() {
        $('#order-listing').DataTable({
            "aLengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
            ],
            "iDisplayLength": 10,
            "language": {
            search: ""
            }
        });
        $('#order-listing').each(function() {
            var datatable = $(this);
            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
            var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
            search_input.attr('placeholder', 'Search');
            search_input.removeClass('form-control-sm');
            // LENGTH - Inline-Form control
            var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
            length_sel.removeClass('form-control-sm');
        });
        });
    })(jQuery);
</script>

@endsection