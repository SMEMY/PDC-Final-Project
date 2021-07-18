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
		#save_info a:hover{
			transform: scale(1.05);
			transition: all  0.2s;
			<!-- font-size: 16px !important; -->
		}
		#small li, #small a{
			font-size: 17px !important;
			font-wieght: bold;
			border-radius: 15px !important;
		}
		i{
			color: green;

		}
		#images img{
			width: 95% !important;
			height: 350px !important;
		}
		
@endsection

<!-- here we add dynamic content -->
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
	
	<!-- Page Content -->
	<div class="content">


		<!-- Account Logo -->
		
		<!-- /Account Logo -->
		<div class="row col-md-12">
			<div class="col-md-8">
				<div class="job-info job-widget">
				<h4 class="m-auto " style="width: fit-content"><i class="pr-2 fa fa-"></i>د اړونده پروګرام په اړه معلومات</h4>
					<br>
					<br>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام نوم: : <span
						class="text-blue">{{ $programs->name }}</span></li>

						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام ډول: <span
						class="text-blue">{{ $programs->type }}</span></li>

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
						<li class="col-md-12"><i class="pr-2 fa fa-users"></i>په پروګرام کي د ګډونوالو شمېر: <span
								class="text-blue">{{$programs->participant_amount}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-money"></i>د پروګرام فیس: <span
								class="text-blue">{{$programs->fee}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-qrcode"></i>د پروګرام کوډ د ګډونوالو لپاره: <span
								class="text-white bg-info p-1" style="border-radius: 5px; font-weight:bold">(- {{$programs->participant_code}} -)</span></li>
						<li class="col-md-12"><i class="pr- fa fa-qrcode"></i> د پروګرام کوډ د تسهیلونکو لپاره : <span
								class="text-white bg-info p-1" style="border-radius: 5px; font-weight:bold">(- {{$programs->facilitator_code}} -)</span></li>		
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
						<h4>د پروګرام  اجنډا: </h4>
					</div>
					<div class="job-description">
						<ul class="square-list">
					

							@foreach( $programs->getAgendas as $agenda)
							<li> {{ $agenda->agenda }} </li>
							
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
					<div class="job-desc-title">
						<h4>د پروګرام  انځورونه: </h4>
					</div>
					<div id="images">
						<ul class="square-list">
							@foreach($programs->getPhotos as $photo)
							<li>
								 <img src="{{ asset( 'storage/images/'.$photo->path) }}" alt="none" class="img-fluid rounded  mx-auto d-block  m-1" srcset="">
							</li>
							@endforeach
						</ul>
					</div>
					
					
				</div>
			</div>
			<div class="col-md-4" id="small"> 
				<div class="job-det-info job-widget" style="padding:10px; border-radius: 5px; box-shadow:1px 0px 3px 0px #00beff" id="date">
					<h4 class="account-title">نېټه</h4>
					
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i><strong>د جوړېدو نېټه: </strong><span class="text-blue">{{ $programs->year }} - {{$programs->month}} - {{$programs->start_day}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i><strong>د جوړېدو نېټه: </strong><span class="text-blue">{{ $programs->year }} - {{$programs->month}} - {{$programs->end_day}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-clock-o"></i><strong>د شروع کېدو وخت: </strong><span class="text-blue">{{ $programs->start_time }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-clock-o"></i><strong>د شروع کېدو وخت: </strong><span class="text-blue">{{ $programs->end_time }}</span></li>
					
					</ul>
					<!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
				</div>
				<div class="job-det-info job-widget" style="padding:10px; box-shadow:1px 0px 3px 0px #00beff; border-radius: 5px; " id="address">
					<h4 class="account-title">پته   </h4>
				
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-university"></i><strong>د ساحې نوم:  </strong><span class="text-blue">{{ $programs->campus_name }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-building"></i><strong> د ودانۍ نوم:  </strong><span class="text-blue">{{ $programs->block_name }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-calculator"></i><strong> د ودانۍ شمېره: </strong><span class="text-blue">{{ $programs->block_number }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-calculator"></i><strong> د صالون شمېره: </strong><span class="text-blue">{{ $programs->room_number }}</span></li>
					
					</ul>
					<!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
				</div>
				<div class="job-det-info job-widget" style="padding:20px; box-shadow:1px 0px 5px 0px #00beff; border-radius: 5px; " id="save_info">
					<h4 class="account-title">معلومات ثبتول</h4>

					<a class="btn job-btn mt-3 p-2" href="/pdcProgramAttendance/{{$programs->id}}" >د پروګرام د ګډونوالو حاضري ثبتول</a>
					<a class="btn job-btn mt-3 p-2" href="/pdcProgramEvaluation/{{$programs->id}}" >د پروګرام ارزوني ثبتول</a>
					<a class="btn job-btn mt-3 p-2" href="/pdcProgramResult/{{$programs->id}}" >د پروګرام پایلي ثبتول</a>
					<a class="btn job-btn mt-3 p-2" href="/pdcProgramPhoto/{{$programs->id}}" >د پروګرام تفرقه ثبتول</a>
					<a class="btn job-btn mt-3 p-2" href="/storeMaterials/{{$programs->id}}" >د پروګرام درسي موادو ثبتول</a>
					<a class="btn job-btn mt-3 p-2" href="/feedbackFormInsertion/{{$programs->id}}" >د پروګرام پوښتنلیک ثبتول</a>
				</div>
				<div class="job-det-info job-widget" style="padding:20px; box-shadow:1px 0px 5px 0px #00beff; border-radius: 5px; " id="save_info">
					<h4 class="account-title">د پروګرام  نور معلومات </h4>

					<a class="btn job-btn mt-3 p-2 bg-danger" href="" >د پروګرام تسهیلونکی</a>
					<a class="btn job-btn mt-3 p-2" href="/specificeProgramParticipants/{{$programs->id}}" >د پروګرام د ګډونوالو لیست</a>
					<a class="btn job-btn mt-3 p-2 bg-danger" href="/pdcProgramAttendancePaper/{{$programs->id}}" >د پروګرام د ګډونوالو حاضري پاڼه</a>
					<a class="btn job-btn mt-3 p-2 " href="/pdcProgramAttendanceReport/{{$programs->id}}" >د پروګرام د ګډونوالو د سوبتیا راپور </a>
					<a class="btn job-btn mt-3 p-2" href="/feedback/{{$programs->id}}" >د پروګرام پوښتنلیک ډوکول</a>
					<a class="btn job-btn mt-3 p-2 bg-danger" href="/" >د پروګرام پوښتنلیک اوسط</a>
					<a class="btn job-btn mt-3 p-2 bg-danger" href="/materials/{{$programs->id}}" >د پروګرام تدریسي مواد</a>

				</div>
			</div>
		</div>
	</div>
<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
@endsection

