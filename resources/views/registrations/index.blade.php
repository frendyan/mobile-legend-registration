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
						<h4>Pendaftaran</h4>
						<h5>Isikan Data diri anda</h5>
					</div>
					<div class="col-1">
						<div class="vl"></div>
					</div>
					<div class="col-7">
						<form action="{{ route('daftarSave') }}" method="POST" enctype="multipart/form-data">
							@csrf                
							<div class="card-body">
								<div class="form-group">
									<label for="name">NIK</label>
									<input type="text" class="form-control" placeholder="Masukkan NIK Anda" name ="nik" value="{{ old('nik') }}" required>
									@error('nik')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Nama</label>
									<input type="text" class="form-control" placeholder="Masukkan Nama Anda" name="nama" value="{{ old('nama') }}" required>
									@error('uname')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Jenis Kelamin</label>
									<select class="form-control" name="jk" required>
										<option value="Laki-laki"> Laki-laki</option>
										<option value="Perempuan"> Perempuan</option>
									</select>
									@error('jk')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Tempat Lahir</label>
									<input type="text" class="form-control" placeholder="Masukkan Tempat Lahir Anda" name ="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
									@error('tempat_lahir')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Provinsi</label>
									<select class="form-control" id="provinsicb" name="provinsi" required>
										<option value="Provinsi A"> Provinsi A</option>
										<option value="Provinsi B"> Provinsi B</option>
									</select>
									@error('kecamatan')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Kecamatan</label>
									<select class="form-control" id="kecamatancb" name="kecamatan" required>
										<option value="Kecamatan A">Kecamatan A</option>
										<option value="Kecamatan B">Kecamatan B</option>
									</select>
									@error('kecamatan')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Kota</label>
									<input type="text" class="form-control" placeholder="Masukkan Kota Asal Anda" name ="kota" value="{{ old('kota') }}" required>
									@error('pos')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Alamat</label>
									<textarea class="form-control" placeholder="Masukkan Alamat Anda" name ="alamat" value="{{ old('alamat') }}" required></textarea>
									@error('alamat')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">POS</label>
									<input type="text" maxlength="5" class="form-control" placeholder="Masukkan Kode Pos Anda" name ="pos" value="{{ old('pos') }}" required>
									@error('pos')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Telepon</label>
									<input type="text" maxlength="13" class="form-control" placeholder="Masukkan Nomor Telepon yang Bisa Dihubungi" name ="telp" value="{{ old('telp') }}" required>
									@error('telp')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Foto Anda</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
											<label class="custom-file-label" for="exampleInputFile">Belum ada file dipilih</label>
										</div>
									</div>
									@error('image')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								
							</div>
							<!-- /.card-body -->
							<button type="submit" class="btn btn-primary float-right">Submit</button>
						</form>
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
@endsection