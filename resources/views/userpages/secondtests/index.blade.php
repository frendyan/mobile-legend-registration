@extends('userpages.layouts.master')
@section('jstop')
<script type = "text/javascript" >  
	history.pushState(null, document.title, location.href);
	window.addEventListener('popstate', function (event)
	{
		history.pushState(null, document.title, location.href);
	});  
</script> 
@endsection

@section('style')
<style type="text/css">
	#myDIV1 {
		width: 100%;
		padding: 50px 0;
		text-align: center;
		background-color: lightblue;
		margin-top: 20px;
	}
	.myDIV2 {
		width: 100%;
		padding: 50px 0;
		text-align: center;
		background-color: lightblue;
		margin-top: 20px;
		display: none;
	}
	.pilihan div {
		/*float:left;
		width:50px;*/
		height:50px;
		/*line-height:20px;*/
		text-align:left;
		/*background: #ccc;*/
		border-color: gray;
		border:1px solid lightgray;
		border-radius: 5px;
		padding:5px;
		vertical-align: center;
		margin:10px;
		cursor:pointer;
	}

/*	div.selected {
		background:#00cc00;
		}*/
		.whatever{
			/*line-height:20px;*/
			text-align:left;
			/*background: #ccc;*/
			border-color: gray;
			border:1px solid lightgray;
			border-radius: 5px;
			padding: 15px 0px 15px 15px;
			vertical-align: center;
			margin:10px;
			cursor:pointer;
			display: inline-block;
			width: 100%;
		}
		.checkboxes input[type=checkbox]{
			display: none;
		}

		.checkboxes input[type=checkbox]:checked + .whatever{
			background-color: #00cc00;
		}
	</style>
	@endsection
	@section('content')

	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">
				<div class="row justify-content-around" style="padding-top: 20px;">
					<div class="col-12 col-lg-3 col-md-4 col-sm-4">
						<div class="card">
							<div class="card-body">
								<h5>Data Peserta</h5>
								<div class="user-panel d-flex">
									<br>
									<div class="image" style="height: 50px;">
										<img src="{{url('data_file/profile.png')}}" class="img-circle elevation-0 mt-2" style="width: 50px;" alt="User Image">
									</div>
									<div class="info ml-3 mt-1">
										<a href="#" class="d-block text-dark">{{Auth::user()->uname}}</a>            
										<p class="text-secondary">{{Auth::user()->name}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-5 col-md-8 col-sm-8">
						<div class="card">
							<div class="card-body">
								<h5>Tahapan Ujian</h5>
								<div class="row align-items-center" style="padding-bottom: 20px;">
									<div class="col-6 col-md-3 mb-1 mt-1">
									<div style="height:50px;padding:10px;border-radius: 10px; background-color: lightblue;" align="center">
										<p class="text-white font-weight-bold text-uppercase text-sm">Riwayat Hidup</p>
									</div>
								</div>
									<div class="col-6 col-md-3 mb-1 mt-1">
										<div style="height:50px;padding:10px;border-radius: 10px; background-color: #349CAF;" align="center">
											<p class="text-white font-weight-bold text-uppercase text-sm">Kecerdasan</p>
										</div>
									</div>
									<div class="col-6 col-md-3 mb-1 mt-1">
										<div style="height:50px;padding:10px;border-radius: 10px; background-color: lightblue;" align="center">
											<p class="text-white font-weight-bold text-uppercase text-sm">Kepribadian</p>
										</div>
									</div>
									<div class="col-6 col-md-3 mb-1 mt-1">
										<div style="height:50px;padding:10px;border-radius: 10px; background-color: lightblue;" align="center">
											<p class="text-white font-weight-bold text-uppercase text-sm">Kecermatan</p>
										</div>
									</div>
									<!-- <div class="col-6 col-md-3 mb-1 mt-1">
										<div style="height:50px;padding:10px;border-radius: 10px; background-color: lightblue;" align="center">
											<p class="text-white font-weight-bold text-uppercase text-sm">Pass Hand</p>
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4 col-md-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<h5>Sisa Waktu</h5>
								<div class="row">
									<div class="col-12" style="padding-bottom: 3px;">
										<div><span id="display" style="color:#000000;font-size:50px"></span></div>
										<div><span id="submitted" style="color:#FF0000;font-size:50px"></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<div class="card">
							<div class="card-body">
								<h5>Nomor Soal</h5>
								<hr>
								<div class="row">
									@foreach($secondtests as $test)

									<div class="col-3">
										<button style="margin-top: 10px;" class="btn btn-secondary" id="nav{{$loop->index+1}}" onclick="divVisibility('soalke{{$loop->index+1}}');">
											{{$loop->index+1}}
										</button>
									</div>
									@endforeach
								</div>

							</div>
						</div>
					</div>
					<div class="col-9">
						<div class="card">
							<input type="hidden" id="time" name="time" value="{{$time[0]->ft_duration_in_minutes}}"/>
							<div class="card-body" align="center">
								<input type="hidden" id="jumlahSoal" value="{{sizeof($secondtests)}}"/>

								<div class="row mb-5">
									<div class="col-12 ml-10 pl-10" align="left">
										<form action="{{route('submitFT')}}" method="post" id="secondTestForm">
											@csrf
											<p>Pertanyaan</p>
											@foreach($secondtests as $test)
											@if($loop->index === 0)
											<div id="soalke{{$loop->index+1}}" style="display: block;">
												<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
												<input type="hidden" name="idSoal[]" value="{{$test->id}}" />	
												
												@if(!empty($test->image))	
												<a href="{{ url('/data_file/kecerdasan/'.$test->image) }}" data-toggle="lightbox" data-title="Gambar Soal" >
													<img src="{{ url('/data_file/kecerdasan/'.$test->image) }}" width=500px class="img-fluid mb-2" alt="white sample"/>
												</a>
												@endif
												<p class="fs-15 font-weight-bold">{{$loop->index+1}}. {{$test->question}}</p>

												<div class="checkboxes">
													<input type="checkbox" name="answer{{$test->id}}[]" value="a" id="r1{{$test->id}}" />
													<label class="whatever" for="r1{{$test->id}}">A. {{$test->opt_a}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="b" id="r2{{$test->id}}" />
													<label class="whatever" for="r2{{$test->id}}">B. {{$test->opt_b}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="c" id="r3{{$test->id}}" />
													<label class="whatever" for="r3{{$test->id}}">C. {{$test->opt_c}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="d" id="r4{{$test->id}}" />
													<label class="whatever" for="r4{{$test->id}}">D. {{$test->opt_d}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="e" id="r5{{$test->id}}" />
													<label class="whatever" for="r5{{$test->id}}">E. {{$test->opt_e}}</label>
													<input style="display: none;overflow: hidden;" checked type="checkbox" name="answer{{$test->id}}[]" value="empty" id="r6{{$test->id}}" />
													<label style="display: none;overflow: hidden;" class="whatever" for="r6{{$test->id}}">{{$test->opt_c}}</label>
												</div>

												<button type="button" style="float: right;width: 100%;" class="btn btn-primary" onclick="nextSoal('{{$loop->index+1}}');return false;">Jawab</button>
											</div>
											@elseif(!($loop->last))
											<div id="soalke{{$loop->index+1}}" style="display: none;">
												<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
												<input type="hidden" name="idSoal[]" value="{{$test->id}}" />	
												@if(!empty($test->image))	
												<a href="{{ url('/data_file/kecerdasan/'.$test->image) }}" data-toggle="lightbox" data-title="Gambar Soal" >
													<img src="{{ url('/data_file/kecerdasan/'.$test->image) }}" width=500px class="img-fluid mb-2" alt="white sample"/>
												</a>
												@endif
												<p class="fs-15 font-weight-bold">{{$loop->index+1}}. {{$test->question}}</p>

												<div class="checkboxes">
													<input type="checkbox" name="answer{{$test->id}}[]" value="a" id="r1{{$test->id}}" />
													<label class="whatever" for="r1{{$test->id}}">A. {{$test->opt_a}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="b" id="r2{{$test->id}}" />
													<label class="whatever" for="r2{{$test->id}}">B. {{$test->opt_b}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="c" id="r3{{$test->id}}" />
													<label class="whatever" for="r3{{$test->id}}">C. {{$test->opt_c}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="d" id="r4{{$test->id}}" />
													<label class="whatever" for="r4{{$test->id}}">D. {{$test->opt_d}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="e" id="r5{{$test->id}}" />
													<label class="whatever" for="r5{{$test->id}}">E. {{$test->opt_e}}</label>
													<input style="display: none;overflow: hidden;" checked type="checkbox" name="answer{{$test->id}}[]" value="empty" id="r6{{$test->id}}" />
													<label style="display: none;overflow: hidden;" class="whatever" for="r6{{$test->id}}">{{$test->opt_c}}</label>
												</div>

												<button type="button" style="float: right;width: 100%;" class="btn btn-primary" onclick="nextSoal('{{$loop->index+1}}');return false;">Jawab</button>
											</div>

											@elseif(($loop->last))
											<div id="soalke{{$loop->index+1}}" style="display: none;">
												<input type="hidden" name="idSoal[]" value="{{$test->id}}" />	
												@if(!empty($test->image))	
												<a href="{{ url('/data_file/kecerdasan/'.$test->image) }}" data-toggle="lightbox" data-title="Gambar Soal" >
													<img src="{{ url('/data_file/kecerdasan/'.$test->image) }}" width=500px class="img-fluid mb-2" alt="white sample"/>
												</a>
												@endif
												<p class="fs-15 font-weight-bold">{{$loop->index+1}}. {{$test->question}}</p>

												<div class="checkboxes">
													<input type="checkbox" name="answer{{$test->id}}[]" value="a" id="r1{{$test->id}}" />
													<label class="whatever" for="r1{{$test->id}}">A. {{$test->opt_a}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="b" id="r2{{$test->id}}" />
													<label class="whatever" for="r2{{$test->id}}">B. {{$test->opt_b}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="c" id="r3{{$test->id}}" />
													<label class="whatever" for="r3{{$test->id}}">C. {{$test->opt_c}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="d" id="r4{{$test->id}}" />
													<label class="whatever" for="r4{{$test->id}}">D. {{$test->opt_d}}</label>
													<input type="checkbox" name="answer{{$test->id}}[]" value="e" id="r5{{$test->id}}" />
													<label class="whatever" for="r5{{$test->id}}">E. {{$test->opt_e}}</label>
													<input style="display: none;overflow: hidden;"  checked type="checkbox" name="answer{{$test->id}}[]" value="empty" id="r6{{$test->id}}" />
													<label style="display: none;overflow: hidden;" class="whatever" for="r6{{$test->id}}">{{$test->opt_c}}</label>
												</div>
												<button style="float: right;width: 100%;" onclick="return confirm('Submit Jawaban?')" type="submit" class="btn btn-primary">Selesai</button>
											</div>
											@endif
											@endforeach

										</form>
									</div>
								</div>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@stop

@section('js')
<script>

	/////////////timer///////////////
	var div = document.getElementById('display');
	var submitted = document.getElementById('submitted');

	var i;
	var x = "";
	var y = "";
	var index = 1;


	function CountDown(duration, display) {

		var timer = duration, hours, minutes, seconds;

		var interVal=  setInterval(function () {

			seconds = parseInt(timer % 60, 10);
			minutes = parseInt((timer / 60)%60, 10);
			hours = parseInt(timer / 3600, 10);

			hours = hours < 10 ? "0" + hours : hours;
			minutes = minutes < 10 ? "0" + minutes : minutes;
			seconds = seconds < 10 ? "0" + seconds : seconds;
			display.innerHTML ="<b>" + hours + " : " + minutes + " : " + seconds + " " + "</b>";
			if (timer > 0) {
				--timer;
			}else{
				clearInterval(interVal)
				SubmitFunction();
			}

		},1000);

	}

	function SubmitFunction(){
		div.style.display = "none";
		submitted.innerHTML="Waktu Habis!";
		document.getElementById('secondTestForm').submit();

	}
	function sleep(milliseconds) {
		const date = Date.now();
		let currentDate = null;
		do {
			currentDate = Date.now();
		} while (currentDate - date < milliseconds);
	}

	var testTime = document.getElementById('time').value * 60;
	CountDown(testTime	,div);

/////////////timer end/////////////////


//////////////////navigation////////////////////
var jumlahSoal = document.getElementById('jumlahSoal').value;
console.log('jumlah soal : '+jumlahSoal);
var divsoal = [];
for (var i = 0; i < jumlahSoal; i++) {
	divsoal.push('soalke'+(i+1));
}
console.log(divsoal);
var visibleDivId = null;
function divVisibility(divId) {
	
	visibleDivId = divId;
	hideNonVisibleDivs();
}
function hideNonVisibleDivs() {
	var i, divId, div;
	for(i = 0; i < divsoal.length; i++) {
		divId = divsoal[i];
		div = document.getElementById(divId);
		if(visibleDivId === divId) {
			div.style.display = "block";
		} else {
			div.style.display = "none";
		}
	}
}
//////////////////navigation end /////////////////

/////////////////div as radio/////////////////////
$(".pilihan :radio").hide().click(function(e){
	e.stopPropagation();
});
$(".pilihan div").click(function(e){
	$(this).closest(".pilihan").find("div").removeClass("selected");
	$(this).addClass("selected").find(":radio").click();
});
////////////////////end/////////////////////////////

/////////////////////next button///////////////////////
function nextSoal(index){
	var x = document.getElementById('soalke'+index);

	var navSoal = document.getElementById('nav'+index);
	navSoal.classList.add('btn-success');
	navSoal.classList.remove('btn-secondary');
	
	index++;
	console.log("index y = "+index);
	var y = document.getElementById("soalke"+index);
	console.log("divx ke - ."+x+".");
	console.log("divy ke - ."+y+".");
	x.style.display = "none";
	y.style.display = "block";

}
/////////////////////////////end///////////////////////
</script>
<script src="{{URL::asset('plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script type="text/javascript">

	//lightbox
	$(function () {
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox({
				alwaysShowClose: true
			});
		});
	})
</script>
@endsection
