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


	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	<style>
		
		td{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			text-align: center !important;
			border-radius: 2px !important;
			padding:0px 5px !important;
			

		}
		th{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			text-align: center !important;
			padding:0px 4px !important;
			line-height: 15px;
			font-size: 15px !important;
			font-weight: bold !important;
		}
		h4{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-weight: bold !important;
			font-size: 20px !important;
			

		}
		h5{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

		}
		table{
			border-collapse: separate !important;
		}
	</style>
</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->

		<!-- /Header -->

		<!-- Sidebar -->

		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="m-3">
			<div class="content container-fluid col-12">
				<!-- <div class="account-logo mt-5">
					<a href="index.html"><img src="{{asset('assets/img/logo2.png')}}" alt="Dreamguy's Technologies"></a>
				</div> -->
				<!-- Page Header -->
				<div class=" mt-5">
					<div class="row">
						<div class="col-sm-12 text-center">

							<h4 class="page-title">?? ???????? ?????? ?????? ??????????</h4>
							<h4 class="page-title">???????????? ??????????????</h4>
							<h4 class="page-title">?????????? ???????????????? ????????</h4>
							<h4 class="page-title">?? ?????????? ?????????? ???? (??) ???????? ???????????????????? ???????????? ?? ???????? ??????????</h4>
							<h5 class="text-left pl-4">?? ???????? ????????: {{$program[0]->year}} - {{$program[0]->month}} - {{$program[0]->start_day}} </h5>
							<h5 class="text-left pl-4">?? ?????? ????????: {{$program[0]->year}} - {{$program[0]->month}} - {{$program[0]->end_day}} </h5>
						</div>
					</div>
				</div>
				<!-- /Page Header -->


				<div class="row" id="print">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table table-nowrap ">
								<thead>
									<tr>
										<th class=" border border-dark bg-gradient-info         ">
											??????
										</th>
										<th class=" border border-dark bg-gradient-info px-1">??????</th>
										<th class=" border border-dark bg-gradient-info px-1">????????</th>
										

									</tr>
									
								</thead>
								<tbody>
									
									<tr>
										<td class="border border-dark">
											
										</td>
										<td class="border border-dark px-1"> </td>
										<td class="border border-dark px-1"></td>
										

									</tr>
								

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->

			<!-- Attendance Modal -->
			<div class="modal custom-modal fade" id="attendance_info" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Attendance Info</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<div class="card punch-status">
										<div class="card-body">
											<h5 class="card-title">Timesheet <small class="text-muted">11 Mar
													2019</small></h5>
											<div class="punch-det">
												<h6>Punch In at</h6>
												<p>Wed, 11th Mar 2019 10.00 AM</p>
											</div>
											<div class="punch-info">
												<div class="punch-hours">
													<span>3.45 hrs</span>
												</div>
											</div>
											<div class="punch-det">
												<h6>Punch Out at</h6>
												<p>Wed, 20th Feb 2019 9.00 PM</p>
											</div>
											<div class="statistics">
												<div class="row">
													<div class="col-md-6 col-6 text-center">
														<div class="stats-box">
															<p>Break</p>
															<h6>1.21 hrs</h6>
														</div>
													</div>
													<div class="col-md-6 col-6 text-center">
														<div class="stats-box">
															<p>Overtime</p>
															<h6>3 hrs</h6>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="card recent-activity">
										<div class="card-body">
											<h5 class="card-title">Activity</h5>
											<ul class="res-activity-list">
												<li>
													<p class="mb-0">Punch In at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														10.00 AM.
													</p>
												</li>
												<li>
													<p class="mb-0">Punch Out at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														11.00 AM.
													</p>
												</li>
												<li>
													<p class="mb-0">Punch In at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														11.15 AM.
													</p>
												</li>
												<li>
													<p class="mb-0">Punch Out at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														1.30 PM.
													</p>
												</li>
												<li>
													<p class="mb-0">Punch In at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														2.00 PM.
													</p>
												</li>
												<li>
													<p class="mb-0">Punch Out at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														7.30 PM.
													</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Attendance Modal -->

		</div>
		<!-- Page Wrapper -->

	</div>

	<!-- /Main Wrapper -->
	<!-- jQuery -->
	<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
	<!-- Bootstrap Core JS -->
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<!-- Slimscroll JS -->
	<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
	<!-- Chart JS -->
	<script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
	<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
	<script src="{{asset('assets/js/chart.js')}}"></script>
	<!-- Custom JS -->
	<script src="{{asset('assets/js/app.js')}}"></script>
	<!-- Datetimepicker JS -->
	<script src="{{asset('assets/js/moment.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
	<!-- Select2 JS -->
	<script src="{{asset('assets/js/select2.min.js')}}"></script>
	<!-- Tagsinput JS -->
	<script src="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>


</body>

</html>