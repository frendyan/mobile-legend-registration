<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="x-ua-compatible" content="ie=edge">

 @yield('title')

 <!-- Font Awesome Icons -->
 <link rel="stylesheet" href="{{URL::asset('plugins/fontawesome-free/css/all.min.css')}}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{URL::asset('dist/css/adminlte.min.css')}}">
 <link rel="stylesheet" href="{{URL::asset('plugins/ekko-lightbox/ekko-lightbox.css')}}">

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

 <!-- DataTables -->
 <link rel="stylesheet" href="{{URL :: asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{URL :: asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
 <title>Print Kartu Team</title>

 <style type="text/css">
  {
    --webkit-print-color-adjust: exact !important;
  }
  body {
    background-image: url("https://4.bp.blogspot.com/-5SPyduPr3EY/Uk6MY4DF1kI/AAAAAAAAPqA/XY32vO-BGOk/s0/Borderlands+game+HD+wallpapers.jpg") !important;
    padding-top: 70px;
    --webkit-print-color-adjust: exact !important;
  }

  .panel.panel-default {
    background-image: url("http://www.androidwallpapercentral.com/downloads/AndroidWallpaperAbstractBlackShapes.jpg") !important;
    background-position: center;
    border-color: #272a4d;
    -webkit-animation: tada 1s;
    animation: tada 1s;
    -webkit-box-shadow: 8px 11px 5px -6px rgba(0, 0, 0, 1);
    -moz-box-shadow: 8px 11px 5px -6px rgba(0, 0, 0, 1);
    box-shadow: 8px 11px 5px -6px rgba(0, 0, 0, 1);
  }

  h5 {
    color: #f4b211;
  }

  h3 {
    color: #eae374;
    font-size: 20px;
    font-weight: bolder;
  }

  p {
    font-16px;
    color: #fff;
  }

  .img-responsive {
    border-style: solid;
    border-width: 2px;
    border-color: #f8f8f8;
  }

  .fa {
    color: #f4b211;
  }

  .btn-default {
    background-color: #f4b211;
    color: #222;
    border: 0;
    border-radius: 0;
    font-weight: bolder;
  }

  a{
    color:#f4a900;
  }

  @media print {
    * {
      -webkit-print-color-adjust: exact;
    }
  }

</style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="row text-center">
        @foreach($datas as $data)
        <div class="col-md-4 mt-5">
          <div class="panel panel-default">
            <div class="panel-body">
              <img src="https://assets.jalantikus.com/assets/cache/0/0/tips/2017/08/23/hero-marksman-mobile-legends-banner.jpeg" class="img-fluid" alt="Responsive image">
              <h5>Kartu Peserta</h5>
              <h5>Mobile Legend Tournament</h5>
              <br>
              <h3>- {{$data->team_name}} -</h3>
              <p>{{strtoupper($data->nama)}}</p>
              <p class=text-center>custom text mau diisi apa engga</p>
              <br>
              <div class="row">
                <div class="col-md-4">
                  <!-- <i class="fa fa-share fa-2x" aria-hidden="true"></i> -->
                </div>
                <div class="col-md-4">
                 <!-- <i class="fa fa-twitch fa-2x" aria-hidden="true"></i> -->
               </div>
               <div class="col-md-4">
                <!-- <button class="btn btn-default" type="submit">Challenge</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<script type="text/javascript">
  window.print();  
</script>
</body>
</html>