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
					<img class="d-block w-100" height="500px" src="{{url('data_file/1.svg')}}" alt="First slide">
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
				<div class="row justify-content-around">
					<div class="col-4 text-center" style="margin-top: auto;margin-bottom: auto;">
						<h4>Pendaftaran Sukses !!!</h4>
					</div>
					<div class="col-1">
						<div class="vl"></div>
					</div>
					<div class="col-7">
						<h4>Team {{$datas[1]->team_name}}</h4>
						<br>
						<h4>ID : {{$datas[1]->registration_id}}</h4>
						<br>
						@foreach($datas as $data)
						<h5>Anggota {{$loop->index+1}}</h5>
							<table class="table">
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td>{{$data->nik}}</td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td>{{$data->nama}}</td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td>{{$data->jk}}</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td>{{$data->alamat}}</td>
							</tr>
							<tr>
								<td>Telepon</td>
								<td>:</td>
								<td>{{$data->telp}}</td>
							</tr>
							<tr>
								<td>Provinsi</td>
								<td>:</td>
								<td>{{$data->provinsi}}</td>
							</tr>
							<tr>
								<td>Kecamatan</td>
								<td>:</td>
								<td>{{$data->kecamatan}}</td>
							</tr>
							<tr>
								<td>Kota</td>
								<td>:</td>
								<td>{{$data->kota}}</td>
							</tr>
							<tr>
								<td>Kode Pos</td>
								<td>:</td>
								<td>{{$data->pos}}</td>
							</tr>
							<tr>
								<td>Tempat Lahir</td>
								<td>:</td>
								<td>{{$data->tempat_lahir}}</td>
							</tr>
							<tr>
								<td>Foto</td>
								<td>:</td>
								<td>
									<a href="{{ url('/data_file/'.$data->foto) }}" data-toggle="lightbox" data-title="Gambar Soal" >
										<img src="{{ url('/data_file/'.$data->foto) }}" width=100px class="img-fluid mb-2" alt="white sample"/>
									</a>
								</td>
							</tr>

						</table>

						<hr>
						@endforeach

						
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