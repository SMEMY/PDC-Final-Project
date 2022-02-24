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
			h4{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
				font-size: 30px !important;
			}
			span{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			}
			textarea{
			background: #f0fcff !important;
            max-height: 200px; !important;
            min-height: 44px; !important;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 20px !important;
			color: black !important;
			}
			#alertMassege li{
				font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
					font-size: 20px !important;
			}
		</style>
</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper m-auto col-md-8">



		<!-- Logo -->
		<div class="account-logo mt-5">
			<a href="index.html"><img src="{{asset('assets/img/logo2.png')}}" alt="Dreamguy's Technologies"></a>
		</div>
		<!-- /Logo -->

		<div class="" style="min-height: 371px;">

			<div class="content ">

				<div class="row ">

					<div class="col-md-12">
						<div class="card">
							<div class="card-header p-lg-5">
								<h4 class="card-title mb-0">د اوړنده پروکرام په اړه د سهولتونو د ثبتولو پاڼه</h4>
							</div>
							<div class="card-body">
								<form action="/admin/pdcProgramAgenda" method="POST" >
								{{ method_field('POST') }}
                            	{{ csrf_field() }}
								<input class="d-none" type="text" value="{{$programID}}" name='program_id'>
									@if ($errors->any())
										<div class="mb-2" id="alertMassege">
											<ul style="list-style-type:none" class="p-0 m-0">
												@foreach ($errors->all() as $error)
												<li class="rounded p-2 m-1 alert alert-danger" >
													{{ $error }}
												</li>
												@endforeach
											</ul>
										</div>
									@endif
                                    <div class="row" id="files">
                                        <div class="input-group col-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">د پروګرام اجنډا</span>
                                            </div>
                                            <textarea class="form-control" aria-label="With textarea" name="agenda[0]"></textarea>
                                        </div>
                                    </div>
									<div class="row mt-3 col-md-12">
										<div class="form-group m-auto ">
											<button type="button" id="file-remover"
												class="btn btn-info mx-auto rounded-circle d-none"
												style="font-size: 20px;" onclick="removeFile()">&times;</button>
											<button type="button" class="btn btn-info mx-auto rounded-circle"
												style="font-size: 20px;;" onclick="addFile()">&plus;</button>
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


	<script>

		var count4 = 2;
		var index = 1;
		function addFile() {
			var txt1 =
				`
			<div class="input-group mt-5 col-md-12">
				<div class="input-group-prepend">
					<span class="input-group-text">د پروګرام اجنډا</span>
				</div>
				<textarea class="form-control" aria-label="With textarea" name="agenda[${index}]"></textarea>
			</div>`;

			$("#files").children().last().after(txt1);
			$('#file-remover').removeClass('d-none');
			count4++;
			index++;   // Insert new elements after img
		}
		function removeFile() {

			if (count4 != 2) {
				$('#files').children().last().remove();
				count4--;
				index--;
			}
			if (count4 == 2) {
				$('#file-remover').addClass('d-none');

			}

		}
		


	</script>
</body>

</html>