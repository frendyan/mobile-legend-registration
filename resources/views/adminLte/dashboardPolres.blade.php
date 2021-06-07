@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Menu</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-md-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h4>{{$totalUserSenpi}} Pemohon</h4>
              <h5>{{$totalUserSenpiNot}} Belum upload berkas</h5>


              <p> Rikpsi Senpi</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-person"></i>
           <!--  </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>   -->
        </div>
        <div class="col-lg-3 col-md-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h4>{{$totalUserTugas}} Pemohon</h4>
              <h5>{{$totalUserTugasNot}} Belum upload berkas</h5>

              <p>Rikpsi Tugas Khusus</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-person"></i>
            <!-- </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div> -->
        </div>
        <div class="col-lg-3 col-md-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h4>{{$totalUserMapping}} Pemohon</h4>
              <h5>{{$totalUserMappingNot}} Belum upload berkas</h5>

              <p> Mapping Psikologi</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-person"></i>
           <!--  </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>  --> 
        </div>
      </div>

      <!--  --> <!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --> 
      <!--  --> <!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --> 
      <!--  --> <!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --> 
      <!--  --> <!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --> 
      <!--  --> <!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --> 
      <!--  --> <!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  --><!--  -->

      <!-- Main row -->
 </div>
</section>
</div>
@endsection

@section('js')
@endsection