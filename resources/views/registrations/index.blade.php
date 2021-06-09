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

								@for($i=0;$i<6; $i++)
								@if($i===0)
								<div style="display: block;" id="div{{$i}}">
									<div class="form-group">
										<label for="name">Nama Tim</label>
										<input type="text" class="form-control" placeholder="Masukkan Nama Team Anda" name ="team_name" required>
										@error('team_name')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<button type="button" style="float: right;width: 100%;" class="btn btn-primary" onclick="nextSoal('{{$i}}');return false;">Selanjutnya</button>

								</div>
								@elseif($i===5)
								<div style="display: none;" id="div{{$i}}">
									<h5>Masukkan Data Anggota {{$i}}</h5>
									<div class="form-group">
										<label for="name">NIK</label>
										<input type="text" class="form-control" placeholder="Masukkan NIK Anda" name ="nik{{$i}}" required>
										@error('nik')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Nama</label>
										<input type="text" class="form-control" placeholder="Masukkan Nama Anda" name="nama{{$i}}" required>
										@error('nama')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Jenis Kelamin</label>
										<select class="form-control" name="jk{{$i}}" required>
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
										<input type="text" class="form-control" placeholder="Masukkan Tempat Lahir Anda" name ="tempat_lahir{{$i}}" required>
										@error('tempat_lahir')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Provinsi</label>
										<select class="form-control" id="provinsicb" name="provinsi{{$i}}" required>
											<option value="Provinsi A"> Provinsi A</option>
											<option value="Provinsi B"> Provinsi B</option>
										</select>
										@error('provinsi')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Kecamatan</label>
										<select class="form-control" id="kecamatancb" name="kecamatan{{$i}}" required>
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
										<input type="text" class="form-control" placeholder="Masukkan Kota Asal Anda" name ="kota{{$i}}" required>
										@error('kota')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Alamat</label>
										<textarea class="form-control" placeholder="Masukkan Alamat Anda" name ="alamat{{$i}}" required></textarea>
										@error('alamat')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">POS</label>
										<input type="text" maxlength="5" class="form-control" placeholder="Masukkan Kode Pos Anda" name ="pos{{$i}}" required>
										@error('pos')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Telepon</label>
										<input type="text" maxlength="13" class="form-control" placeholder="Masukkan Nomor Telepon yang Bisa Dihubungi" name ="telp{{$i}}" required>
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
												<input type="file" class="custom-file-input" id="exampleInputFile" name="foto{{$i}}">
												<label class="custom-file-label" for="exampleInputFile">Belum ada file dipilih</label>
											</div>
										</div>
										@error('foto')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<button type="button" style="float: left;" class="btn btn-primary" onclick="prevSoal('{{$i}}');return false;">Sebelumnya</button>

									<button type="submit" class="btn btn-primary float-right">Submit</button>
								</div>
								@else

								<div style="display: none" id="div{{$i}}">
									<h5>Masukkan Data Anggota {{$i}}</h5>
									
									<div class="form-group">
										<label for="name">NIK</label>
										<input type="text" class="form-control" placeholder="Masukkan NIK Anda" name ="nik{{$i}}" required>
										@error('nik')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Nama</label>
										<input type="text" class="form-control" placeholder="Masukkan Nama Anda" name="nama{{$i}}" required>
										@error('nama')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Jenis Kelamin</label>
										<select class="form-control" name="jk{{$i}}" required>
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
										<input type="text" class="form-control" placeholder="Masukkan Tempat Lahir Anda" name ="tempat_lahir{{$i}}" required>
										@error('tempat_lahir')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Provinsi</label>
										<select class="form-control" id="provinsicb" name="provinsi{{$i}}" required>
											<option value="Provinsi A"> Provinsi A</option>
											<option value="Provinsi B"> Provinsi B</option>
										</select>
										@error('provinsi')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Kecamatan</label>
										<select class="form-control" id="kecamatancb" name="kecamatan{{$i}}" required>
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
										<input type="text" class="form-control" placeholder="Masukkan Kota Asal Anda" name ="kota{{$i}}" required>
										@error('kota')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Alamat</label>
										<textarea class="form-control" placeholder="Masukkan Alamat Anda" name ="alamat{{$i}}" required></textarea>
										@error('alamat')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">POS</label>
										<input type="text" maxlength="5" class="form-control" placeholder="Masukkan Kode Pos Anda" name ="pos{{$i}}" required>
										@error('pos')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Telepon</label>
										<input type="text" maxlength="13" class="form-control" placeholder="Masukkan Nomor Telepon yang Bisa Dihubungi" name ="telp{{$i}}" required>
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
												<input type="file" class="custom-file-input" id="exampleInputFile" name="foto{{$i}}">
												<label class="custom-file-label" for="exampleInputFile">Belum ada file dipilih</label>
											</div>
										</div>
										@error('foto')
										<p class="text-danger">
											{{ $message }}
										</p>
										@enderror
									</div>
									<button type="button" style="float: left;" class="btn btn-primary" onclick="prevSoal('{{$i}}');return false;">Sebelumnya</button>

									<button type="button" style="float: right;" class="btn btn-primary" onclick="nextSoal('{{$i}}');return false;">Selanjutnya</button>

								</div>

								@endif
								@endfor

							</div>
							<!-- /.card-body -->
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
<script type="text/javascript">

	function nextSoal(index){
		var x = document.getElementById('div'+index);

		// var navSoal = document.getElementById('nav'+index);
		// navSoal.classList.add('btn-success');
		// navSoal.classList.remove('btn-secondary');

		index++;
		console.log("index y = "+index);
		var y = document.getElementById("div"+index);
		console.log("divx ke - ."+x+".");
		console.log("divy ke - ."+y+".");
		x.style.display = "none";
		y.style.display = "block";

	}

	function prevSoal(index){
		var x = document.getElementById('div'+index);

		// var navSoal = document.getElementById('nav'+index);
		// navSoal.classList.add('btn-success');
		// navSoal.classList.remove('btn-secondary');

		index--;
		console.log("index y = "+index);
		var y = document.getElementById("div"+index);
		console.log("divx ke - ."+x+".");
		console.log("divy ke - ."+y+".");
		x.style.display = "none";
		y.style.display = "block";

	}
</script>

@endsection