<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords"
		content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>@yield('page-title')</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

<!-- Fontawesome CSS -->
<link  href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">

<!-- <link type="text/css" rel="stylesheet" href="{{mix('css/app.css')}}"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" /> -->

<!-- Lineawesome CSS -->
<link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">

<!-- Chart CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    
<!-- Tagsinput CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
	<style>
		
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
		a{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

		}
		#date, #address{
			transition: all  0.3s;

		}
		#date:hover, #address:hover{
			transform: scale(1.04);
			transition: all  0.4s;
		}
	</style>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<!-- Page Content -->
	<div class="content m-auto" style="width:1400px !important;">


		<!-- Account Logo -->
		<div class="account-logo my-5">
			<a href="index.html"><img src="{{asset('assets/img/logo2.png')}}" alt="Dreamguy's Technologies"></a>
		</div>
		<!-- /Account Logo -->
		<div class="row col-md-12">
		<div class="col-md-7 ml-5">
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
						<h4>د پروګرام سهولتونه: </h4>
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

					<div class="" >
						<a class="btn job-btn mt-3 p-2" href="//{{$programs->id}}" >په پروګرام کي ځان ثبتول</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="job-det-info job-widget" style="border-radius: 5px; box-shadow:1px 0px 5px 0px #00beff" id="date">
					<h4 class="account-title">نېټه</h4>
					<br>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i><strong>د جوړېدو نېټه: </strong><span class="text-blue">{{ $programs->year }} - {{$programs->month}} - {{$programs->start_day}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i><strong>د ختمېدو نېته: </strong><span class="text-blue">{{ $programs->year }} - {{$programs->month}} - {{$programs->end_day}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-clock-o"></i><strong>د شروع کېدو وخت: </strong><span class="text-blue">{{ $programs->start_time }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-clock-o"></i><strong>د ختمېدو وخت: </strong><span class="text-blue">{{ $programs->end_time }}</span></li>
					
					</ul>
					<!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
				</div>
				<div class="job-det-info job-widget" style=" box-shadow:1px 0px 5px 0px #00beff; border-radius: 5px; " id="address">
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
			
			</div>
		</div>
	</div>
	<!-- /Page Content -->






</body>

</html>