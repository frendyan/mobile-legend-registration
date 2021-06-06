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
            <li class="breadcrumb-item"><a href="#">Detail</a></li>
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
      <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">              
              <!-- /.card-header -->
              <!-- form start -->             
                <div class="card-body">
                    <div class="row">
                    <div class="col-1">
                        <a href="{{route('users.index')}}"<i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-6">

                    <table class="table table-borderless">                    
                    <tbody>
                        <form action="{{ route('users.store') }}" method="POST">
                        @csrf  
                        <tr>
                        <th scope="row">Full Name</th>
                        <td>{{$users[0] -> name}}  </td>                        
                        </tr>
                        <tr>
                        <th scope="row">Userame</th>
                        <td>{{$users[0] -> uname}}  </td>                        
                        </tr>

                        @if($users[0]->level !== "admin")
                        <tr>
                        <th scope="row">Referral</th>
                        <td>{{$users[0] -> upline_name}}  </td>                        
                        </tr>
                        @endif 
                       
                        <tr>
                        <th scope="row">Email</th>
                        <td>{{$users[0] -> email}}  </td>                        
                        </tr>
                        <tr>
                        <th scope="row">Phone</th>
                        <td>{{$users[0] -> phone}}  </td>                        
                        </tr>
                        <tr>
                        <th scope="row">Status</th>
                        <td>
                            @if($users[0]->active===1)
                            {{'Active'}}
                            @elseif($users[0]->active===0)
                            {{'Inactive'}}
                            @endif
                        </td>                        
                        </tr>
                        <!-- <tr>
                        <th scope="row">Password</th>
                        <td>{{$users[0] -> password}}  </td>                        
                        </tr> -->
                        <tr>
                        <th scope="row">Level</th>
                        <td>{{$users[0] -> level}}  </td>                        
                        </tr>
                        <tr>
                        <th scope="row">PIN Code</th>
                        <td>@if(empty($users[0]->pincode))
                            {{'(Unset)'}}
                            @else
                            {{$users[0]->pincode}}
                            @endif </td>                        
                        </tr>
                        <tr>
                        <th scope="row">Date Joined</th>
                        <td>{{$users[0] -> created_at}}  </td>                        
                        </tr>
                         
                        
                        </tr>
                        </form>
                    </tbody>

                    </table>                                   
                </div>
                </div>
                <!-- /.card-body -->                          
            </div>
            </div>
            <!-- /.card -->

     </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</section>
    </div>
@endsection