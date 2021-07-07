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
		* {
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
		<a href="programs-list.html" class="btn btn-primary apply-btn">See Programs</a>
		<div class="account-content">
			<!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
			<div class="container ">

				<!-- Account Logo -->
				<div class="account-logo mt-5">
					<a href="index.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
				</div>
				<!-- /Account Logo -->

				<div class="account-box border board-danger mb-5" style="width: 1000px;">
					<div class="account-wrapper" style="">
						<h3 class="account-title">د تسهیلونکی د ثبتولو پاڼه</h3>
						<!-- <p class="account-subtitle"></p> -->

						<!-- Account Form -->
						<form action="/programInfo" method="POST">
						@csrf
						<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">نوم <span class="text-danger">*</span></label>
											<input class="form-control" type="text" value="" name="name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">تخلص</label>
											<input class="form-control " type="text" name="last_name">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">ټلیفون شمېره<span
													class="text-danger">*</span></label>
											<input class="form-control" type="tel" pattern="[0-9]+" name="phone_number">
										</div>
									</div>
									<div class=" col-md-12">
										<div class="form-group">
											<label class="col-form-label">برېښنالیک<span
													class="text-danger">*</span></label>
											<input class="form-control" type="email" name="email">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">جنسیت<span
													class="text-danger">*</span></label>
											<select class="form-control" name="gender">
												<!-- <option selected="">جنسیت</option> -->
												<option ></option>

												<option value="نارینه">نارینه</option>
												<option value="ښځینه">ښځینه</option>
											</select>

										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">کاري ساحې نوم<span
													class="text-danger">*</span></label>
											<select class="form-control" name="office_campus">
												<!-- <option selected="">جنسیت</option> -->
												<option ></option>

												<option value="کندهار پوهتون" > کندهار پوهنتون</option>
											</select>

										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">کاري دفتر<span
													class="text-danger">*</span></label>
											<select class="form-control" name="office_building">
												<!-- <option selected="">جنسیت</option> -->
												<option ></option>

												<option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
												<option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
												<option value="انجنیري">انجنیري</option>
											</select>

										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">کاري شعبه</label>
											<input class="form-control" type="text" name="office_department">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">کاري منصب<span
													class="text-danger">*</span></label>
											<select class="form-control" name="office_position">
												<!-- <option selected="">جنسیت</option> -->
												<option ></option>

												<option value="رئیس">رئیس</option>
												<option value="مرستیال">مرستیال</option>
												<option value="ښوونکی">ښوونکی</option>
												<option value="اداري کارمند">اداري کارمند</option>
											</select>
										</div>
									</div>
									<div class="col-md-12" id="rank">
										<div class="form-group">
											<label class="col-form-label"> کاري برخه<span
													class="text-danger">*</span></label>
											<select class="form-control rankS" name="office_position_category">
												<!-- <option selected="">جنسیت</option> -->
												<option ></option>

												<option value="اداري">اداري</option>
												<option value="تدریسي">تدریسي</option>
												<option value="اداري او تدریسي">اداري او تدریسي</option>
												<!-- <option value="3">اداري کارمند</option> -->
											</select>

										</div>
									</div>
									<!-- this part has been hidden just for DB Facilitator role -->
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">په پروګرام کي ستاسي نقش<span
													class="text-danger">*</span></label>
											<select class="form-control" name="role_in_program">
												<!-- <option selected="">جنسیت</option> -->
												<option ></option>
												<option value="تسهیلونکی">تسهیلونکی</option>
												<option value="ګډونوال">ګډونوال</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">پاسورډ<span
													class="text-danger">*</span></label>
											<input class="form-control" type="password" name="password">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">پاسورډ تائید کړی<span
													class="text-danger">*</span></label>
											<input class="form-control input-sm" type="password" name="password_confirm">
										</div>
									</div>


								</div>



							</div>
							<div class="form-group text-center col-md-4 m-auto">
								<button class="btn btn-primary  account-btn col-md-12" type="submit">تسهیلونکی ثبت
									کړی</button>
							</div>
							<div class="account-footer my-5">
								<p>آیا تر مخه مو حساب کړی دی؟ <a href="login.html">لاګ ان</a></p>
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
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
	<script>
		// function afterText() {
		var s = true;
		$("select.rankS").change(function () {
			var state = $(this).children("option:selected").val();
			// alert("You have selected the country - " + state);
			console.log(typeof state);
			if ((state === "تدریسي" || state === "اداري او تدریسي") && s === true) {
				var txt1 =
					`<div class="col-md-12" id="temp">
						<div class="form-group">
							<label class="col-form-label">علمي رتبه<span class="text-danger">*</span></label>
								<select class="form-control" name="educational_rank">
								<!-- <option selected="">جنسیت</option> -->
								<option value="پوهایالی">پوهایالی</option>
								<option value="پوهنیار">پوهنیار</option>
								<option value="پوهنمل">پوهنمل</option>
								<option value="پوهاند">پوهاند</option>
								<!-- <option value="3">اداري کارمند</option> -->
							</select>

						</div>
					</div>`;

				$("#rank").after(txt1);
				s = false;
			}
			else if (state === "اداري" && s === false) {
				$("#temp").remove();
				s = true
			}

		});
			    // Insert new elements after img
		// }
	</script>
</body>

</html>