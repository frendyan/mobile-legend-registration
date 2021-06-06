@extends('userpages.layouts.master')
@section('jstop')
<script type = "text/javascript" >  
  history.pushState(null, document.title, location.href);
  window.addEventListener('popstate', function (event)
  {
    history.pushState(null, document.title, location.href);
  });  
</script> 
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">

</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- <div class="card-header"> -->
            <!-- <h5 class="card-title m-0">Selamat Datang {{Auth::user()->name}}</h5> -->
            <!-- </div> -->
            <div class="card-body" align="center">
              <div class="row mb-5 justify-content-around">
                <div class="col-12" align="left">
                  <!-- <a href="{{route('dashboard')}}"> <i class="fas fa-arrow-left"></i></a> -->
                  <h5 class="mb-3" align="center">Tahapan Ujian</h5>
                  <div class="row align-items-center justify-content-around" style="padding-bottom: 20px;">
                    <div class="col-12 col-md-6 col-lg-2 mb-1 mt-1">
                      <div style="height:50px;padding:10px;border-radius: 10px; background-color: #349CAF;" align="center">
                        <p class="text-white font-weight-bold text-uppercase text-sm">Riwayat Hidup</p>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 mb-1 mt-1">
                      <div style="height:50px;padding:10px;border-radius: 10px; background-color: lightblue;" align="center">
                        <p class="text-white font-weight-bold text-uppercase text-sm">Inventory</p>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 mb-1 mt-1">
                      <div style="height:50px;padding:10px;border-radius: 10px; background-color: lightblue;" align="center">
                        <p class="text-white font-weight-bold text-uppercase text-sm">Kecerdasan</p>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 mb-1 mt-1">
                      <div style="height:50px;padding:10px;border-radius: 10px; background-color: lightblue;" align="center">
                        <p class="text-white font-weight-bold text-uppercase text-sm">Kepribadian</p>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 mb-1 mt-1">
                      <div style="height:50px;padding:10px;border-radius: 10px; background-color: lightblue;" align="center">
                        <p class="text-white font-weight-bold text-uppercase text-sm">Kecermatan</p>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-around">
                    <div class="col-12 col-md-8 col-lg-6">
                      <img style="margin:auto;" src="https://image.freepik.com/free-vector/business-people-studying-list-rules-reading-guidance-making-checklist_74855-10492.jpg" width="500"> 
                    </div>
                  </div>
                  <p>Petunjuk :</p>
                  <ul>
                    <li>Telitilah soal terlebih dahulu, perangkat soal terdiri dari 15 soal pilihan
                    ganda dan 4 soal uraian.</li>
                    <li>Tidak diperkenankan membuka buku atau catatan apapun atau
                    bekerjasama dengan siswa lain.</li>
                    <li>Waktu untuk mengerjakan adalah 60 menit</li>
                    <li>Setelah mulai tidak bisa kembali</li>
                  </ul>
                </div>
                <div class="col-6">
                  <br>
                  <a href="{{route('indexRiwayatHidupUser')}}" class="btn btn-primary" style="width: 300px; background-color: #349CAF; border-color: #349CAF">Mulai</a> 
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
  @stop

  