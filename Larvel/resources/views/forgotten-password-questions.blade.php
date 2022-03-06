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
            font-size: 20px !important;
        }

        select:focus {
            box-shadow: 0px 0px 2px #000 !important;

            transition: all 0.1s;
            transform: scale(1.01);
        }

        .sel {
            transform: translate3d(10px, 32px, 0px) !important;
        }

        input:focus {
            /* border-color: #5092f4 !important; */
            box-shadow: 0px 0px 5px #5092f4 !important;
        }

        select {
            font-size: 20px !important;
            background: #e3e3e3 !important;
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
                        <h3 class="account-title p-3">پاسورډ د نوي کولو صفحه!</h3>
                        <hr>
                        <!-- <p class="account-subtitle"></p> -->

                        <!-- Account Form -->
                        <form action="/userChangePassword" method="GET">
                            {{-- @csrf --}}
                            {{-- @if ($errors->any())
                                <div class="mb-5" id="alertMassege">
                                    <ul style="list-style-type:none" class="p-0 m-0">
                                        @foreach ($errors->all() as $error)
                                            <li class="rounded p-2 m-1 alert alert-danger">
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                            <input type="hidden" name="user_name" id="" value="{{ $user_name }}">
                            <div class="row p-3">
                                <div class="col-sm-6 col-md-12" id="search_content">
                                    <div class="form-group form-focus select-focus mb-5">
                                        <label>لمړي پوښتنه</label>

                                        <select class="custom-select p-2 h-100 searchInput" name="f_q">

                                            <option value="">پوښتنه مو انتخاب کړی!</option>
                                            <option value="{{ $questions[0]->f_q }}">
                                                {{ $questions[0]->f_q }}
                                            </option>
                                            <option value="{{ $questions[0]->s_q }}">
                                                {{ $questions[0]->s_q }}
                                            </option>
                                            <option value="{{ $questions[0]->t_q }}">
                                                {{ $questions[0]->t_q }}
                                            </option>
                                        </select>
                                        @error('f_q')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-12 p-3">
                                    <label>ځواب</label>
                                    <input class="form-control" name="f_a" type="text" placeholder="داډمېن تخلص"
                                        value="{{ old('f_a') }}">
                                    @error('f_a')
                                        <span class="invalid-feedback" role="alert" style="display:block">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr style="width:70%">
                            <div class="row p-3">
                                <div class="col-sm-6 col-md-12" id="search_content">
                                    <div class="form-group form-focus select-focus mb-5">
                                        <label>دریمه پوښتنه</label>

                                        <select class="custom-select p-2 h-100 searchInput" name="s_q">
                                            <option selected value="">پوښتنه مو انتخاب کړی!</option>
                                            <option value="{{ $questions[0]->f_q }}">{{ $questions[0]->f_q }}
                                            </option>
                                            <option value="{{ $questions[0]->s_q }}">{{ $questions[0]->s_q }}
                                            </option>
                                            <option value="{{ $questions[0]->t_q }}">{{ $questions[0]->t_q }}
                                            </option>
                                        </select>
                                        @error('s_q')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-12 p-3">
                                    <label>ځواب</label>
                                    <input class="form-control" name="s_a" type="text" placeholder="داډمېن تخلص"
                                        value="{{ old('s_a') }}">
                                    @error('s_a')
                                        <span class="invalid-feedback" role="alert" style="display:block">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr style="width:70%">

                            <div class="row p-3">
                                <div class="col-sm-6 col-md-12" id="search_content">
                                    <div class="form-group form-focus select-focus mb-5">
                                        <label>دریمه پوښتنه</label>

                                        <select class="custom-select p-2 h-100 searchInput" name="t_q">
                                            <option selected value="">پوښتنه مو انتخاب کړی!</option>
                                            <option value="{{ $questions[0]->f_q }}">{{ $questions[0]->f_q }}
                                            </option>
                                            <option value="{{ $questions[0]->s_q }}">{{ $questions[0]->s_q }}
                                            </option>
                                            <option value="{{ $questions[0]->t_q }}">{{ $questions[0]->t_q }}
                                            </option>
                                        </select>
                                        @error('t_q')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-12 p-3">
                                    <label>ځواب</label>
                                    <input class="form-control" name="t_a" type="text" placeholder="داډمېن تخلص"
                                        value="{{ old('t_a') }}">
                                    @error('t_a')
                                        <span class="invalid-feedback" role="alert" style="display:block">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-center col-md-4 m-auto">
                                <button class="btn btn-primary submit-btn" type="submit">تغیر یې کړئ</button>
                            </div>
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

    @if (Session::has('full_fill'))
        <script>
            swal('وبخښی!', "{!! Session::get('full_fill') !!}", "warning", {
                button: "سمده",
            });
        </script>
    @endif


</body>

</html>
