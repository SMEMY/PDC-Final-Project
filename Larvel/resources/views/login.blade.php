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
	<title>Login </title>

	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

<!-- bootstrao growl js -->

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
		*{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
		}
		label {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size:25px !important;
		}
		select:focus {
			box-shadow: 0px 0px 2px #000 !important;
			transition: all 0.1s;
			transform: scale(1.01);
		}
		select{
			font-size:20px !important;
		}
		input:focus {
			box-shadow: 0px 0px 2px #000 !important;
			transition: all 0.1s;
			transform: scale(1.02);
			font-size:20px !important;
		}
		textarea:focus {
			box-shadow: 0px 0px 2px #000 !important;
		}
        input {
			background: #f0fcff !important;
		}
		textarea{
			background: #f0fcff !important;
		}
		h3{
			font-size:30px !important;
		}
	</style>
</head>

<body class="account-page">

	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			<a href="programs-list.html" class="btn btn-primary apply-btn">See Programs</a>
			<div class="container">

				<!-- Account Logo -->
				<div class="account-logo">
					<img src="assets/img/logo2.png" alt="Dreamguy's Technologies">
				</div>
				<!-- /Account Logo -->

				<div class="account-box px-4 rounded">
					<div class="account-wrapper">
						<h3 class="account-title">داخلېدو پاڼه</h3>

						<!-- Account Form -->
						<form action="/login" method="POST">
							@csrf
							<div class="form-group">
								<label>برېښنالیک</label>
								<input class="form-control" type="text" name="email" value="{{old('email')}}">
								@error('email')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{$message}}
                                                </strong>
                                            </span>
                                        @enderror
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label>پاسورډ</label>
									</div>
									<div class="col-auto">
										<a class="text-muted" href="forgot-password.html">
											پاسورډ مو هېر سوی؟
										</a>
									</div>
								</div>
								<input class="form-control" type="password" name="password">
								@error('password')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{$message}}
                                                </strong>
                                            </span>
                                        @enderror
							</div>
							<div class="form-group text-center col-md-12 ">
								<button class="btn btn-primary submit-btn" type="submit">داخلېدل</button>
							</div>
							<div class="account-footer mt-3">
								<p>تر اوسه جاري حساب نلری؟ <a href="register.html">ځان ثبت کړی</a></p>
							</div>
						</form>
						<!-- /Account Form -->

					</div>
				</div>
			</div>
		</div>
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
	<!-- bootstrap growl js -->
	<script src="{{asset('assets/growl/jquery.bootstrap-growl.min.js')}}"></script>
	<!-- sweet alert -->
	<script src="{{asset('assets/sweet-alert/sweetalert.min.js')}}"></script>


</body>

</html>