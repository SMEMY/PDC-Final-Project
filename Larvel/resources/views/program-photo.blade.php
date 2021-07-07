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
	<title>Projects - HRMS admin template</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

	<!-- Summernote CSS -->
	<link rel="stylesheet" href="assets/plugins/summernote/dist/summernote-bs4.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper m-auto col-md-8">



		<!-- Logo -->
		<div class="account-logo mt-5">
			<a href="index.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
		</div>
		<!-- /Logo -->

		<div class="" style="min-height: 371px;">
			<div class="content ">
				<div class="row ">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header p-lg-5">
								<h4 class="card-title mb-0">د اوړنده پروکرام په اړه د انځورونو پاڼه</h4>
							</div>
							<div class="card-body">
								<form action="#">
									<div class="row " id="files">
										<div class=" col-md-12">
											<div class="form-group custom-file ">
												<input type="file" class="custom-file-input" id="customFile"
													name="program_photo1" onchange="nameShow()">
												<label class="custom-file-label" for="customFile">د پروګرام اړونده عکس
													انتخاب کړي</label>
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="form-group m-auto ">
											<button type="button" id="file-remover"
												class="btn btn-info mx-auto rounded-circle d-none"
												style="font-size: 20px;" onclick="removeFile()">&times;</button>
											<button type="button" class="btn btn-info mx-auto rounded-circle"
												style="font-size: 20px;;" onclick="addFile(), el()">&plus;</button>
											<!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
										</div>
									</div>


									<div class="text-right mt-5">
										<button type="submit" class="btn btn-primary w-25">Submit</button>
									</div>
								</form>
							</div>
						</div>
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

	<!-- Slimscroll JS -->
	<script src="assets/js/jquery.slimscroll.min.js"></script>

	<!-- Select2 JS -->
	<script src="assets/js/select2.min.js"></script>

	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Summernote JS -->
	<script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
	<script>

		var count4 = 2;
		function addFile() {
			var txt1 =
				`	<div class=" col-md-12 mt-3" >
														<div class="form-group custom-file ">
															<input type="file" class="custom-file-input" id="customFile"
																name="program_photo${count4}">
															<label class="custom-file-label" for="customFile">د پروګرام اړونده
																فایل
																انتخاب کړی</label>
														</div>
													</div>`;

			$("#files").children().last().after(txt1);
			$('#file-remover').removeClass('d-none');
			count4++;   // Insert new elements after img
		}
		function removeFile() {

			if (count4 != 2) {
				$('#files').children().last().remove();
				count4--;
			}
			if (count4 == 2) {
				$('#file-remover').addClass('d-none');

			}

		}
		function el() {
			$(".custom-file-input").on("change", function () {
				var fileName = $(this).val().split("\\").pop();
				$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
			});
		}
		el();

		// $(".custom-file-input").on("change", function () {
		// 	var fileName = $(this).val().split("\\").pop();
		// 	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		// });
	</script>
</body>

</html>