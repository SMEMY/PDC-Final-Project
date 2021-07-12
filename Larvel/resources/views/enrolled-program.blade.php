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
    <title>PDC Programs</title>

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
        li {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 16px !important;

	}
    h3{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 25px !important;
        }
        p{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
        }
        a{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
        }
        h4{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
        }
        p {
     max-width: 1030px;
     white-space: nowrap;
     overflow: hidden;
     text-overflow: ellipsis;
}
    </style>
</head>

<body>



    <!-- Page Content -->
    <div class="content container">
        <!-- Account Logo -->
        <div class="account-logo mt-5">
            <a href="index.html"><img src="{{asset('assets/img/logo2.png')}}" alt="Dreamguy's Technologies"></a>
        </div>
        <!-- Page Header -->
        <div class="page-header mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">د مسلکي پرمختیایي مرکز پروګرامونه</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">پروګرامونه</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <nav class="col-md-12">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active col-md-6 text-center p-2 text-lg" id="nav-enroll-tab" data-toggle="tab"
                        href="#nav-enroll" role="tab" aria-controls="nav-enroll" aria-selected="true"
                        onclick="tabChanger()">هغه پروګرامونه چي تاسو داخله پکښي کړېده</a>
                    <a class="nav-item nav-link col-md-6 text-center p-2 text-lg" id="nav-unenroll-tab" data-toggle="tab"
                        href="#nav-unenroll" role="tab" aria-controls="nav-unenroll" aria-selected="false"
                        onclick="tabChanger()">هغه پروګرامونه چي تاسو غواړی داخله پکښي وکړی</a>
                </div>
            </nav>
            <div class="tab-content col-md-12" id="nav-tabContent">

                <div class="row tab-pane fade  show active" id="nav-enroll" role="tabpanel"
                    aria-labelledby="nav-enroll-tab">
                @foreach($enrolledPrograms as $program)
                <div class="col-md-12">
                     <a class="job-list  border border-info" href="/facilitatorEnrolledPrograms/{{$program->id}}">
                        <div class="job-list-det">
                            <div class="job-list-desc">
                                <h3 class="job-list-title">{{$program->name}}</h3>
                                <br>
                                <h4 class="job-department"><strong>د پروګرام ډول: </strong>{{ $program->type }}</h4>
                                <br !important>
                                <p class="text-muted"><strong>د پروګرام معلومات: </strong>{{$program->program_description}}</p>
                            </div>
                        
                        </div>
                        <div class="job-list-footer" style="background:#bde3fdc7;">
                            <ul>
                                <li class="mb-2 ml-3"><i class="fa fa-map-signs text-info"></i> <strong>ادرس: </strong>{{ $program->campus_name }}</li>
                                <li class="mb-2 ml-3"><i class="fa fa-money text-info"></i> <strong>د پروګرام فیس: </strong>{{ $program->fee }} {{ $program->fee_type }}</li>
                                <li class="mb-2 ml-3"><i class="fa fa-clock-o text-info"></i> <strong>د پروګرام دوام: </strong>{{ $program->days_duration }} ورځي</li>
                            </ul>
                        </div>
                    </a>
                </div>
                @endforeach
                </div>
                <div class="row tab-pane fade show " id="nav-unenroll" role="tabpanel"
                    aria-labelledby="nav-unenroll-tab">
                @foreach($notEnrolledPrograms as $program)

                <div class="col-md-12">
                     <a class="job-list  border border-info" href="/comAllPrograms/{{$program->id}}">
                        <div class="job-list-det">
                            <div class="job-list-desc">
                                <h3 class="job-list-title">{{$program->name}}</h3>
                                <br>
                                <h4 class="job-department"><strong>د پروګرام ډول: </strong>{{ $program->type }}</h4>
                                <br !important>
                                <p class="text-muted"><strong>د پروګرام معلومات: </strong>{{$program->program_description}}</p>
                            </div>
                        
                        </div>
                        <div class="job-list-footer" style="background:#ddedef;">
                            <ul>
                                <li class="mb-2 ml-3"><i class="fa fa-map-signs text-info"></i> <strong>ادرس: </strong>{{ $program->campus_name }}</li>
                                <li class="mb-2 ml-3"><i class="fa fa-money text-info"></i> <strong>د پروګرام فیس: </strong>{{ $program->fee }} {{ $program->fee_type }}</li>
                                <li class="mb-2 ml-3"><i class="fa fa-clock-o text-info"></i> <strong>د پروګرام دوام: </strong>{{ $program->days_duration }} ورځي</li>
                            </ul>
                        </div>
                    </a>
                </div>
                @endforeach
                   
                </div>
            </div>

        </div>
        <!-- /Account Logo -->






        <!-- jQuery -->
        <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

        <!-- Bootstrap Core JS -->
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

        <!-- Slimscroll JS -->
        <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

        <!-- Select2 JS -->
        <script src="{{asset('assets/js/select2.min.js')}}"></script>

        <!-- Custom JS -->
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script>
            function tabChanger() {
                if ($('#nav-enroll-tab').hasClass('active')) {
                    $('#nav-unenroll-tab').addClass('bg-white');
                    $('#nav-enroll-tab').removeClass('bg-white');
                }
                else {
                    $('#nav-enroll-tab').addClass('bg-white');
                    $('#nav-unenroll-tab').removeClass('bg-white');
                }
            }
        </script>
</body>


</html>