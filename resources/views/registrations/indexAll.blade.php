@extends('layouts.master')

@section('title')
<title>Pendaftaran</title>
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
							<th>Reg ID</th>
							<th>Nama Team</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(empty($datas[0]))
						<tr>
							<td colspan="10" align="center">{{"(Belum ada data)"}}</td>
						</tr>
						@else      
						@foreach($datas as $data)                     
						<tr align="center">
							<td width="5%">{{$loop->index+1}}</td>
							<td width="10%">{{$data->registration_id}}</td>
							<td width="10%">{{$data->team_name}}</td>
							<td >
								@if($data->status===0)
								<span class="badge badge-warning text-dark" style="font-size: 14px;">Menunggu Validasi</span>
								@elseif($data->status===1)
								<span class="badge badge-success text-white" style="font-size: 14px;">Diterima</span>
								@elseif($data->status===2)
								<span class="badge badge-danger text-white" style="font-size: 14px;">Ditolak</span>
								@endif
							</td>
							<td>
								<form action="{{ route('registrations.destroy',$data->id) }}" method="POST">                                                            
									<a href="{{route('registrations.show', $data->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i></a>
									@csrf
									@method('DELETE')                                            
									<button onclick="return confirm('Hapus Berkas ini?')" type="submit" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i></button>
								</form>
							</td>           
						</tr>
						@endforeach
						@endif
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