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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" /> -->

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">

    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Tagsinput CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->
    <style>
        input {
            background: white !important;
            /* border: 1px solid rgb(159, 158, 158) !important; */
        }

        li,
        h3 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 30px !important;
        }
        a{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

        }
        th {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

            font-size: 25px !important;

        }

        td {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        li {
            font-size: 20px !important;
        }

        td>input:focus {
            box-shadow: 0px 0px 8px rgb(126, 126, 126) !important;
            z-index: 1000 !important;
            transition: all 0.2s;
            transform: scaleX(1.03) !important;
            overflow-x: hidden;
            border: none;
        }

        input::placeholder {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 17px !important;
        }

        .swal-modal {
            padding: 20px 24px;
            width: 600px;
        }

        .swal-modal div {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        .swal-text {
            text-align: right;

        }

        .swal-button {
            background: #d65353;
            font-size: 18px;
        }

    </style>
</head>

<body>
    <!-- Main Wrapper -->
    <a href="/admin/pdcProgramInfo/{{ $programID }}" class="btn btn-primary apply-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <div class="main-wrapper m-auto col-md-11">


        <!-- Logo -->
        <div class="account-logo mt-5">
            <a href="#"><img src="{{ asset('assets/img/logo2.png') }}" alt="Dreamguy's Technologies"></a>
        </div>
        <div>
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="page-title">سوبتیا پاڼه</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">د پي ډي سي د پروګارم دګډونوالو لیست</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table table-nowrap mb-0 ">
                                <thead>
                                    @if ($errors->any())
                                        <div class="mb-2" id="alertMassege">
                                            <ul style="list-style-type:none" class="p-0 m-0">

                                                @foreach ($errors->all() as $error)
                                                    <li class="rounded p-2 m-1 alert alert-danger">
                                                        {{ $error }}
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    @endif
                                    <tr class="col-12"
                                        style="background: linear-gradient(to right, #00c5fb 0%, #0253cc 100%);">
                                        <th class=" col-2 p-3 border text-light" style="font-size: 18px;">
                                            <strong>ګډونوال</strong>
                                        </th>
                                        <th class="text-center border col-5 p-3" style="font-size: 18px;">
                                            <strong>سوبتیا</strong>
                                        </th>
                                        <th class="text-center border col-5 p-3" style="font-size: 18px;">
                                            <strong>ناسوبتیا</strong>
                                        </th>

                                    </tr>

                                </thead>
                                <tbody class="overflow-hidden">
                                    <form action="/admin/pdcProgramAttendanceEntry" class=""
                                        method="POST">

                                        {{ method_field('POST') }}
                                        {{ csrf_field() }}
                                        <input type="text" class="d-none" name="program_id"
                                            value="{{ $programID }}">
                                        @if (count($unAttendancedParticipants) === 0)
                                            <tr class="p-0">
                                                <td colspan="3" class="p-0">
                                                    <div class="" id="alertMassege">
                                                        <ul style="list-style-type:none" class="p-0 m-0">
                                                            <li class="rounded p-4 my-3  success alert-success text-center"
                                                                style="font-size: 25px !important;">
                                                                د ټولو ګډونوالو حاضري سیسټم ته داخل کړل سوی دی!
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($unAttendancedParticipants as $participant)
                                                <tr class="border col-12">
                                                    <td class="border-left p-3 col-2" style="font-weight: bold;">
                                                        {{ $participant->name }} {{ $participant->last_name }}
                                                    </td>
                                                    <td class="text-center p-1 border-left ">
                                                        <input class="form-control text-center col-11 m-auto"
                                                            type="number" placeholder="سوبتیا"
                                                            name="presence[{{ $loop->index }}]"
                                                            value="{{ old('presence[0]') }}">
                                                    </td>
                                                    <td class="text-center p-1 border-left ">
                                                        <input class="form-control text-center col-11 m-auto"
                                                            type="number" placeholder="ناسوبتیا"
                                                            name="absence[{{ $loop->index }}]">
                                                    </td>
                                                    <td class="d-none">
                                                        <input type="text" class="d-none"
                                                            name="participant_id[{{ $loop->index }}]" id=""
                                                            value="{{ $participant->user_id }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="text-center"><button type="submit"
                                                        class="btn btn-info btn-lg col-4">معلومات ثبت کړی</button></td>
                                            </tr>
                                        @endif

                                    </form>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Main Wrapper -->





    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- Datetimepicker JS -->
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Select2 JS -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <!-- Tagsinput JS -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <!-- bootstrap growl js -->
    <script src="{{ asset('assets/growl/jquery.bootstrap-growl.min.js') }}"></script>
    <!-- sweet alert -->
    <script src="{{ asset('assets/sweet-alert/sweetalert.min.js') }}"></script>

    <script src="{{ asset('assets/form-js/jquery.form.min.js') }}"></script>

    @if (Session::has('program_added'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('program_added') !!}", "success", {
                button: "مننه",
            });
        </script>
    @endif
    @if (Session::has('attendance_not_added'))
        <script>
            swal('وبخښی !', "{!! Session::get('attendance_not_added') !!}", "warning", {
                button: "بیا ځلي معلومات داخل کړی",
            });
        </script>
    @endif
</body>

</html>
