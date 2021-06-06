@extends('layouts.master')
  
@section('content')

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">User Profiles</h1>
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
            <div class="card ">
              <div class="card-header">               
                <a href="{{route('users.index')}}"<i class="fas fa-arrow-left"></i></a>
              </div>              
              <!-- /.card-header -->
              <!-- form start -->
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                  @csrf             
                  @method('PUT')   
                  <div class="card-body">
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" name ="name" value="{{$user->name}}">
                    @error('name')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" placeholder="Enter Userame" name="uname" value="{{$user->uname}}" disabled="True">
                    <input type="hidden" name="uname" value="{{$user->uname}}"/>
                    @error('uname')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Referral</label>
                    <input type="text" class="form-control" placeholder="Enter Referral" name="reff" value="{{$reff[0]['upline_name']}}" disabled>
                    <input type="hidden" name="reff" value="{{$user->upline_name}}"/>
                    @error('reff')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                  </div>

                   <div class="form-group">
                    <label for="name">Level</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="level" value="000">
                        <option value="{{$user->level}}" selected disabled>{{ucwords($user->level)}}</option>
                        <option value="member" selected>Member</option>
  											<option value="manager1">Manager1</option>
  											<option value="manager2">Manager2</option>
  											<option value="manager3">Manager3</option>
										</select>
                    @error('level')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                  </div>    

                  <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" value="{{$user->phone}}" >
                    @error('phone')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="email" value="{{$user->email}}" >

                    @error('email')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="(Password Unchanged)" name="password" value="">

                    @error('password')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">PIN Code</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="(Unset)" name="pincode" value="{{$user->pincode}}"  >

                    @error('email')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                  </div>

                   <div class="form-group">
                    <label for="name">Status</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                      @if($user->active === 0)
                        <option value="0" selected>Disabled</option>
  											<option value="1">Active</option>
                      @elseif($user->active === 1)
                        <option value="0">Disabled</option>
                        <option value="1" selected>Active</option>
                      @endif											
										</select>
                    @error('status')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                  </div>    

                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="{{$user->password}}">
                    @error('password')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password Confirmation</label>
                    <input type="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_confirmation">
                    @error('password_confirmation')
                      <p class="text-danger">
                        {{ $message }}
                      </p>                        
                    @enderror
                  </div> -->
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