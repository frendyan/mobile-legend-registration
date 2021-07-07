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
						<img class="d-block w-100" height="500px" src="{{url('data_file/3.jpg')}}">
					</div>
					<div class="col-1">
						<div class="vl"></div>
					</div>
					<div class="col-7" >
						
						<h1>Season 20 Mobile Legends Berakhir! Dapat Hadiah Apa Saja Ya?</h1>
						<div style="text-align: justify;text-justify: inter-word;">Selama tiga bulan, penggemar Mobile Legends telah melewati season kompetitif yang diadakan oleh Moonton. Mobile Legends: Bang Bang Season 20 pun saat ini sudah berakhir.
Seperti biasa, terdapat hadiah menarik yang bisa didapatkan para player. Nantinya, hadiah tersebut dikirimkan ke dalam mailbox di dalam game setelah season berakhir.

Untuk hadiah yang ditawarkan cukup beragam. Moonton mengkategorikan sesuai dengan tier atau status peringkat rank yang dimiliki oleh pemain.
Kali ini, Skin Crow Magician, menjadi hadiah utama yang diberikan oleh Moonton. Ini merupakan skin eksklusif hero Kaja, yang hanya dapat diperoleh dari hadiah season.

Setiap season, developer Mobile Legends menyiapkan skin eksklusif berbeda-beda. Mulai dari hero Marksman, Tank, Fighter, Assassin, Mage dan Support.

Namun khusus season 20 kali ini, mereka menghadirkan skin untuk hero Kaja yang memiliki dua role yakni Fighter sekaligus Support. Selain skin eksklusif Crow Magician, pemain juga berkesempatan mendapatkan battle point dan ticket.

Lalu khusus pemain yang mendapatkan gelar Mythic, akan mendapatkan bonus tambahan berupa battle emote logo Mythic dengan durasi pemakaian hingga 100 hari.

Jumlah battle point yang didapatkan berbeda-beda setiap tier. Mulai dari 1.000 hingga yang tertinggi di tier Mythic yaitu 20.000 battle point.

Lalu ticket yang didapatkan pun berbeda pula, mulai dari 100 hingga 1.500. Ticket yang diperoleh bisa digunakan untuk membeli item tertentu di menu shop.

Sedangkan Battle Point berguna untuk membeli hero dan beberapa item tertentu di shop.

Semua pencapaian yang didapatkan pada season 20 akan diatur ulang. Seperti contohnya, bila pemain mencapai rank tertinggi Mythic, maka setelah season berakhir akan disesuaikan dengan season baru dan tier berubah menjadi Epic.

Jadi apa tier tertinggi kalian di Mobile Legends: Bang Bang season 20, detikers?
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