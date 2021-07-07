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
						<img class="d-block w-100" height="500px" src="{{url('data_file/6.png')}}">
					</div>
					<div class="col-1">
						<div class="vl"></div>
					</div>
					<div class="col-7" >
						
						<h1>Build Item Yi Sun-Shin Mobile Legends Ala Ferxiic Evos Legends</h1>
						<div style="text-align: justify;text-justify: inter-word;">Meskipun hero-hero di Mobile Legends memiliki skill yang mengerikan. Kenyataannya, mereka tetap membutuhkan sokongan damage dari kombinasi item yang tepat tentunya.
Hal ini juga bertujuan untuk memberikan counter attack terhadap hero yang digunakan lawan. Oleh sebab itu, build item harus diracik dengan sempurna, untuk menghindari gold yang terbuang sia-sia.

Belum lama ini, event bergengsi MPL ID Season 7 pun telah selesai digelar. Fakta menariknya, selama turnamen, Ferxiic yang merupakan pro player Evos Legends, telah menggunakan hero Yi Sun-Shin sebanyak 10 kali dengan winrate hingga 80 persen.Terlepas dari mekaniknya yang handal, Ferxiic juga menciptakan kombinasi sempurna dari item yang digunakan. Sebagai referensi detikers, tim detikINET akan memberikan informasi terkait build item hero Yi Sun-Shin rekomendasi Ferxiic yang telah dihimpun dari Instagram Mobile Legends: Bang Bang ID, Selasa (15/6/2021).

Hal pertama yang harus diperhatikan yakni melakukan setting terhadap emblemnya. Pastikan formula yang kalian gunakan yaitu fokus pada peningkatan Fatal dan Swift.

Kemudian sebagai langkah akhir, pilih Weakness Finder. Lalu jangan lupa menggunakan spell Retribution sebelum memulai pertandingan.

Tujuannya, selain spell utama hero core, ini juga menjadi bagian dari terbentuknya item pertama yaitu Raptore Machete. Selanjutnya kalian bisa membuat Swift Boots untuk menambah kecepatan hero dalam bergerak dan melakukan serangan.

Untuk item berikutnya mungkin tergantung dari kebutuhan para pemain. Namun karena Yi Sun-Shin di sini sebagai core, sehingga membutuhkan damage yang besar dari awal permainan.

Jadi, item Blade of Despair menjadi pilihan yang tepat. Lalu diikuti oleh Endless Battle agar dapat menciptakan Lifesteal dan true damage setelah menggunakan skill.

Selanjutnya membuat Queen's Wings untuk mengurangi cooldown dan memberikan sedikit pertahanan. Terakhir kalian bisa membuat Demon Hunter Swords.

Namun perlu diingat, ini hanya sebagai referensi saja. Karena setiap build item, biasanya akan opsional mengikuti kondisi permainan yang sedang berlangsung.
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