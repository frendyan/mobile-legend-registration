@extends('layouts.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Create</a></li>
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add User</h3>
            </div>              
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('users.store') }}" method="POST">
              @csrf                
              <div class="card-body">
                <div class="form-group">
                  <label for="name">User ID</label>
                  <input type="text" class="form-control" placeholder="Enter Username" name="uname" value="{{ old('uname') }}">
                  @error('uname')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Nama Peserta</label>
                  <input type="text" class="form-control" placeholder="Enter Name" name ="name" value="{{ old('name') }}">
                  @error('name')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" >

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password Confirmation</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_confirmation">
                  @error('password')
                  <p class="text-danger">
                    {{ $message }}
                  </p>                        
                  @enderror
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
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