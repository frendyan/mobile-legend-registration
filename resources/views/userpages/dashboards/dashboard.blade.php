@extends('userpages.layouts.master')

@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">

      <div class="row" style="padding-top: 20px;">
        <div class="col-md-3 col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="user-panel d-flex">
                <div class="image" style="height: 50px;">
                  <img src="{{url('data_file/profile.png')}}" class="img-circle elevation-0 mt-2" style="width: 70px;" alt="User Image">
                </div>
                <div class="info ml-3 mt-1">
                  <a href="#" class="d-block text-dark">{{Auth::user()->uname}}</a>            
                  <a class="text-secondary">{{Auth::user()->name}}</a>
                  <p class="text-secondary">
                    @if(Auth::user()->test_type==='senpi')
                    {{'Rikpsi Senjata Api'}}
                    @elseif(Auth::user()->test_type==='mapping')
                    {{'Mapping Psikologi'}}
                    @elseif(Auth::user()->test_type==='tugaskhusus')
                    {{'Rikpsi Tugas Khusus'}}
                    @endif
                  </p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-12">
          <div class="card">

            <div class="row" align="center">

              <div class="col-12">

                @if($inTime == 1)
                <div style="background-color: yellow;padding: 15px;">
                    <h5 align="center">Pemeriksaan psikologi {{$testType}} akan dibuka pada jam yang telah ditentukan</h5>
                </div>
                @endif
                <img class="img-fluid" width="900" src="https://img.freepik.com/free-vector/concept-new-team-member_132971-312.jpg?size=626&ext=jpg">    
              </div>

              <div class="col-12" align="center" style="padding-bottom: 50px;">
                <h4 class="mb-1" align="center">Selamat datang di sistem CAT POLDA</h4>
                <br>

                @if($inTime == 0)
                <p class="card-text" align="center">Klik tombol dibawah ini untuk memulai ujian.</p>
                <br>
                @endif
                <a href="{{route('guideRiwayatHidup')}}" class="btn btn-lg pb-50" style="background-color: #349CAF;color: white;"><strong>LANJUT</strong></a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
</div>
@endsection

