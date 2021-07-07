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
					<img class="d-block w-100" height="500px" src="{{url('data_file/slide2.jpg')}}" alt="First slide">
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
						<img class="d-block w-100" height="500px" src="{{url('data_file/5.png')}}">
					</div>
					<div class="col-1">
						<div class="vl"></div>
					</div>
					<div class="col-7" >
						
						<h1>Pemain Mobile Legends Andalan RRQ Hoshi Akan Dijual! Siapa Ya?</h1>
						<div style="text-align: justify;text-justify: inter-word;">Dirumorkan bahwa ada pemain andalan RRQ Hoshi yang masuk transfer list. Kabarnya pemain tersebut akan berpindah ke rival mereka, Evos Legends.
Melalui live streaming yang dilakukan bersama oleh beberapa tokoh Mobile Legends ternama di Nimo TV, sebuah informasi terkait pemain transfer list tercuat. Hal ini pun cukup menggegerkan para streamer ketika disampaikan oleh CEO Alter Ego, Delwyn Sukamto.
Delwyn memang tidak memberikan informasi detail terkait siapa player yang dimaksud dan akan berlabuh ke mana nantinya. Namun pemain Evos Legends, Luminaire, memberikan tanggapan perihal pernyataan darinya.

Dari tanggapan yang diberikan Luminaire, ia seolah sudah mengetahui player yang dimaksud. Bahkan Luminaire menegaskan bahwa pemain itu nantinya akan satu tim dengannya di Evos Legends.

"Iya gua tau. Jangan ditarik ke tim GPX, itu calon satu tim sama gua," ungkap Luminaire.

Informasi ini berawal dari pertanyaan Lumienaire kepada Delwyn berhubungan dengan pemain transfer di Alter Ego. Namun Delwyn memilih untuk tidak berkomentar, dan lebih memilih membocorkan informasi terkait transfer list pemain RRQ Hoshi.

Bursa transfer pro player Mobile Legends memang selalu diminati oleh para penggemarnya. Ini menjadi informasi penting yang harus diketahui penggemar, agar mengetahui siapa saja roster yang akan membela tim kebanggaan mereka.

Sedikit informasi, beredar juga kabar mengenai kapten RRQ Hoshi, Vyn, yang dikabarkan akan rehat di MPL ID Season 8, dan menjadi pemain yang masuk transfer list. CEO, RRQ, Andrian Pauline Husen atau kerap disapa Pak AP pun memberikan tanggapan melalui DM Instagram terkait berita tersebut kepada netizen.

"Sabar-sabar jangan emosi. Tidak ada yang mau lepas siapa-siapa kok," tulis AP.

Tim detikINET juga sudah menghubungi langsung pihak RRQ. Mereka mengatakan akan memberikan jawaban lengkap pada waktunya
					</div>
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