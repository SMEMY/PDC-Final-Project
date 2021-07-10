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
	<title>PDC programs</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

	<!-- Fontawesome CSS -->
	<!-- <link  href="asset('assets/css/font-awesome.min.css')" rel="stylesheet"> -->

    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">

	<!-- Chart CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
		
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
	<!-- Tagsinput CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<!-- Page Content -->
	<div class="content container">


		<!-- Account Logo -->
		<div class="account-logo my-5">
			<a href="index.html"><img src="{{asset('assets/img/logo2.png')}}" alt="Dreamguy's Technologies"></a>
		</div>
		<!-- /Account Logo -->
		<div class="row col-md-12">
			<div class="col-md-8">
				<div class="job-info job-widget">
					<h3 class="job-title">د پروګرام نوم: {{ $programs->name }}</h3>
					<span class="job-dept">د پروګرام ډول: {{ $programs->type }}</span>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i>د شروع کېدو وخت:<span class="text-blue">{{ $programs->year }}/ {{ $programs->month }}/ {{ $programs->start_day }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i>د ختمېدو وخت: <span class="text-blue"> {{ $programs->year }}/ {{ $programs->month }}/ {{ $programs->end_day  }} </span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام تسهیلونکی: <span
								class="text-blue">{{ null }}</span></li>
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

					<a class="btn job-btn mt-4" href="programEnrollment" >ځان ثبت کړئ</a>
				</div>
			</div>
			<div class="col-md-4 ">
				<div class="job-det-info job-widget">
					<h3 class="account-title">نور معلومات</h3>
					<div class="info-list">
						<span><i class="fa fa-bar-chart"></i></span>
						<h5>حالت</h5>
						<p>شروع </p>
					</div>
					<div class="info-list">
						<span><i class="fa fa-ticket"></i></span>
						<h5>تصدیق پاڼه</h5>
						<p>هو</p>
					</div>
					<div class="info-list">
						<span><i class="fa fa-map-signs"></i></span>
						<h5>موقېعت</h5>
						<p>کمپس:  {{$programs->campus_name}}</p>
						<p>تعمیر: {{$programs->block_name}}</p>
						<p>د اطاق نمبر: {{$programs->room_number}}</p>
					</div>
					<div class="info-list">
						<span><i class="fa fa-phone"></i></span>
						<h5>ټلیفون</h5>

						<p> 070-030-1212
						</p>
					</div>
					<div class="info-list">
						<span><i class="fa fa-envelope-square"></i></span>
						<h5>برېښنالیک</h5>

						<p> PDC@gmail.com</p>
					</div>
					<div class="info-list text-center">
						<a class="app-ends" href="#"> {{date('d-m-Y') }} </a>
					</div>
					<br>
					<!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Content -->






</body>

</html>