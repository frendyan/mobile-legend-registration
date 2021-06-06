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
		padding:15px 15px 15px 15px;
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
			<!-- ROW 1 -->
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
			<!-- ROW 1 END -->

			<!-- ROW 2 -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<input type="hidden" id="time" name="time" value="{{$time[0]->tt_question_duration_in_seconds}}"/>
						<input type="hidden" id="tipe" name="tipe" value="{{$maxType}}"/>
						<div class="card-body" align="center">
							@for ($tipe = 1; $tipe <= $maxType ; $tipe++)
							@if($tipe==1)
							<div id="tipe{{$tipe}}">
								@for ($i = 1; $i <= 10; $i++)
								@php
								$countkolom = 0;
								@endphp
								@if($i==1)
								<!-- <input type="hidden" id="jumlahSoal" value="{{sizeof($thirdtests)}}"/> -->
								<div id="kolom{{$tipe}}{{$i}}">
									@foreach($thirdtests as $test)
									@if($test->column == $i and $countkolom == 0 and $test->type == $tipe)
									@php
									$countkolom++;
									$questionImp = explode(" ", $test->question);
									@endphp

									<div class="row">
										<p>Petunjuk</p>
									</div>
									<div class="row justify-content-center" style="margin-bottom: 10px;">
										<h5>Kolom {{$tipe}}-{{$i}}</h5>
									</div>
									<div class="row justify-content-around">
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{ strtoupper($test->opt_a)}}</p>
											</div>
											A
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_b)}}</p>
											</div>
											B
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_c)}}</p>
											</div>
											C
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_d)}}</p>
											</div>

											D
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_e)}}</p>
											</div>

											E
										</div>
									</div>
									@endif
									@endforeach
								</div>
								@else
								<div id="kolom{{$tipe}}{{$i}}" style="display: none;">
									@php
									$countkolom=0;
									@endphp
									@foreach($thirdtests as $test)
									@if($test->column == $i and $countkolom == 0 and $test->type == $tipe)
									@php
									$countkolom++;
									$questionImp = explode(" ", $test->question);
									@endphp

									<div class="row">
										<p>Petunjuk</p>
									</div>
									<div class="row justify-content-center" style="margin-bottom: 10px;">
										<h5>Kolom {{$tipe}}-{{$i}}</h5>
									</div>
									<div class="row justify-content-around">
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_a)}}</p>
											</div>
											A
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_b)}}</p>
											</div>
											B
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_c)}}</p>
											</div>
											C
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_d)}}</p>
											</div>

											D
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_e)}}</p>
											</div>

											E
										</div>
									</div>
									@endif
									@endforeach
								</div>
								@endif
								@endfor
							</div>
							@else
							<div id="tipe{{$tipe}}" style="display: none;">
								@for ($i = 1; $i <= 10; $i++)
								@php
								$countkolom = 0;
								@endphp
								@if($i==1)
								<!-- <input type="hidden" id="jumlahSoal" value="{{sizeof($thirdtests)}}"/> -->
								<div id="kolom{{$tipe}}{{$i}}">
									@foreach($thirdtests as $test)
									@if($test->column == $i and $countkolom == 0 and $test->type == $tipe) 
									@php
									$countkolom++;
									$questionImp = explode(" ", $test->question);
									@endphp

									<div class="row">
										<p>Petunjuk</p>
									</div>
									<div class="row justify-content-center" style="margin-bottom: 10px;">
										<h5>Kolom {{$tipe}}-{{$i}}</h5>
									</div>
									<div class="row justify-content-around">
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{ strtoupper($test->opt_a)}}</p>
											</div>
											A
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_b)}}</p>
											</div>
											B
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_c)}}</p>
											</div>
											C
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_d)}}</p>
											</div>

											D
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_e)}}</p>
											</div>

											E
										</div>
									</div>
									@endif
									@endforeach
								</div>
								@else
								<div id="kolom{{$tipe}}{{$i}}" style="display: none;">
									@php
									$countkolom=0;
									@endphp
									@foreach($thirdtests as $test)
									@if($test->column == $i and $countkolom == 0 and $test->type == $tipe)
									@php
									$countkolom++;
									$questionImp = explode(" ", $test->question);
									@endphp

									<div class="row">
										<p>Petunjuk</p>
									</div>
									<div class="row justify-content-center" style="margin-bottom: 10px;">
										<h5>Kolom {{$tipe}}-{{$i}}</h5>
									</div>
									<div class="row justify-content-around">
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_a)}}</p>
											</div>
											A
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_b)}}</p>
											</div>
											B
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_c)}}</p>
											</div>
											C
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_d)}}</p>
											</div>

											D
										</div>
										<div class="col-2" align="center">
											<div style="padding-left: 40%; text-align: center; display:flex; background-color: lightblue; text-align: center;font-size: 70px;">
												<br>
												<p>{{strtoupper($test->opt_e)}}</p>
											</div>

											E
										</div>
									</div>
									@endif
									@endforeach
								</div>
								@endif
								@endfor
							</div>
							@endif
							@endfor
						</div>
					</div>
				</div>
			</div>
			<!-- ROW 2 END -->

			<!-- ROW 3 -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<input type="hidden" id="time" name="time" value="{{$time[0]->tt_question_duration_in_seconds}}"/>
						<div class="card-body" align="center">
							<input type="hidden" id="jumlahSoal" value="{{sizeof($thirdtests)}}"/>
							<input type="hidden" id="jumlahkolom" value="{{trim($maxColumn)}}"/>

							<div class="row mb-5">
								<div class="col-12 ml-10 pl-10" align="left">
									<form action="{{route('submitTT')}}" method="post" id="thirdTestForm">
										@csrf
										<input type="text" id="answerArr" name="answerArr" style="display: none;" />
										<p>Pertanyaan</p>
										@for ($tipe = 1; $tipe <= $maxType ; $tipe++)
										@if($tipe==1)
										<div id="tipeB{{$tipe}}">

											@for($x = 1; $x<=10; $x++)
											@php
											$count = 0;
											@endphp
											@if($x==1)
											<div id="KolomB-{{$tipe}}{{$x}}">
												@foreach($thirdtests as $test)
												@if($test->column == $x and $count == 0 and $test->type == $tipe)
												@php
												$count++;
												$questionImp = explode(" ", $test->question);
												@endphp
												<div id="soalkolom-{{$tipe}}-{{$x}}-{{$count}}">
													<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
													<input type="hidden" name="idSoal[]" value="{{$test->id}}" />	
													<p class="fs-15 font-weight-bold">

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{strtoupper($questionImp[0])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[1])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[2])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[3])}}</p></div>

													</p>
													<div class="pilihan font-weight-bold">
														<div><input type="radio" name="answer[{{$test->id}}]" value="a" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'a');return false;"/>A</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="b" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'b');return false;"/>B</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="c" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'c');return false;"/>C</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="d" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'd');return false;"/>D</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="e" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'e');return false;"/>E</div>
														<div style="display: none;"><input checked type="radio" name="answer[{{$test->id}}]" value="empty" />E. {{$test->opt_e}}</div>
													</div>
												</div>
												@elseif($test->column == $x and $count != 0 and $test->type == $tipe)
												@php
												$count++;
												$questionImp = explode(" ", $test->question);
												@endphp
												<div id="soalkolom-{{$tipe}}-{{$x}}-{{$count}}" style="display: none;">
													<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
													<input type="hidden" name="idSoal[]" value="{{$test->id}}" />	
													<p class="fs-15 font-weight-bold">
														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{strtoupper($questionImp[0])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[1])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[2])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[3])}}</p></div>
													</p>

													<div class="pilihan font-weight-bold">
														<div><input type="radio" name="answer[{{$test->id}}]" value="a" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'a');return false;"/>A</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="b" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'b');return false;"/>B</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="c" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'c');return false;"/>C</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="d" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'd');return false;"/>D</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="e" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'e');return false;"/>E</div>
														<div style="display: none;"><input checked type="radio" name="answer[{{$test->id}}]" value="empty" />E. {{$test->opt_e}}</div>
													</div>
												</div>
												@endif
												@endforeach
											</div>
											<!-- end kolom 1 -->
											@else
											<div id="KolomB-{{$tipe}}{{$x}}" style="display: none;">
												@foreach($thirdtests as $test)
												@if($test->column == $x and $count == 0 and $test->type == $tipe)
												@php
												$count++;
												$questionImp = explode(" ", $test->question);
												@endphp
												<div id="soalkolom-{{$tipe}}-{{$x}}-{{$count}}">
													<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
													<input type="hidden" name="idSoal[]" value="{{$test->id}}" />	
													<p class="fs-15 font-weight-bold">
														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{strtoupper($questionImp[0])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[1])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[2])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[3])}}</p></div>
													</p>
													<div class="pilihan font-weight-bold">
														<div><input type="radio" name="answer[{{$test->id}}]" value="a" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'a');return false;"/>A</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="b" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'b');return false;"/>B</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="c" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'c');return false;"/>C</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="d" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'd');return false;"/>D</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="e" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'e');return false;"/>E</div>
														<div style="display: none;"><input checked type="radio" name="answer[{{$test->id}}]" value="empty" />E. {{$test->opt_e}}</div>
													</div>
												</div>

												@elseif($test->column == $x and $count != 0 and $test->type == $tipe)
												@php
												$count++;
												$questionImp = explode(" ", $test->question);
												@endphp
												<div id="soalkolom-{{$tipe}}-{{$x}}-{{$count}}" style="display: none;">
													<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
													<input type="hidden" name="idSoal[]" value="{{$test->id}}" />	
													<p class="fs-15 font-weight-bold">
														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{strtoupper($questionImp[0])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[1])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[2])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[3])}}</p></div>
													</p>

													<div class="pilihan font-weight-bold">
														<div><input type="radio" name="answer[{{$test->id}}]" value="a" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'a');return false;"/>A</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="b" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'b');return false;"/>B</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="c" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'c');return false;"/>C</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="d" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'd');return false;"/>D</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="e" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'e');return false;"/>E</div>
														<div style="display: none;"><input checked type="radio" name="answer[{{$test->id}}]" value="empty" />E. {{$test->opt_e}}</div>
													</div>
												</div>
												@endif
												@endforeach
											</div>
											@endif
											@endfor
										</div>
										@else
										<div id="tipeB{{$tipe}}" style="display: none;">

											@for($x = 1; $x<=10; $x++)
											@php
											$count = 0;
											@endphp
											@if($x==1)
											<div id="KolomB-{{$tipe}}{{$x}}">
												@foreach($thirdtests as $test)
												@if($test->column == $x and $count == 0 and $test->type == $tipe)
												@php
												$count++;
												$questionImp = explode(" ", $test->question);
												@endphp
												<div id="soalkolom-{{$tipe}}-{{$x}}-{{$count}}">
													<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
													<input type="hidden" name="idSoal[]" value="{{$test->id}}" />	
													<p class="fs-15 font-weight-bold">

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{strtoupper($questionImp[0])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[1])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[2])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[3])}}</p></div>

													</p>
													<div class="pilihan font-weight-bold">
														<div><input type="radio" name="answer[{{$test->id}}]" value="a" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'a');return false;"/>A</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="b" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'b');return false;"/>B</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="c" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'c');return false;"/>C</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="d" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'd');return false;"/>D</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="e" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'e');return false;"/>E</div>
														<div style="display: none;"><input checked type="radio" name="answer[{{$test->id}}]" value="empty" />E. {{$test->opt_e}}</div>
													</div>
												</div>
												@elseif($test->column == $x and $count != 0 and $test->type == $tipe)
												@php
												$count++;
												$questionImp = explode(" ", $test->question);
												@endphp
												<div id="soalkolom-{{$tipe}}-{{$x}}-{{$count}}" style="display: none;">
													<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
													<input type="hidden" name="idSoal[]" value="{{$test->id}}" />	
													<p class="fs-15 font-weight-bold">
														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{strtoupper($questionImp[0])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[1])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[2])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[3])}}</p></div>
													</p>

													<div class="pilihan font-weight-bold">
														<div><input type="radio" name="answer[{{$test->id}}]" value="a" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'a');return false;"/>A</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="b" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'b');return false;"/>B</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="c" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'c');return false;"/>C</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="d" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'd');return false;"/>D</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="e" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'e');return false;"/>E</div>
														<div style="display: none;"><input checked type="radio" name="answer[{{$test->id}}]" value="empty" />E. {{$test->opt_e}}</div>
													</div>
												</div>
												@endif
												@endforeach
											</div>
											<!-- end kolom 1 -->
											@else
											<div id="KolomB-{{$tipe}}{{$x}}" style="display: none;">
												@foreach($thirdtests as $test)
												@if($test->column == $x and $count == 0 and $test->type == $tipe)
												@php
												$count++;
												$questionImp = explode(" ", $test->question);
												@endphp
												<div id="soalkolom-{{$tipe}}-{{$x}}-{{$count}}">
													<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
													<input type="hidden" name="idSoal[]" value="{{$test->id}}" />	
													<p class="fs-15 font-weight-bold">
														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{strtoupper($questionImp[0])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[1])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[2])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[3])}}</p></div>
													</p>
													<div class="pilihan font-weight-bold">
														<div><input type="radio" name="answer[{{$test->id}}]" value="a" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'a');return false;"/>A</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="b" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'b');return false;"/>B</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="c" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'c');return false;"/>C</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="d" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'd');return false;"/>D</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="e" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'e');return false;"/>E</div>
														<div style="display: none;"><input checked type="radio" name="answer[{{$test->id}}]" value="empty" />E. {{$test->opt_e}}</div>
													</div>
												</div>

												@elseif($test->column == $x and $count != 0 and $test->type == $tipe)
												@php
												$count++;
												$questionImp = explode(" ", $test->question);
												@endphp
												<div id="soalkolom-{{$tipe}}-{{$x}}-{{$count}}" style="display: none;">
													<input type="hidden" name="pointer" id="next" value="{{$loop->index+1}}"/>
													<input type="hidden" name="idSoal[]" value="{{$test->id}}" />	
													<p class="fs-15 font-weight-bold">
														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p >{{strtoupper($questionImp[0])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[1])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[2])}}</p></div>

														<div style="display: inline-block;padding-right: 20px; padding-left: 20px; width: 70px; background-color: lightblue; text-align: center;padding-top: 10px;font-size: 30px;margin-right: 30px;"><p>{{strtoupper($questionImp[3])}}</p></div>
													</p>

													<div class="pilihan font-weight-bold">
														<div><input type="radio" name="answer[{{$test->id}}]" value="a" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'a');return false;"/>A</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="b" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'b');return false;"/>B</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="c" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'c');return false;"/>C</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="d" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'd');return false;"/>D</div>
														<div><input type="radio" name="answer[{{$test->id}}]" value="e" onclick="nextSoal('{{$tipe}}','{{$x}}', '{{$count}}', '{{$test->id}}', 'e');return false;"/>E</div>
														<div style="display: none;"><input checked type="radio" name="answer[{{$test->id}}]" value="empty" />E. {{$test->opt_e}}</div>
													</div>
												</div>
												@endif
												@endforeach
											</div>
											@endif
											@endfor
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
			<!-- ROW 3 END -->
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
	var indexTipe = 1;
	var change = 0;
	var changeTipe = 0;


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
				var kolom = document.getElementById('jumlahkolom').value;
				var testKolom = testTime * kolom;
				if(changeTipe==testKolom){

					//change tipe
					console.log('alsjdflasjdfljasdlf');
					console.log("---------------------");
					console.log("index tipe = "+indexTipe);
					var x = document.getElementById("tipe"+indexTipe);
					var x1 = document.getElementById("tipeB"+indexTipe);
					indexTipe++;
					console.log("index tipe = "+indexTipe);
					var y = document.getElementById("tipe"+indexTipe);
					var y1 = document.getElementById("tipeB"+indexTipe);
					
					x.style.display = "none";
					x1.style.display = "none";
					y.style.display = "block";
					y1.style.display = "block";
					
					index = 1;
					changeTipe=1;
					change=1;
				}else {
					
					changeTipe+=1;

					if(change==testTime){
						console.log("---------------------");
						console.log("index = "+index);
						var x = document.getElementById("kolom"+indexTipe+''+index);
						var a = document.getElementById("KolomB-"+indexTipe+''+index);
						index++;
						console.log("index y = "+index);
						var y = document.getElementById("kolom"+indexTipe+''+index);
						var b = document.getElementById("KolomB-"+indexTipe+''+index);
						console.log("divx ke - ."+x+".");
						console.log("divy ke - ."+y+".");

						x.style.display = "none";
						y.style.display = "block";
						a.style.display = "none";
						b.style.display = "block";
						change=1;
					}else{
						change+=1;
					}
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
	var type = document.getElementById('tipe').value;
	console.log("test time :"+testTime);
	console.log("kolom :"+kolom);
	console.log("total :"+testTime*kolom);
	CountDown(testTime * kolom * type,div);

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

function nextSoal(tipe, kolom, index, arrIndex, answer){
	console.log(kolom);
	console.log(index);
	answerArr[arrIndex-1] = answer;
	var x = document.getElementById("soalkolom-"+tipe+'-'+kolom+'-'+index);
	index++;
	console.log("index y = "+index);
	var y = document.getElementById("soalkolom-"+tipe+'-'+kolom+'-'+index);
	console.log("divx ke - ."+x+".");
	console.log("divy ke - ."+y+".");
	x.style.display = "none";
	y.style.display = "block";
}
/////////////////////////////end///////////////////////

</script>
@endsection
