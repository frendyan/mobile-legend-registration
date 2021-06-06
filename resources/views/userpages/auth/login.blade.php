@extends('layouts.app')

@section('styles')
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,body{
        background-image: linear-gradient(rgba(89, 126, 247,.8), rgba(89, 126, 247,.8)),  url('data_file/polda.png');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        height: 100%;
        background-color: #597ef7;
        font-family: 'Poppins', sans-serif;
    }

    .container{
        height: 100%;
        align-content: center;
    }

    .card{
        height: 400px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(255,255,255,0.9) !important;
    }

    .social_icon span{
        font-size: 60px;
        margin-left: 0px;
        color: #FFC312;
    }

    .social_icon span:hover{
        color: white;
        cursor: pointer;
    }

    .card-header h3{
        color: white;
    }

    .social_icon{
        position: absolute;
        right: 20px;
        top: -45px;
    }

    .input-group-prepend span{
        width: 50px;
        padding-left: 20px;
        background-color: #597ef7;
        color: white;
        border:0 !important;
    }

    input:focus{
        outline: 0 0 0 0  !important;
        box-shadow: 0 0 0 0 !important;

    }

    .remember{
        color: white;
    }

    .remember input
    {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
    }

    .login_btn{
        color: white;
        background-color: #597ef7;
        width: 100px;
    }

    .login_btn:hover{
        color: white;
        background-color: blue;
    }

    .links{
        color: white;
    }

    .links a{
        margin-left: 4px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-center h-100">

        <div class="card">
            <div class="card-header">
                <h3 style="color: rgb(89, 126, 247);">Login User</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span>
                        <img src="{{url('data_file/sdm.png')}}" style="width: 75px;">
                        <img src="{{url('data_file/polda.png')}}" style="width: 60px;">
                    </span>
                </div>
            </div>
            <div class="card-body" style="margin-top: 20px">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if($errors->any() or Session::get('errors'))
                    <p style="color: red;size: 10px;">{{$errors->first()}}!!</p>
                    @endif
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="user ID" name="uname" required/>
                        @error('uname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" name="password" required/>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <hr style="margin-top:25px;margin-bottom: 25px;">
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection