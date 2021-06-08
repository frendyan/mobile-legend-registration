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
	<div class="content-header">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" height="250px" src="{{url('data_file/1.svg')}}" alt="First slide">
				</div>
				
			</div>
			
		</div>
	</div>
	<!-- Content Header (Page header) -->
	<!-- /.content-header -->
	<!-- Main content -->
	<div class="content w-100">
		<div class="card">
			<div class="card-body">
				{{dd(Session::get('success'))}}
				@if ($message = Session::get('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{$message}}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
				{!! Session::forget('success') !!}
				<form action="{{ route('searchKonfirmasi') }}" method="GET" enctype="multipart/form-data">
					@csrf 
					<div class="row justify-content-center">
						<div class="col-4">
							<div class="form-group">
								<label for="name">ID Registrasi</label>
								<input type="text" class="form-control" placeholder="Masukkan ID Registrasi Anda" name ="rid" value="{{ old('rid') }}" required>
								@error('team_name')
								<p class="text-danger">
									{{ $message }}
								</p>
								@enderror
								<button type="submit" class="btn btn-primary float-right w-100 mt-2">Cari</button>
							</div>	
						</div>
					</div>
				</form>
				<div class="row justify-content-center">
					<div class="col-10">
						@if(!empty($datas[0]))
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
								@foreach($datas as $data)                     
								<tr align="center">
									<td width="5%">{{$loop->index+1}}</td>
									<td width="10%">{{$data->registration_id}}</td>
									<td width="10%">{{$data->team_name}}</td>
									<td >
										@if($data->status==='0')
										<span class="badge badge-warning text-dark" style="font-size: 14px;">Menunggu Validasi</span>
										@elseif($data->status==='1')
										<span class="badge badge-success text-white" style="font-size: 14px;">Diterima</span>
										@elseif($data->status==='2')
										<span class="badge badge-danger text-white" style="font-size: 14px;">Ditolak</span>
										@endif
									</td>
									<td>
									</td>           
								</tr>
								@endforeach
							</tbody>                
						</table>
						@endif
					</div>
				</div>
			</div>
		</div>


	</div>
	<!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection

@section('js')


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

<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script type="text/javascript">

	//lightbox
	$(function () {
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox({
				alwaysShowClose: true
			});
		});
	})
</script>
@endsection