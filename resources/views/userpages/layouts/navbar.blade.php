 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark" style="background-color: #349CAF">
 	<div class="container" style="margin:10; max-width: 95%;">
 		<a href="#" class="navbar-brand">
 			<img src="{{url('data_file/lambang-psikologi.png')}}" alt="POLDA Logo" class="brand-image img-circle elevation-2">
 			<span class="brand-text font-weigt-heavy">Sistem CAT Polda Aceh</span>
 		</a>

 		<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
 			<span class="navbar-toggler-icon"></span>
 		</button>

 		<div class="collapse navbar-collapse order-3" id="navbarCollapse">
 		</div>

 		<!-- Right navbar links -->
 		<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
 			@if(Route::is('dashboard') or Route::is('result') )

 			<li class="nav-item">
 				<a href="{{ route('logout') }}" onclick="return confirm('Yakin akan keluar?')" role="button" style="color: white; float: right;"><i
 					class="fas fa-sign-out-alt"></i>Keluar</a>
 				</li>
 			</ul>
 			@endif
 		</div>
 	</nav>
  <!-- /.navbar -->