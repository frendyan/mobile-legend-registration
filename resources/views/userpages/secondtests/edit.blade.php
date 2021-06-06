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
            <li class="breadcrumb-item"><a href="#">Kategori 2</a></li>
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
              <a href="{{route('indexSecondTest')}}"<i class="fas fa-arrow-left"></i></a>
            </div>              
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('secondtests.update', $secondtest->id) }}" method="POST" enctype="multipart/form-data">
              @csrf             
              @method('PUT')   
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Soal</label>
                  <input type="text" class="form-control" placeholder="Masukkan Pertanyaan" name ="question" value="{{ $secondtest->question }}">
                  @error('question')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Pilihan A</label>
                  <input type="text" class="form-control" placeholder="Masukkan Pilihan A" name ="opt_a" value="{{ $secondtest->opt_a }}">
                  @error('opt_a')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Pilihan B</label>
                  <input type="text" class="form-control" placeholder="Masukkan Pilihan B" name ="opt_b" value="{{ $secondtest->opt_b }}">
                  @error('opt_b')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Pilihan C</label>
                  <input type="text" class="form-control" placeholder="Masukkan Pilihan C" name ="opt_c" value="{{ $secondtest->opt_c }}">
                  @error('opt_c')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Pilihan D</label>
                  <input type="text" class="form-control" placeholder="Masukkan Pilihan D" name ="opt_d" value="{{ $secondtest->opt_d }}">
                  @error('opt_d')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Pilihan E</label>
                  <input type="text" class="form-control" placeholder="Masukkan Pilihan E" name ="opt_e" value="{{ $secondtest->opt_e }}">
                  @error('opt_e')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Jawaban Benar</label>
                  <br>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="key[]" id="customCheckbox1" value="a" {{in_array("a", $keyArr)?"checked":""}}>
                      <label for="customCheckbox1" class="custom-control-label">A</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="key[]" id="customCheckbox2" value="b" {{in_array("b", $keyArr)?"checked":""}}>
                      <label for="customCheckbox2" class="custom-control-label">B</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="key[]" id="customCheckbox3" value="c" {{in_array("c", $keyArr)?"checked":""}}>
                      <label for="customCheckbox3" class="custom-control-label">C</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="key[]" id="customCheckbox4" value="d" {{in_array("d", $keyArr)?"checked":""}}>
                      <label for="customCheckbox4" class="custom-control-label">D</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="key[]" id="customCheckbox5" value="e" {{in_array("e", $keyArr)?"checked":""}}>
                      <label for="customCheckbox5" class="custom-control-label">E</label>
                    </div>
                  </div>
                  @error('key')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Gambar</label>
                  <div class="col-md-4" >
                    <img src="{{ asset('data_file') }}/{{ $secondtest->image }}" alt="" width="400px">
                  </div>
                  <div class="input-group mt-2">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="image" value="{{$secondtest->image}}">
                      <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                    </div>
                  </div>

                  @error('image')
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