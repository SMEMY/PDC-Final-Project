@extends('master.master')

<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
hahahaha
@endsection
<!-- here we add css custom style -->
@section('custom-css')
h4 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size:30px !important;
		}
        p, h5 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 20px !important;
		}
		a{
			font-size:20px !important;
		}
        li {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 20px !important;
		}
        h3 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

		}
		a:hover{
			transform: scale(1.08);
			transition: all  0.4s;
		}
@endsection

<!-- here we add dynamic content -->
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
	
	<!-- Page Content -->
	<div class="content">


		<!-- Account Logo -->
		<div class="account-logo my-5">
			<a href="index.html"><img src="{{asset('assets/img/logo2.png')}}" alt="Dreamguy's Technologies"></a>
		</div>
		<!-- /Account Logo -->
		<div class="row col-md-12">
			<div class="col-md-7">
				<div class="job-info job-widget">
				<h4 class="m-auto " style="width: fit-content"><i class="pr-2 fa fa-"></i>د اړونده پروګرام په اړه معلومات</h4>
<br>
<br>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام نوم: : <span
						class="text-blue">{{ $programs->name }}</span></li>

						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام ډول: <span
						class="text-blue">{{ $programs->type }}</span></li>

						<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i>د شروع کېدو وخت:<span class="text-blue">{{ $programs->year }}/ {{ $programs->month }}/ {{ $programs->start_day }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i>د ختمېدو وخت: <span class="text-blue"> {{ $programs->year }}/ {{ $programs->month }}/ {{ $programs->end_day  }} </span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام تسهیلونکی: <span
								class="text-blue">{{ $programs->facilitator }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام سپانسر: <span
								class="text-blue">{{ $programs->sponsor }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام همایه کوونکی: <span
								class="text-blue">{{ $programs->supporter }}</span></li>

						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام تنظیمونکی: <span
								class="text-blue">{{ $programs->manager }}</span></li>

						<li class="col-md-12"><i class="pr-2 fa fa-money"></i>د پروګرام بودیجه: <span
								class="text-blue">{{ $programs->fund }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-eye"></i>په پروګرام کي د ګډونوالو شمېر: <span
								class="text-blue">{{$programs->participant_amount}}</span></li>
								<li class="col-md-12"><i class="pr-2 fa fa-eye"></i>د پروګرام فیس: <span
								class="text-blue">{{$programs->fee}}</span></li>
					</ul>
				</div>
				<div class="job-content job-widget">
					
					<div class="job-desc-title">
						<h4>د اړونده پروګرام په اړه معلومات</h4>
					</div>
					<div class="job-description">
						<p> {{ $programs->program_description }} </p>
					</div>
					<div class="job-desc-title">
						<h4>د پروګرام سهولتونه</h4>
					</div>
					<div class="job-description">
						<ul class="square-list">
					

							@foreach( $programs->getFacilities as $facility)
							<li> {{ $facility->facility }} </li>
							
							@endforeach
						</ul>
					</div>
					<div class="job-desc-title">
						<h4>د پروګرام  پایلي: </h4>
					</div>
					<div class="job-description">
						<ul class="square-list">
					

							@foreach( $programs->getResults as $result)
							<li> {{ $result->result }} </li>
							
							@endforeach
						</ul>
					</div>
					<div class="job-desc-title">
						<h4>د پروګرام  ارزوني: </h4>
					</div>
					<div class="job-description">
						<ul class="square-list">
					

							@foreach( $programs->getEvaluations as $evaluation)
							<li> {{ $evaluation->evaluation }} </li>
							
							@endforeach
						</ul>
					</div>

					
				</div>
			</div>
			<div class="col-md-5">
				<div class="job-det-info job-widget" style="border-radius: 5px; box-shadow:1px 0px 5px 0px #00beff">
					<h4 class="account-title">نېټه</h4>
					<br>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i><strong>د جوړېدو نېټه: </strong><span class="text-blue">{{ $programs->year }} - {{$programs->month}} - {{$programs->start_day}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i><strong>د جوړېدو نېټه: </strong><span class="text-blue">{{ $programs->year }} - {{$programs->month}} - {{$programs->end_day}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-clock-o"></i><strong>د شروع کېدو وخت: </strong><span class="text-blue">{{ $programs->start_time }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-clock-o"></i><strong>د شروع کېدو وخت: </strong><span class="text-blue">{{ $programs->end_time }}</span></li>
					
					</ul>
					<!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
				</div>
				<div class="job-det-info job-widget" style=" box-shadow:1px 0px 5px 0px #00beff; border-radius: 5px; ">
					<h4 class="account-title">پته   </h4>
					<br>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-university"></i><strong>د ساحې نوم:  </strong><span class="text-blue">{{ $programs->campus_name }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-building"></i><strong> د ودانۍ نوم:  </strong><span class="text-blue">{{ $programs->block_name }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-calculator"></i><strong> د ودانۍ شمېره: </strong><span class="text-blue">{{ $programs->block_number }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-calculator"></i><strong> د صالون شمېره: </strong><span class="text-blue">{{ $programs->room_number }}</span></li>
					
					</ul>
					<!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
				</div>
				<div class="job-det-info job-widget" style=" box-shadow:1px 0px 5px 0px #00beff; border-radius: 5px; ">
				<h4 class="account-title">د پروګرام  نور معلومات ثبتول</h4>
<br>
					<a class="btn job-btn mt-3 p-2" href="/pdcProgramAttendance/{{$programs->id}}" >د پروګرام د ګډونوالو حاضري ثبت ول</a>
					<a class="btn job-btn mt-3 p-2" href="/pdcProgramEvaluation/{{$programs->id}}" >د پروګرام ارزوني ثبتول</a>
					<a class="btn job-btn mt-3 p-2" href="/pdcProgramResult/{{$programs->id}}" >د پروګرام پایلي ثبتول</a>
					<a class="btn job-btn mt-3 p-2" href="/pdcProgramResult/{{$programs->id}}" >د پروګرام تفرقه ثبتول</a>
				</div>
			</div>
		</div>
	</div>
<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
@endsection

