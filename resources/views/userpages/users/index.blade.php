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
            <li class="breadcrumb-item"><a href="#">Users</a></li>
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
      <section class="content">
      <div class="row">
        <div class="col-12">
            <!-- @if ($message = Session::get('success'))
                <div class="alert alert-success pb-0">
                    <p>{{ $message }}</p>
                </div>
            @endif -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">User List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr>
                    <th>No</th>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Status</th>                    
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  @if(empty($users[0]))
                  <td colspan="8" align="center">{{"(data empty)"}}</td>
                  @else
                  @foreach ($users as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->uname }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->password_unhash }}</td>
                        <td>
                            @if($user->active===1){{"Active"}}
                            @elseif($user->active===0){{"Disabled"}}
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">                                                            
                                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>

                                @csrf
                                @method('DELETE')                                            
                                <button onclick="return confirm('Are you sure delete {{$user->uname }}?')" type="submit" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @endif
                </tbody>                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                
            </div>
           
        </div>
    </div>                
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</section>
    </div>
    <!-- /.content-wrapper -->
    @endsection