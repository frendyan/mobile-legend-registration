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
						<h4>Saran atau Keluhan</h4>
						<h5>Masukkan data diri beserta Saran atau Keluhan anda</h5>
					</div>
					<div class="col-1">
						<div class="vl"></div>
					</div>
					<div class="col-7">
						@if ($message = Session::get('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{$message}}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						@endif
						{!! Session::forget('success') !!}
						<form action="{{ route('saranSave') }}" method="POST"  >
							@csrf                
							<div class="card-body">
								<div class="form-group">
									<label for="name">Nama</label>
									<input type="text" class="form-control" placeholder="Masukkan Nama Anda" name ="nama" required>
									@error('nama')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Alamat</label>
									<textarea type="text" class="form-control" placeholder="Masukkan Alamat Anda" name ="alamat" required></textarea>
									@error('alamat')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Email</label>
									<input type="email" class="form-control" placeholder="Masukkan Email Anda" name ="email"  required>
									@error('email')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Saran</label>
									<textarea type="text" class="form-control" placeholder="Masukkan Saran atau Keluhan Anda" name="komentar" required></textarea>
									@error('komentar')
									<p class="text-danger">
										{{ $message }}
									</p>
									@enderror
								</div>
								<button type="submit" class="btn btn-primary float-right">Submit</button>
							</div>
						</form>
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