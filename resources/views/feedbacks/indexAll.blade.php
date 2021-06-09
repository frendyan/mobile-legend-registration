@extends('layouts.master')

@section('title')
<title>Kotak Saran</title>
@endsection

@section('style')
<style>
	.vl {
		border-left: 2px solid lightgrey;
		height: 100%;
	}
</style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content w-100" style="margin-top: 100px;">
		<div class="card-header">
			<h4>Data Pendaftar</h4>
		</div>
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{$message}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		{!! Session::forget('success') !!}
		<div class="card">
			<div class="card-header">
				<h3 class="card-title" style="margin-top: 3px">Data Berkas</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body"  style="display: block;position: relative;height: 100%;overflow: auto;">
				<table id="example1" class="table table-hover table-striped table-bordered">
					<thead>
						<tr align="center">
							<th>No</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Email</th>
							<th>Saran atau Keluhan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datas as $data)                     
						<tr align="center">
							<td>{{$loop->index+1}}</td>
							<td>{{$data->nama}}</td>
							<td>{{$data->alamat}}</td>
							<td >{{$data->email}}</td>
							<td>
								{{$data->komentar}}
							</td>
						</tr>
						@endforeach
					</tbody>                
				</table>
			</div>
		</div>


	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
</script>

<!-- DataTables -->
<script src="{{URL :: asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL :: asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL :: asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL :: asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- page script -->
<script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
@endsection