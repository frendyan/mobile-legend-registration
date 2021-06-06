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
		/*height:50px;*/
		/*line-height:20px;*/
		text-align:left;
		/*background: #ccc;*/
		border-color: gray;
		border:1px solid lightgray;
		border-radius: 5px;
		padding:25px 25px 25px 25px;
		vertical-align: center;
		margin:10px;
		cursor:pointer;
		display: inline-block;
	}

	div.selected {
		background:#00cc00;
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
									<div style="height:50px;padding:10px;border-radius: 10px; background-color: lightblue;" align="center">
										<p class="text-white font-weight-bold text-uppercase text-sm">Kecerdasan</p>
									</div>
								</div>
								<div class="col-6 col-md-3 mb-1 mt-1">
									<div style="height:50px;padding:10px;border-radius: 10px; background-color: lightblue;" align="center">
										<p class="text-white font-weight-bold text-uppercase text-sm">Kepribadian</p>
									</div>
								</div>
								<div class="col-6 col-md-3 mb-1 mt-1">
									<div style="height:50px;padding:10px;border-radius: 10px; background-color: #349CAF;" align="center">
										<p class="text-white font-weight-bold text-uppercase text-sm">Kecermatan</p>
									</div>
								</div>
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


			<!-- start foreac on dis line -->

			<!--  -->
			

			<div class="row">
				<div class="col-12">
					<div class="card">
						<input type="hidden" id="time" name="time" value="{{$time[0]->tt_question_duration_in_seconds}}"/>
						<div class="card-body" align="center">
							<input type="hidden" id="jumlahSoal" value="{{sizeof($datas)}}"/>
							<input type="hidden" id="jumlahkolom" value="2"/>

							<div class="row mb-5">
								<div class="col-12 ml-10 pl-10" align="center">
									<form action="{{route('submitTT')}}" method="post" id="thirdTestForm">
										@csrf
										<input type="text" id="answerArr" name="answerArr" style="display: none;" />
										<p>Pertanyaan</p>
										@for($x = 1; $x<=2; $x++)
										@php
										$count = 0;
										@endphp
										@if($x==1)
										<div id="KolomB-{{$x}}">
											@foreach($datas as $data)
											@if($data->column == $x and $count == 0)
											@php
											$count++;
											$questionImp = explode(" ", $data->question);
											@endphp
											<div id="soalkolom-{{$x}}-{{$count}}">
												<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
												<input type="hidden" name="idSoal[]" value="{{$data->id}}" />	
												<p class="fs-15 font-weight-bold">

													<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{$data->question1}}</p></div>

													<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p> + </p></div>

													<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{$data->question2}}</p></div>

												</p>
												<div class="row justify-content-center">
													<div class="col-6" align="center">
														<div class="pilihan font-weight-bold">

															<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '1');return false;"/>1</div>
															<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '2');return false;"/>2</div>
															<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '3');return false;"/>3</div>
														</div>
													</div>
												</div>
												<div class="row justify-content-center">
													<div class="col-6" align="center">
														<div class="pilihan font-weight-bold">

															<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '4');return false;"/>4</div>
															<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '5');return false;"/>5</div>
															<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '6');return false;"/>6</div>
														</div>
													</div>
												</div>
												<div class="row justify-content-center">
													<div class="col-6" align="center">
														<div class="pilihan font-weight-bold">

															<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '7');return false;"/>7</div>
															<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '8');return false;"/>8</div>
															<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '9');return false;"/>9</div>
														</div>
													</div>
												</div>
												<div class="row justify-content-center">
													<div class="col-6" align="center">
														<div class="pilihan font-weight-bold">

															<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '0');return false;"/>0</div>
															<div style="display: none;"><input checked type="radio" name="answer[{{$data->id}}]" value="empty" />E. {{$data->opt_e}}</div>
														</div>
													</div>
												</div>
											<!-- <div class="pilihan font-weight-bold">
												
												<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', 'a');return false;"/>A</div>
												<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', 'b');return false;"/>B</div>
												<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', 'c');return false;"/>C</div>
												<div><input type="radio" name="answer[{{$data->id}}]" value="d" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', 'd');return false;"/>D</div>
												<div><input type="radio" name="answer[{{$data->id}}]" value="e" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', 'e');return false;"/>E</div>
												<div style="display: none;"><input checked type="radio" name="answer[{{$data->id}}]" value="empty" />E. {{$data->opt_e}}</div>
											</div> -->
										</div>
										@elseif($data->column == $x and $count != 0)
										@php
										$count++;
										$questionImp = explode(" ", $data->question);
										@endphp
										<div id="soalkolom-{{$x}}-{{$count}}" style="display: none;">
											<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
											<input type="hidden" name="idSoal[]" value="{{$data->id}}" />	
											<p class="fs-15 font-weight-bold">
												<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{$data->question1}}</p></div>

												<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p> + </p></div>

												<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{$data->question2}}</p></div>
											</p>

											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '1');return false;"/>1</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '2');return false;"/>2</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '3');return false;"/>3</div>
													</div>
												</div>
											</div>
											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '4');return false;"/>4</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '5');return false;"/>5</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '6');return false;"/>6</div>
													</div>
												</div>
											</div>
											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '7');return false;"/>7</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '8');return false;"/>8</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '9');return false;"/>9</div>
													</div>
												</div>
											</div>
											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '0');return false;"/>0</div>
														<div style="display: none;"><input checked type="radio" name="answer[{{$data->id}}]" value="empty" />E. {{$data->opt_e}}</div>
													</div>
												</div>
											</div>
										</div>
										@endif
										@endforeach
									</div>
									<!-- end kolom 1 -->
									@else
									<div id="KolomB-{{$x}}" style="display: none;">
										@foreach($datas as $data)
										@if($data->column == $x and $count == 0)
										@php
										$count++;
										$questionImp = explode(" ", $data->question);
										@endphp
										<div id="soalkolom-{{$x}}-{{$count}}">
											<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
											<input type="hidden" name="idSoal[]" value="{{$data->id}}" />	
											<p class="fs-15 font-weight-bold">
												<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{$data->question1}}</p></div>

												<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p> + </p></div>

												<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{$data->question2}}</p></div>
											</p>
											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '1');return false;"/>1</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '2');return false;"/>2</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '3');return false;"/>3</div>
													</div>
												</div>
											</div>
											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '4');return false;"/>4</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '5');return false;"/>5</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '6');return false;"/>6</div>
													</div>
												</div>
											</div>
											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '7');return false;"/>7</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '8');return false;"/>8</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '9');return false;"/>9</div>
													</div>
												</div>
											</div>
											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '0');return false;"/>0</div>
														<div style="display: none;"><input checked type="radio" name="answer[{{$data->id}}]" value="empty" />E. {{$data->opt_e}}</div>
													</div>
												</div>
											</div>
										</div>

										@elseif($data->column == $x and $count != 0)
										@php
										$count++;
										$questionImp = explode(" ", $data->question);
										@endphp
										<div id="soalkolom-{{$x}}-{{$count}}" style="display: none;">
											<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
											<input type="hidden" name="idSoal[]" value="{{$data->id}}" />	
											<p class="fs-15 font-weight-bold">
												<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{$data->question1}}</p></div>

												<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p> + </p></div>

												<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{$data->question2}}</p></div>
											</p>

											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '1');return false;"/>1</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '2');return false;"/>2</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '3');return false;"/>3</div>
													</div>
												</div>
											</div>
											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '4');return false;"/>4</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '5');return false;"/>5</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '6');return false;"/>6</div>
													</div>
												</div>
											</div>
											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '7');return false;"/>7</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="b" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '8');return false;"/>8</div>
														<div><input type="radio" name="answer[{{$data->id}}]" value="c" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '9');return false;"/>9</div>
													</div>
												</div>
											</div>
											<div class="row justify-content-center">
												<div class="col-6" align="center">
													<div class="pilihan font-weight-bold">

														<div><input type="radio" name="answer[{{$data->id}}]" value="a" onclick="nextSoal('{{$x}}', '{{$count}}', '{{$data->id}}', '0');return false;"/>0</div>
														<div style="display: none;"><input checked type="radio" name="answer[{{$data->id}}]" value="empty" />E. {{$data->opt_e}}</div>
													</div>
												</div>
											</div>
										</div>
										@endif
										@endforeach
									</div>
									@endif
									@endfor
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- end foreac on dis line -->

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
	var change = 0;


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
				var testTime = document.getElementById('time').value;
				if(change==testTime){
					console.log("---------------------");
					console.log("index = "+index);
					// var x = document.getElementById("kolom"+index);
					var a = document.getElementById("KolomB-"+index);
					index++;
					console.log("index y = "+index);
					// var y = document.getElementById("kolom"+index);
					var b = document.getElementById("KolomB-"+index);
					console.log("divx ke - ."+x+".");
					console.log("divy ke - ."+y+".");
					
					// x.style.display = "none";
					// y.style.display = "block";
					a.style.display = "none";
					b.style.display = "block";

					change=1;
				}else {
					change+=1;
				}
				--timer;
			}else{
				clearInterval(interVal)
				div.style.display = "none";
				SubmitFunction();
			}

		},1000);

	}

	function SubmitFunction(){

		document.getElementById("answerArr").value = answerArr.toString();
		div.style.display = "none";
		submitted.innerHTML="Waktu Habis!";
		document.getElementById('thirdTestForm').submit();

	}
	function sleep(milliseconds) {
		const date = Date.now();
		let currentDate = null;
		do {
			currentDate = Date.now();
		} while (currentDate - date < milliseconds);
	}

	var testTime = document.getElementById('time').value;
	var kolom = document.getElementById('jumlahkolom').value;
	CountDown(testTime * kolom,div);

/////////////timer end/////////////////

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
var answerArr = [];

function nextSoal(kolom, index, arrIndex, answer){
	console.log(kolom);
	console.log(index);
	answerArr[arrIndex-1] = answer;
	var x = document.getElementById("soalkolom-"+kolom+'-'+index);
	index++;
	console.log("index y = "+index);
	var y = document.getElementById("soalkolom-"+kolom+'-'+index);
	console.log("divx ke - ."+x+".");
	console.log("divy ke - ."+y+".");
	x.style.display = "none";
	y.style.display = "block";
}
/////////////////////////////end///////////////////////

</script>
@endsection
