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
						<img class="d-block w-100" height="500px" src="{{url('data_file/4.4.jpg')}}">
					</div>
					<div class="col-1">
						<div class="vl"></div>
					</div>
					<div class="col-7" >
						
						<h1>3 Strategi Populer yang Sering Digunakan di Mobile Legends</h1>
						<div style="text-align: justify;text-justify: inter-word;">Seperti halnya bermain game online lainnya, dalam permainan Mobile Legends juga diperlukan strategi yang matang untuk memperoleh kemenangan. Apakah sejauh ini detikers sudah menggunakan strategi yang tepat?
Berdasarkan pengalaman tim detikINET bermain Mobile Legends: Bang Bang, sudah banyak strategi yang digunakan oleh rekan satu tim maupun lawan. Namun setidaknya ada 3 strategi populer yang sering digunakan, terutama pada season 20.

Strategi pertama yang sering muncul dalam permainan yaitu meta Diggie feeder. Kemudian ada meta push turret dan terakhir meta dua hero support. Berikut ulasan singkat mengenai 3 strategi populer yang sering digunakan di Mobile Legends.
<h2>Meta Diggie Feeder</h2>
<p>Strategi ini menggunakan hero support, yakni Diggie, dengan terus menempel hero core lawan. Sederhananya, Diggie harus berupaya untuk mengganggu proses farming-nya.

Oleh sebab itu, spell Retribution sangat dianjurkan. Agar sesekali ia dapat mencuri monster buff lawan baik merah ataupun yang ungu.

Misi lain dari Diggie Feeder yaitu untuk membuat dirinya terbunuh oleh hero core lawan. Karena bila hero core lawan membunuh Diggie hingga lebih dari 8 kali, maka gold yang didapatkan akan semakin sedikit.

Lalu hero lawan tersebut akan menjadi celengan gold bagi tim lainnya. Karena ketika ia terbunuh, maka yang membunuh hero tersebut akan mendapatkan gold lebih banyak.</p>
<h2>Meta Push Turret</h2>
<p>Ini merupakan meta baru yang mengandalkan kombinasi haram dari hero Bane, Faramis dan Selena. Strategi ini sangat populer di media sosial TikTok dan Youtube.

Menyebalkannnya, meta ini mengabaikan mekanik permainan dan hanya fokus untuk push turret di satu lane hingga ke dalam base lawan. Sudah jelas, prosesnya mengandalkan sang tokoh utama yaitu Bane.

Mengandalkan kemampuan pasif yang dimiliki Bane, lalu didukung dengan Ultimate dari Faramis. Sehingga walaupun keadaan tidak ada minions dan mati di dalam turret, dua hero tersebut akan bangkit kembali.

Untuk Selena sendiri sebenarnya opsional saja. Karena dalang dari meta tuuret Mobile Legends ini lebih mengarah kepada Bane.</p>
<h2>Meta 2 Hero Support</h2>
<p>Seperti namanya, meta ini mengandalkan dua hero support yang ada di Mobile Legends. Namun untuk support yang sering digunakan biasanya Angela, Rafaela atau Estes.

Untuk pilihan hero core-nya bisa menggunakan Aldous, Brody, Yi Sun-Shin, Alucard, Dyroth atau hero yang memang kalian handal menggunakannya. Meta dua support ini sangat populer dan sering digunakan oleh tim asal Filipina di MSC 2021.

Mereka biasanya menjatuhkan pilihan hero core kepada Aldous. Hal ini mengingat damage yang luar biasa besar jika stack yang dikumpulkan Aldous sudah banyak.</p>
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