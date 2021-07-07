@extends('layouts.master')

@section('title')
<title>Dashboard</title>
@endsection

@section('style')
<style type="text/css">

</style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" height="800px" src="{{url('data_file/slide1.jpg')}}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" height="800px" src="{{url('data_file/slide2.jpg')}}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" height="800px" src="{{url('data_file/slide3.jpg')}}" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-- Content Header (Page header) -->
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content w-100" style="margin-top: 25px;">
    <div class="" style="margin:50px;">
      <div class="row" id="berita">
        <div class="col-auto mr-auto">
          <h4>Tagline Beritas</h4>
        </div>
        <div class="col-auto">
          <form class="form-inline ml-0 ml-md-3">
            <div class="input-group input-group" style="float: right;">
              <input class="form-control form-control-navbar" type="search" placeholder="Enter your email" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-dark" type="submit">
                  Subscribe
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      
      <br>

      <div class="row">
        <div class="row mb-3">
          <div class="col-sm-6">
            <a href="{{route('beritaSatu')}}">
              <img class="img-fluid w-100 mb-3" src="{{url('data_file/1.jpeg')}}" alt="Photo">
              <!-- <p class="carousel-caption">Some text here </p>   -->
              <h4>Keuntungan Push Rank Mobile Legends: Bang Bang di Awal Season</h4>
            </a>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-6">
                <div>
                  <a href="{{route('beritaDua')}}">
                    <img class="img-fluid" src="{{url('data_file/2.jpeg')}}" alt="Photo1">
                    <!-- <p class="carousel-caption">Some text here </p>   -->
                    <h4>Tim Mobile Legends Wanita Bigetron, Juara UniPin Ladies Series MLBB 2021</h4>

                  </a>
                </div>
                <div>
                  <a href="{{route('beritaTiga')}}">
                    <img class="img-fluid w-100" src="{{url('data_file/3.jpg')}}" alt="Photo2">
                    <h4>Season 20 Mobile Legends Berakhir! Dapat Hadiah Apa Saja Ya?</h4>
                  </a>
                </div>
              </div>
              <div class="col-sm-6">
                <div>
                  <a href="{{route('beritaEmpat')}}">
                    <img class="img-fluid" src="{{url('data_file/4.4.jpg')}}" alt="Photo3">
                    <!-- <p class="carousel-caption">Some text here </p>   -->
                    <h4>3 Strategi Populer yang Sering Digunakan di Mobile Legends</h4>
                  </a>
                </div>
                <div>
                  <a href="{{route('beritaLima')}}">
                    <img class="img-fluid" src="{{url('data_file/5.png')}}" alt="Photo4">
                    <h4>Pemain Mobile Legends Andalan RRQ Hoshi Akan Dijual! Siapa Ya?</h4>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col-12 mb-5">
          <div class="row">
            <div class="col-4">
              <img class="img-fluid" src="{{url('data_file/6.png')}}">
            </div>
            <div class="col-8">
              <h4>Build Item Yi Sun-Shin Mobile Legends Ala Ferxiic Evos Legends</h4>
              <p>Meskipun hero-hero di Mobile Legends memiliki skill yang mengerikan. Kenyataannya, mereka tetap membutuhkan sokongan damage dari kombinasi item yang tepat tentunya.
                Hal ini juga bertujuan untuk memberikan counter attack terhadap hero yang digunakan lawan. Oleh sebab itu, build item harus diracik dengan sempurna, untuk menghindari gold yang terbuang sia-sia.
                Belum lama ini, event bergengsi MPL ID Season 7 pun telah selesai digelar. Fakta menariknya, selama turnamen, Ferxiic yang merupakan pro player Evos Legends, telah menggunakan hero Yi Sun-Shin sebanyak 10 kali dengan winrate hingga 80 persen.Terlepas dari mekaniknya yang handal, Ferxiic juga menciptakan kombinasi sempurna dari item yang digunakan. Sebagai referensi detikers, tim detikINET akan memberikan informasi terkait build item hero Yi Sun-Shin rekomendasi Ferxiic yang telah dihimpun dari Instagram Mobile Legends: Bang Bang ID, Selasa (15/6/2021).
              Hal pertama yang harus diperhatikan yakni melak...</p><a href="{{route('beritaEnam')}}"><strong>Read More</strong></a>
            </div>
          </div>
        </div>
        <div class="col-12 mb-5">
          <div class="row">
            <div class="col-4">
              <img class="img-fluid" src="{{url('data_file/7.png')}}">
            </div>
            <div class="col-8">
              <h4>Evos Legends Kalah, Execration Jadi Juara MSC 2021</h4>
              <p>Akhirnya, rangkaian pertandingan MSC 2021 telah selesai digelar. Execration, tim asal Filipina menjadi juara dari ajang bergengsi Mobile Legends wilayah Asia Tenggara.
                Pertandingan terakhir ditutup oleh laga dari dua tim asal Filipina Blacklist International vs Execration. Kedua tim ini berhasil mengalahkan Evos Legends, tim perwakilan Indonesia di upper bracket dan lower bracket.

                Sebelum melaju ke babak grand final, Blacklist Internasional menumbangkan tim Indonesia, Evos Legends dengan skor 3-0 tanpa balas. Lalu di babak lower bracket, Execration berhasil membalaskan dendam mereka setelah kalah dari Evos Legends di upper bracket.Alhasil, kedua tim tersebut mengamankan slot di grand final MSC 2021. Pertandingan pun dimenangkan oleh Execration dengan sinergi dari masing-masing pemain yang luar biasa.

                Mekanik permainan yang ditunjukkan Kelra dan teman-temannya sungguh merepotkan rival mereka, Blacklist International. Mereka pun berhasil menang dengan skor telak menjadi 4-1 untuk Execration.

              Sedangkan Evos Legends harus ikhlas dengan hasil yang mereka terima. Mereka berada di posisi tiga s...</p><a href="{{route('beritaTujuh')}}"><strong>Read More</strong></a>
            </div>
          </div>
        </div>


      </div>

      <br>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection