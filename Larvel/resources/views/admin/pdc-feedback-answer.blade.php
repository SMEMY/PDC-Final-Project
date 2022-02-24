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
    <title>feedback</title>

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
    <link rel="stylesheet" href="assets/css/select2.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <!-- Tagsinput CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->
    <style>
        label {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        h4 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;


        }

        p {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        h3 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

        }

        select {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 17px !important;

            height: 44px !important;
            border-radius: 3px !important;
            outline: none;
            background-color: #f0fcff !important;
            border: 1px solid #e3e3e3 !important;

        }

        select:hover {
            /* background-color: black !important; */

        }

        select:focus {
            box-shadow: 0px 0px 15px #c7f5ff !important;
            /* background-color: black !important; */

        }

        input:hover {
            box-shadow: 0px 0px 15px #c7f5ff !important;
        }

        input {
            background: #f0fcff !important;

            font-size: 23px !important;
        }

        .swal-modal div {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        .swal-text {
            text-align: right;

        }

        .swal-modal {
            padding: 20px 24px;
            width: 600px;
        }

    </style>

</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <a href="/comAllPrograms/{{ $program_id }}" class="btn btn-primary apply-btn">پروګرامونه ووینی</a>
        <div class="account-content">
            <!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
            <div class="container ">

                <!-- Account Logo -->
                <div class="account-logo mt-5">
                    <a href="index.html"><img src="{{ asset('assets/img/logo2.png') }}"
                            alt="Dreamguy's Technologies"></a>
                </div>
                <!-- /Account Logo -->

                <div class="account-box border board-danger" style="width: 1000px;">
                    <div class="account-wrapper" style="">
                        <h3 class="account-title" style=" font-size: 35px">د پروګرام اړونده پوښتنلیک</h3>
                        <h4 class="mt-5 mb-5">د مهربانی له مخي په لاندي درکړل سوي لیسټ کي سوالونه په (X) سره په نښه
                            کړئ!
                        </h4>
                        <hr>
                        <!-- <p class="account-subtitle"></p> -->

                        <!-- Account Form -->
                        <form action="/admin/feedback" method="POST">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}
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
                            @if ($materials != null)
                                <input class="d-none" type="text" name="program_id" id=""
                                    value="{{ $program_id }}">

                                <input class="d-none" type="text" name="feedback_form_id" id=""
                                    value="{{ $materials[0]->feedbackFormId }}">
                            @endif

                            <h4 class="" style="margin:30px auto; font-size: 30px;width: fit-content;">
                                <strong> د
                                    ورکشاپ/ټرېنینګ مواد</strong></h4>

                            @if ($materials != null)
                                @foreach ($materials as $material)
                                    @if ($material->question_category === 'د ورکشاپ/ټرېنینګ مواد')
                                        <div class="row mb-5"
                                            style="border-bottom:1px solid rgba(0,0,0,.1) !important;">
                                            <div class="col-md-9">
                                                <div class="">
                                                    <div class="form-group mb-2">
                                                        <input class="d-none" type="text"
                                                            name="materials[{{ $loop->index }}]" id=""
                                                            value="{{ $material->id }}">
                                                        <p class="mb-0 p-3 "
                                                            style="background:#d7e5ff;border-radius:5px;"><i
                                                                class="fa fa-hand-o-left"></i>
                                                            {{ $material->question }} </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mb-5 col-md-3 pb-3">
                                                <select class="custom-select"
                                                    name="materials_answer[{{ $loop->index }}]"
                                                    onchange="colorChanger(this)">
                                                    <!-- <option selected=""></option> -->
                                                    <option>ځواب انتخاب کړئ</option>
                                                    <option value="بد">بد</option>
                                                    <option value="متوسط">متوسط</option>
                                                    <option value="ښه">ښه</option>
                                                    <option value="ډېر ښه">ډېرښه</option>
                                                </select>
                                            </div>
                                            <hr>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            <h4 class="" style="margin:30px auto; font-size: 30px;    width: fit-content">
                                <strong>
                                    آســـــــــــــــانتیـــــــــــــــاوي</strong></h4>
                            @if ($facilities != null)
                                @foreach ($facilities as $facility)
                                    @if ($facility->question_category === 'آسانتیاوي')
                                        <div class="row mb-5"
                                            style="border-bottom:1px solid rgba(0,0,0,.1) !important;">
                                            <div class="col-md-9">
                                                <div class="">
                                                    <div class="form-group mb-2">
                                                        <input class="d-none" type="text"
                                                            name="facilities[{{ $loop->index }}]" id=""
                                                            value="{{ $facility->id }}">
                                                        <p class="mb-0 p-3 "
                                                            style="background:#d7e5ff;border-radius:5px;"><i
                                                                class="fa fa-hand-o-left"></i>
                                                            {{ $facility->question }} </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mb-5 col-md-3 pb-3">
                                                <select class="custom-select"
                                                    name="facilities_answer[{{ $loop->index }}]"
                                                    onchange="colorChanger(this)">
                                                    <!-- <option selected=""></option> -->
                                                    <option>ځواب انتخاب کړئ</option>
                                                    <option value="بد">بد</option>
                                                    <option value="متوسط">متوسط</option>
                                                    <option value="ښه">ښه</option>
                                                    <option value="ډېر ښه">ډېرښه</option>
                                                </select>
                                            </div>
                                            <hr>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            <h4 class="" style="margin:30px auto; font-size: 30px;    width: fit-content">
                                <strong>
                                    ځـــــــــاي</strong></h4>
                            @if ($locations != null)

                                @foreach ($locations as $location)
                                    @if ($location->question_category === 'ځاي')
                                        <div class="row mb-5"
                                            style="border-bottom:1px solid rgba(0,0,0,.1) !important;">
                                            <div class="col-md-9">
                                                <div class="">
                                                    <div class="form-group mb-2">
                                                        <input class="d-none" type="text"
                                                            name="locations[{{ $loop->index }}]" id=""
                                                            value="{{ $location->id }}">
                                                        <p class="mb-0 p-3 "
                                                            style="background:#d7e5ff;border-radius:5px;"><i
                                                                class="fa fa-hand-o-left"></i>
                                                            {{ $location->question }} </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mb-5 col-md-3 pb-3">
                                                <select class="custom-select"
                                                    name="locations_answer[{{ $loop->index }}]"
                                                    onchange="colorChanger(this)">
                                                    <!-- <option selected=""></option> -->
                                                    <option>ځواب انتخاب کړئ</option>
                                                    <option value="بد">بد</option>
                                                    <option value="متوسط">متوسط</option>
                                                    <option value="ښه">ښه</option>
                                                    <option value="ډېر ښه">ډېرښه</option>
                                                </select>
                                            </div>
                                            <hr>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            <h4 class="" style="margin:30px auto; font-size: 30px;    width: fit-content">
                                <strong>
                                    عمومي نظر</strong></h4>

                            @if ($comments != null)

                                @foreach ($comments as $comment)
                                    @if ($comment->question_category === 'عمومي نظر')
                                        <div class="row mb-5"
                                            style="border-bottom:1px solid rgba(0,0,0,.1) !important;">
                                            <div class="col-md-9">
                                                <div class="">
                                                    <div class="form-group mb-2">
                                                        <input class="d-none" type="text"
                                                            name="opinions[{{ $loop->index }}]" id=""
                                                            value="{{ $comment->id }}">
                                                        <p class="mb-0 p-3 "
                                                            style="background:#d7e5ff;border-radius:5px;"><i
                                                                class="fa fa-hand-o-left"></i> {{ $comment->question }}
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mb-3 col-md-3 pb-3">
                                                <select class="custom-select"
                                                    name="opinions_answer[{{ $loop->index }}]"
                                                    onchange="colorChanger(this)">
                                                    <!-- <option selected=""></option> -->
                                                    <option>ځواب انتخاب کړئ</option>
                                                    <option value="بد">بد</option>
                                                    <option value="متوسط">متوسط</option>
                                                    <option value="ښه">ښه</option>
                                                    <option value="ډېر ښه">ډېرښه</option>
                                                </select>
                                            </div>
                                            <hr>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            <div class="row mt-5">
                                <div class="input-group col-md-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">د پروګرام په اړه معلومات</span>
                                    </div>
                                    <textarea class="form-control" style="height: 100px;" aria-label="With textarea"
                                        name="comment"></textarea>
                                </div>
                            </div>
                            <div class="mt-4"></div>
                            <div class="form-group text-center col-md-4  m-auto">
                                <button class="btn btn-primary  account-btn col-md-12" type="submit">پوښتنلیک
                                    واستوی</button>
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
    <!-- sweet alert -->
    <script src="{{ asset('assets/sweet-alert/sweetalert.min.js') }}"></script>
    <!-- chart-js -->
    <script src="{{ asset('assets/chart-js/dist/chart.min.js') }}"></script>
    @if (Session::has('warn'))
        <script>
            swal('وبخښئ!', "{!! Session::get('warn') !!}", "warning", {
                button: "وروسته کوښښ وکړئ",
            });
        </script>
    @endif
    @if (Session::has('success_questionnaire'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('success_questionnaire') !!}", "success", {
                button: "مننه",
            });
        </script>
    @endif
    <script>
        function colorChanger(option) {
            $(option).addClass('bg-primary');

        }
    </script>

</body>

</html>
