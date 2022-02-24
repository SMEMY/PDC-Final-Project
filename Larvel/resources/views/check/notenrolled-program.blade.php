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
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/css/select2.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

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
            <a href="index.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
        </div>
        <!-- /Account Logo -->
        <!-- Page Header -->
        <div class="page-header">
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
        @foreach($programs as $program)
            <div class="col-md-12">
                <a class="job-list  border border-info" href="programs/{{$program->id}}">
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
</body>

</html>
