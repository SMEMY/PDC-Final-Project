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
	<title>Register - HRMS admin template</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	<style>
		label {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
		}

		input:focus {
			border-color: #00c5fb !important;
		}
	</style>
</head>

<body class="account-page">

	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			<!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
			<div class="container ">

				<!-- Account Logo -->
				<div class="account-logo mt-5">
					<a href="index.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
				</div>
				<!-- /Account Logo -->

				<div class="account-box " style="width: 800px;">
					<div class="account-wrapper" style="">
						<h3 class="account-title">د اډمین راجسټر پاڼه</h3>
						<!-- <p class="account-subtitle"></p> -->

						<!-- Account Form -->
						<form action="/admin" method="POST">
							@csrf
							<div class="form-group">
								<label>نوم</label>
								<input class="form-control" name="name" type="text" placeholder="داډمېن نوم">
							</div>
							<div class="form-group">
								<label>تخلص</label>
								<input class="form-control" name="last_name" type="text" placeholder="داډمېن تخلص">
							</div>
							<div class="form-group">
								<label>برېښنالیک</label>
								<input class="form-control" name="email" type="email" placeholder="داډمېن برېښنالیک">
							</div>
							<div class="form-group">
								<label>ټلیفون شمېره</label>
								<input class="form-control" name="phone_number" type="text" placeholder="داډمېن برېښنالیک">
							</div>
							<div class="form-group">
								<label>پاسورډ</label>
								<input class="form-control" name="password" type="password" placeholder="نوی پاسورډ">
							</div>
							<div class="form-group">
								<label>پاسورډ تائید کړئ</label>
								<input class="form-control" type="password" placeholder="نوی پاسورډ تائید کړئ">
							</div>
							<div class="form-group text-center col-md-4 m-auto">
								<button class="btn btn-primary  account-btn col-md-12" type="submit">اډمېن ثبت
									کړئ</button>
							</div>
							<!-- <div class="account-footer">
								<p>Already have an account? <a href="login.html">Login</a></p>
							</div> -->
						</form>
						<!-- /Account Form -->

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>

</body>

</html>