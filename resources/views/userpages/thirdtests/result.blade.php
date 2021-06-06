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
@section('style')
<style type="text/css">
  table{border-collapse:collapse}
  th,td{padding:10px}
  .popup{display:none;position:absolute;background:#ccc;border-radius:6px;padding:10px;}
</style>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          {!! Session::forget('success') !!}
          <!-- /.row -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="margin-top: 3px">Hasil Tes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body"  style="display: block;position: relative;height: 100%;overflow: auto;">
              <div class="row align-items-center">
                <div class="col-12 col-md-12 col-lg-6 order-2 order-md-1">
                  <div class="row ">
                    <!-- <div class="col-12 col-sm-4">
                      <div class="info-box bg-light">
                        <div class="info-box-content">
                          <span class="info-box-text text-center text-muted">Kecerdasan</span>
                          <hr>
                          @if(!empty($secondscore[0]))
                          <span class="info-box-number text-center mb-0" style="color: green">{{$secondscore[0]->correct}} Jawaban Benar</span>
                          <span class="info-box-number text-center mb-0" style="color: red">{{$secondscore[0]->incorrect}} Jawaban Salah</span>
                          @else
                          <span class="info-box-number text-center mb-0" style="color: red">Belum Ujian</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-sm-4">
                      <div class="info-box bg-light">
                        <div class="info-box-content">
                          <span class="info-box-text text-center text-muted">Kepribadian</span>
                          <hr>
                          @if(!empty($firstscore[0]))
                          <span class="info-box-number text-center mb-0" style="color: green">{{$firstscore[0]->correct}} Jawaban Benar</span>
                          <span class="info-box-number text-center mb-0" style="color: red">{{$firstscore[0]->incorrect}} Jawaban Salah</span>
                          @else
                          <span class="info-box-number text-center mb-0" style="color: red">Belum Ujian</span>
                          @endif
                        </div>
                      </div>
                    </div> -->
                    <div class="col-12 col-sm-4">
                      <div class="info-box bg-light">
                        <div class="info-box-content">
                          <span class="info-box-text text-center text-muted">Kecermatan</span>
                          <hr>
                          @if(!empty($thirdscore[0]))
                          <span class="info-box-number text-center mb-0" style="color: green">{{$thirdscore[0]->correct}} Jawaban Benar</span>
                          <span class="info-box-number text-center mb-0" style="color: red">{{$thirdscore[0]->incorrect}} Jawaban Salah</span>
                          @else
                          <span class="info-box-number text-center mb-0" style="color: red">Belum Ujian</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 order-2 order-md-1" align="center">
                  <img src="https://image.freepik.com/free-vector/employer-meeting-job-applicant-pre-employment-assessment-employee-evaluation-assessment-form-report-performance-review-concept-illustration_335657-2058.jpg" width="400">   
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>      
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @section('js')
  <script type = "text/javascript" >  
    history.pushState(null, document.title, location.href);
    window.addEventListener('popstate', function (event)
    {
      history.pushState(null, document.title, location.href);
    });  
  </script> 
  @endsection