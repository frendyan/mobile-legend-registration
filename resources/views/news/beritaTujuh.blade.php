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
						<img class="d-block w-100" height="500px" src="{{url('data_file/7.png')}}">
					</div>
					<div class="col-1">
						<div class="vl"></div>
					</div>
					<div class="col-7" >
						
						<h1>Evos Legends Kalah, Execration Jadi Juara MSC 2021</h1>
						<div style="text-align: justify;text-justify: inter-word;">Akhirnya, rangkaian pertandingan MSC 2021 telah selesai digelar. Execration, tim asal Filipina menjadi juara dari ajang bergengsi Mobile Legends wilayah Asia Tenggara.
Pertandingan terakhir ditutup oleh laga dari dua tim asal Filipina Blacklist International vs Execration. Kedua tim ini berhasil mengalahkan Evos Legends, tim perwakilan Indonesia di upper bracket dan lower bracket.

Sebelum melaju ke babak grand final, Blacklist Internasional menumbangkan tim Indonesia, Evos Legends dengan skor 3-0 tanpa balas. Lalu di babak lower bracket, Execration berhasil membalaskan dendam mereka setelah kalah dari Evos Legends di upper bracket.Alhasil, kedua tim tersebut mengamankan slot di grand final MSC 2021. Pertandingan pun dimenangkan oleh Execration dengan sinergi dari masing-masing pemain yang luar biasa.

Mekanik permainan yang ditunjukkan Kelra dan teman-temannya sungguh merepotkan rival mereka, Blacklist International. Mereka pun berhasil menang dengan skor telak menjadi 4-1 untuk Execration.

Sedangkan Evos Legends harus ikhlas dengan hasil yang mereka terima. Mereka berada di posisi tiga setelah gagal melaju ke babak grand final, kalah 3-1 dari Execration. Sepertinya, kemenangan yang didapatkan Execration atas Evos Legends, menjadi pemicu semangat mereka untuk menjadi juara MSC 2021. Terbukti Blacklist International dibuat babak belur oleh mereka.

Ini menjadi bukti bahwa tim Mobile Legends asal Filipina memiliki mekanik yang canggih, dan draft hero yang cukup unik. Terbukti dari beberapa meta yang telah mereka ciptakan sejauh ini.

Atas kemenangan yang diperoleh Execration, mereka berhak membawa hadiah sebesar USD 70.000 (sekitar Rp 995 juta). Sedangkan Blacklist International menerima hadiah sebesar USD 30.000 (sekitar Rp 426 juta).

Untuk Evos Legends, karena berada di peringkat ketiga, mereka berhak membawa pulang uang hadiah sebesar USD 15.000 (sekitar Rp 213 juta).
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