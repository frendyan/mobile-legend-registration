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
          <img class="d-block w-100" height="800px" src="{{url('data_file/1.svg')}}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" height="800px" src="{{url('data_file/2.svg')}}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" height="800px" src="{{url('data_file/3.svg')}}" alt="Third slide">
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
          <h4>Tagline Berita</h4>
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
            <a href="">
              <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
              <p class="carousel-caption">Some text here </p>  

            </a>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-6">
                <div>
                  <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo1">
                  <p class="carousel-caption">Some text here </p>  
                </div>
                <div>
                  <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo2">
                  <p class="carousel-caption">Some text here </p>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo3">
                <p class="carousel-caption">Some text here </p>  

                <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo4">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

      <br>

      <div class="row">
        <div class="col-12 mb-5">
          <div class="row">
            <div class="col-4">
              <img class="img-fluid" src="{{url('data_file/1.svg')}}">
            </div>
            <div class="col-8">
              <h4>Informasi</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><a href="#"><strong>Read More</strong></a>
            </div>
          </div>
        </div>
         <div class="col-12 mb-5">
          <div class="row">
            <div class="col-4">
              <img class="img-fluid" src="{{url('data_file/1.svg')}}">
            </div>
            <div class="col-8">
              <h4>Informasi</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><a href="#"><strong>Read More</strong></a>
            </div>
          </div>
        </div>

      
      </div>
      
      <br>
      
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>

              <p class="card-text">
                Some quick example text to build on the card title and make up the bulk of the card's
                content.
              </p>

              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>

          <div class="card card-primary card-outline">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>

              <p class="card-text">
                Some quick example text to build on the card title and make up the bulk of the card's
                content.
              </p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div><!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title m-0">Featured</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Special title treatment</h6>

              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>

          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="card-title m-0">Featured</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Special title treatment</h6>

              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection