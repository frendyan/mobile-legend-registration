@extends('layouts.master')

@section('title')
<title>News - Keuntungan Push Rank Mobile Legends: Bang Bang di Awal Season</title>
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
					<img class="d-block w-100" height="500px" src="{{url('data_file/slide1.jpg')}}" alt="First slide">
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
						
						<h1>Keuntungan Push Rank Mobile Legends: Bang Bang di Awal Season</h1>
						<div style="text-align: justify;text-justify: inter-word;">Mobile Legends: Bang Bang kini memasuki season 21, yang mana semua pencapaian peringkat, baik hero maupun tier rank diatur ulang. Sehingga pemain harus kembali berjuang untuk mendapatkan semua pencapaian sebelumnya.
						Umumnya, setiap perubahan season, peringkat rank diubah ke tier Legend V ke bawah seperti Epic atau Grandmaster, bahkan turun ke Master, Elite atau mungkin bisa hingga Warrior bilang jarang memainkannya.

						Namun dengan semakin handalnya para pemain, saat ini mencapai tier Mythic jauh lebih mudah dibandingkan dulu. Sedihnya, sebesar apapun poin Mythic yang didapatkan, ketika reset season akan kembali ke Epic atau Legend V.
<h2>Bertemu Lawan Mudah</h2>
						Ketika berada di Epic, bila beruntung, pemain akan bertemu dengan lawan yang lebih mudah. Hal ini mengingat ketika reset season, penghuni Epic tetap bersemayam di lingkaran tier tersebut, atau tenggelam ke Grandmaster.
						Besar kemungkinan juga pemain bertemu dengan lawan yang memiliki tier di bawah Epic yaitu Grandmaster. Ini kan menjadikan pertandingan lebih mudah, karena sudah biasa bertanding melawan pemain di tier lebih tinggi, yakni Mythic.
						<h2>Lebih Mudah Push Poin Hero</h2>
						<p>Tidak hanya peringkat rank saja, tetapi peringkat hero di leaderboard juga akan diatur ulang. Sehingga poin yang telah dikumpulkan oleh pemain akan berubah tidak seperti sebelumnya.

						Sebagai contoh bila kalian memiliki poin lebih dari 3.000, maka akan dirubah menjadi 1.800 hingga 1.900 poin. Ini berlaku untuk semua pemain.

						Jadi kesempatan kalian untuk menduduki peringkat satu di top lokal dan global jauh lebih besar. Karena perbedaan poin hero-nya tidak terlalu jauh seperti sebelumnya</p>
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