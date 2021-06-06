@extends('layouts.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Ubah Soal</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Kategori 3</a></li>
            <li class="breadcrumb-item"><a href="#">CAT</a></li>
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

      <!-- Main content -->
      <div class="row" >

        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card ">
            <div class="card-header">               
              <a href="{{route('indexThirdTest')}}"<i class="fas fa-arrow-left"></i></a>
            </div>              
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('thirdtests.update', $thirdtest->id) }}" method="POST" enctype="multipart/form-data">
              @csrf             
              @method('PUT')   
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Kolom</label>
                  <div class="row justify-content-around">
                    <div class="col-2">
                      <input type="text" name="column" class="form-control" placeholder="Kolom ke - " value="{{$thirdtest->column}}">
                    </div>
                    <div class="col-9">
                      
                    </div>
                  </div>
                  @error('column')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Soal</label>
                  <div class="row justify-content-around">
                    <div class="col-2">
                      <input type="text" maxlength="1" name="question[]" class="form-control" placeholder="-1-" value="{{$question[0]}}">
                    </div>
                    <div class="col-2">
                      <input type="text" maxlength="1" name="question[]" class="form-control" placeholder="-2-" value="{{$question[1]}}">
                    </div>
                    <div class="col-2">
                      <input type="text" maxlength="1" name="question[]" class="form-control" placeholder="-3-" value="{{$question[2]}}">
                    </div>
                    <div class="col-2">
                      <input type="text" maxlength="1" name="question[]" class="form-control" placeholder="-4-" value="{{$question[3]}}">
                    </div>
                    <div class="col-2">
                    </div>
                  </div>
                  @error('question')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Pilihan</label>
                  <div class="row justify-content-around">
                    <div class="col-2">
                      <input type="text" maxlength="1" class="form-control" placeholder="A" name="opt_a" value="{{ $thirdtest->opt_a }}" required>
                    </div>
                    <div class="col-2">
                      <input type="text" maxlength="1" class="form-control" placeholder="B" name="opt_b" value="{{ $thirdtest->opt_b }}" required>
                    </div>
                    <div class="col-2">
                      <input type="text" maxlength="1" class="form-control" placeholder="C" name="opt_c" value="{{ $thirdtest->opt_c }}" required>
                    </div>
                    <div class="col-2">
                      <input type="text" maxlength="1" class="form-control" placeholder="D" name="opt_d" value="{{ $thirdtest->opt_d }}" required>
                    </div>
                    <div class="col-2">
                      <input type="text" maxlength="1" class="form-control" placeholder="E" name="opt_e" value="{{ $thirdtest->opt_e }}" required>
                    </div>
                  </div>
                  @error('opt_a')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                  @error('opt_b')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                  @error('opt_c')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                  @error('opt_d')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                  @error('opt_e')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Jawaban Benar</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="key" value="000">
                    <option value="{{strtolower($thirdtest->key)}}" selected>{{ucwords($thirdtest->key)}}</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                    <option value="e">E</option>
                  </select>
                  @error('key')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Save</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </section>
  </div>

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
  @endsection