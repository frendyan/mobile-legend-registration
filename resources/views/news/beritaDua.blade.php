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
						<img class="d-block w-100" height="500px" src="{{url('data_file/2.jpeg')}}">
					</div>
					<div class="col-1">
						<div class="vl"></div>
					</div>
					<div class="col-7" >
						
						<h1>Tim Mobile Legends Wanita Bigetron, Juara UniPin Ladies Series MLBB 2021</h1>
						<div style="text-align: justify;text-justify: inter-word;">Turnamen Mobile Legends wanita terbesar di Indonesia telah selesai digelar. Belletron Era, Tim Mobile Legends wanita dari tim Bigetron Esports, berhasil menjadi juara.
Kemenangan yang didapatkan tidaklah mudah, BTR Vival dan kawan-kawan harus berupaya mengalahkan rival mereka di final. Motivasi tinggi dan sinergi yang dihasilkan, membuahkan hasil setelah mengalahkan Evos Lynx dengan skor akhir 3-2.

Alhasil, divisi wanita Bigetron Esports ini berhak membawa pulang hadiah senilai Rp 30 juta setelah berhasil menjadi juara pertama. Diikuti oleh Evos Lynx di posisi kedua dan Morph Akasha di posisi ketiga.Turnamen UniPin Ladies Series MLBB 2021 sendiri, memiliki nilai total hadiah terbesar dalam kategori turnamen esports wanita di Indonesia. Nilainya pun mencapai Rp 100 juta.

Poeti Fatima, General Manager UniPin, menjelaskan bahwa total hadiah tersebut merupakan bentuk apresiasi bagi para pemain. Ia menegaskan berupaya membentuk sistem pertandingan dengan penuh tantangan.

"Maka, prizepool yang kami berikan tentunya harus sepadan dengan perjuangan yang dilalui para tim dari sepanjang rangkaian turnamen," kata Poeti.

Selain dari para penggemar, penyelenggara turnamen UniPin Ladies Series Mobile Legends: Bang Bang (MLBB) 2021, juga mendapatkan dukungan dari seluruh ekosistem esports Indonesia.

Ashadi Ang, Ketua Bidang Humas & Komunikasi PB Esports Indonesia, memberikan sokongan penuh melalui penyediaan venue di kantor pusat PB ESI. Tak luput pula dijalankan dengan standar protokol kesehatan (prokes) yang ketat.

"Kami telah menilai agenda dan rangkaian kegiatan babak playoff UniPin Ladies Series MLBB 2021 dan seluruh standar prokes yang dijalankan sangat baik," kata Ashadi

"Hal ini dapat menjadi referensi bagi penyelenggaraan turnamen esports online maupun offline tidak hanya untuk perempuan, tapi secara umum di Indonesia," tambahnya.
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