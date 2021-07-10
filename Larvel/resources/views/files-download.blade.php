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
    <title>feedback</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- <link type="text/css" rel="stylesheet" href="{{mix('css/app.css')}}"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" /> -->

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
	<style>
		input {
			border-radius: 4px !important;
		}
	</style>
</head>

<body>
	
	<!-- Main Wrapper -->
	<div class="main-wrapper">
	<a href="/comAllPrograms/{{$id}}" class="btn btn-primary apply-btn">پروګرامونه ووینی</a>



		<!-- Page Wrapper -->
		<div style="position: relative; top:80px">

			<!-- Page Content -->
			<div class="content container-fluid">

				<div class="row">
					<div class="col-sm-12">
						<div class="file-wrap">
							<div class="file-sidebar">
								<div class="file-header justify-content-center">
									<span>پروګرامونه</span>
									<a href="javascript:void(0);" class="file-side-close"><i
											class="fa fa-times"></i></a>
								</div>
								
								<form class="file-search">
									<div class="input-group" style="padding-top: 10px; padding-bottom: 24px;">
										<div class="input-group-prepend" style="top:-15px">
											<i class="fa fa-search"></i>
										</div>
										<input type="text" class="form-control" placeholder="Search" style="height: 48px;">
									</div>
								</form>
								<div class="file-pro-list">
									<div class="file-scroll">
										<ul class="file-menu">
											<li class="active">
												<a href="#">HLMS اړونده پروګرام</a>
											</li>
											<li>
												<a href="#">د ې ګانو اړونده ورکشاپ</a>
											</li>
											<li>
												<a href="#">Video Calling App</a>
											</li>
											<li>
												<a href="#">Hospital Administration</a>
											</li>
											<li>
												<a href="#">Virtual Host</a>
											</li>
										</ul>
										<div class="show-more">
											<a href="#">نور پروګرامونه</a>
										</div>
									</div>
								</div>
							</div>
							<div class="file-cont-wrap w-100">
								<div class="file-cont-inner">
									<div class="file-cont-header">
										<div class="file-options">
											<a href="javascript:void(0)" id="file_sidebar_toggle"
												class="file-sidebar-toggle">
												<i class="fa fa-bars"></i>
											</a>
										</div>
										<span class="text-center">د ې ګانو اړونده ورکشاپ</span>
										<div class="file-options">
											<span class="btn-file text-white"><i class="fa fa-upload"></i></span>
										</div>
									</div>
									<div class="file-content">
										<form class="file-search">
											<div class="row py-2">
												<div class="col-sm-6 col-md-4">
													<div class="form-group form-focus">
														<input type="text" class="form-control floating">
														<label class="focus-label">د فایل نوم
														</label>
													</div>
												</div>
												<div class="col-md-4" id="rank">
													<div class="form-group">
														<select class="form-control custom-select"
															style="height: 50px;">
															<!-- <option selected="">جنسیت</option> -->
															<option selected>د فایل ډول انتخاب کړی</option>
															<option value="2">تدریسي</option>
															<option value="3">اداري او تدریسي</option>
															<!-- <option value="3">اداري کارمند</option> -->
														</select>
													</div>
												</div>
												<div class="form-group text-center col-md-4">
													<button class="btn btn-primary btn-lg account-btn w-100"
														type="submit">پلټنه</button>
												</div>
											</div>
										</form>
										<div class="file-body">
											<div class="file-scroll">
												<div class="file-content-inner">
													<h4>Recent Files</h4>
													<div class="row">


														<div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
															<div class="card card-file">
																<div class="dropdown-file">
																	<a href="" class="dropdown-link"
																		data-toggle="dropdown"><i
																			class="fa fa-ellipsis-v"></i></a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<!-- <a href="#" class="dropdown-item">View
																			Details</a> -->
																		<!-- <a href="#" class="dropdown-item">Share</a> -->
																		<a href="#" class="dropdown-item">Download</a>
																		<!-- <a href="#" class="dropdown-item">Rename</a> -->
																		<!-- <a href="#" class="dropdown-item">Delete</a> -->
																	</div>
																</div>
																<div class="card-file-thumb">
																	<!-- <i class="fa fa-file-powerpoint-o"></i> -->
																	<i class="fa fa-file-word-o" style="color: rgb(81, 182, 255);"></i>
																	
																</div>
																<div class="card-body">
																	<h6><a href="">پنځه ډوله (ی) ګاني.pptx</a></h6>
																	<span>22.67kb</span>
																</div>
																<div class="card-footer">
																	<span class="d-none d-sm-inline">Last Modified:
																	</span>
																</div>
															</div>
														</div>
													




													</div>

													<h4>Files</h4>
													<div class="row">



														<div class="col-md-3 ">
															<div class="card card-file">
																<div class="dropdown-file">
																	<a href="" class="dropdown-link"
																		data-toggle="dropdown"><i
																			class="fa fa-ellipsis-v"></i></a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a href="#" class="dropdown-item">View
																			Details</a>
																		<a href="#" class="dropdown-item">Share</a>
																		<a href="#" class="dropdown-item">Download</a>
																		<a href="#" class="dropdown-item">Rename</a>
																		<a href="#" class="dropdown-item">Delete</a>
																	</div>
																</div>
																<div class="card-file-thumb">
																	<i class="fa fa-file-audio-o"></i>
																</div>
																<div class="card-body">
																	<h6><a href="">Volk;;l;ice.mp3</a></h6>
																	<span>2.17mb</span>
																</div>
																<div class="card-footer">
																	<span class="d-none d-sm-inline">Last Modified:
																	</span>30 Jul 9:00 PM
																</div>
															</div>
														</div>


													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- /Page Content -->

		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->

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
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Select2 JS -->
    <script src="assets/js/select2.min.js"></script>
    <!-- Tagsinput JS -->
    <script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

</body>

</html>