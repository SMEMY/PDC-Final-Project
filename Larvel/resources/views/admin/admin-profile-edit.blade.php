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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- bootstrao growl js -->

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
        * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

        }

        label {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 25px !important;
        }

        select:focus {
            box-shadow: 0px 0px 2px #000 !important;

            transition: all 0.1s;
            transform: scale(1.01);
        }

        select {
            font-size: 20px !important;

        }

        input:focus {
            box-shadow: 0px 0px 2px #000 !important;
            transition: all 0.1s;
            transform: scale(1.02);
            font-size: 20px !important;

        }

        textarea:focus {
            box-shadow: 0px 0px 2px #000 !important;
        }

        input {
            background: #f0fcff !important;
        }

        textarea {
            background: #f0fcff !important;

        }

        h3 {
            font-size: 30px !important;

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
                    <a href="index.html"><img src="{{ asset('assets/img/logo2.png') }}"
                            alt="Dreamguy's Technologies"></a>
                </div>
                <!-- /Account Logo -->

                <div class="account-box " style="width: 1000px;">
                    <div class="account-wrapper" style="">
                        <h3 class="account-title p-3">د اډمین د معلوماتو اصلاح پاڼه</h3>
                        <hr>
                        <!-- <p class="account-subtitle"></p> -->

                        <!-- Account Form -->
                        <form action="/admin/profile/{{$admin_info[0]->user_id}}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <input class="" name="admin_id" type="hidden" placeholder="داډمېن نوم"
                                value="{{ $admin_info[0]->user_id }}">

                            @if ($errors->any())
                                <div class="mb-5" id="alertMassege">
                                    <ul style="list-style-type:none" class="p-0 m-0">
                                        @foreach ($errors->all() as $error)
                                            <li class="rounded p-2 m-1 alert alert-danger">
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <dvi class="row p-3">
                                <div class="form-group col-md-6 p-3">
                                    <label>نوم</label>
                                    <input class="form-control" name="name" type="text" placeholder="داډمېن نوم"
                                        value="{{ $admin_info[0]->name }}">
                                </div>
                                <div class="form-group col-md-6 p-3">
                                    <label>تخلص</label>
                                    <input class="form-control" name="last_name" type="text" placeholder="داډمېن تخلص"
                                        value="{{ $admin_info[0]->last_name }}">
                                        
                                </div>
                                <div class="form-group col-md-6 p-3">
                                    <label>برېښنالیک</label>
                                    <input class="form-control" name="email" type="email"
                                        placeholder="داډمېن برېښنالیک" value="{{ $admin_info[0]->email }}">
                                </div>
                                <div class="form-group col-md-6 p-3">
                                    <label>ټلیفون شمېره</label>
                                    <input class="form-control" name="phone_number" type="text"
                                        placeholder="داډمېن ټلیفون شمېره" value="{{ $admin_info[0]->phone_number }}">
                                </div>

                                <!-- <div class="form-group text-center col-md-4 m-auto">
         <button class="btn btn-primary  account-btn col-md-12" type="submit">اډمېن ثبت
          کړئ</button>
        </div> -->


                                <div class="form-group text-center col-md-4 m-auto">
                                    <button class="btn btn-primary submit-btn" type="submit">اصلاح کړئ</button>
                                </div>
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
    <!-- chart-js -->
    <script src="{{ asset('assets/chart-js/dist/chart.min.js') }}"></script>

    @if (Session::has('confirm_password'))
        <script>
            swal('وبخښی!', "{!! Session::get('confirm_password') !!}", "warning", {
                button: "مننه",
            });
        </script>
    @endif
    @if (Session::has('dif_questions'))
        <script>
            swal('وبخښی!', "{!! Session::get('dif_questions') !!}", "warning", {
                button: "مننه",
            });
        </script>
    @endif


</body>

</html>
