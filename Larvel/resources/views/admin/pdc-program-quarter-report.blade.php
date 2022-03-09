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
    <title>as</title>

    <!-- Favicon -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}"> --}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" /> -->

    <!-- Lineawesome CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}"> --}}

    {{-- <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}"> --}}

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">

    <!-- Datetimepicker CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}"> --}}

    <!-- Tagsinput CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}"> --}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }

    </style>
    <style>
        body {
            background: white;
            margin: 0;
        }

        td {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            text-align: center !important;
            border-radius: 2px !important;
            padding: 0px 5px !important;


        }

        th {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            text-align: center !important;
            padding: 10px 4px !important;
            line-height: 15px;
            font-size: 15px !important;
            font-weight: bold !important;
        }

        h4 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-weight: bold !important;
            font-size: 20px !important;


        }

        #alertMassege {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        .swal-modal div {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        h5 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

        }

        table {
            border-collapse: separate !important;
        }

        input {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        select {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        select:focus {
            box-shadow: 0px 0px 2px #000 !important;

            transition: all 0.1s;
            transform: scale(1.01);
        }

        input:focus {
            box-shadow: 0px 0px 2px #000 !important;
            transition: all 0.1s;
            transform: scale(1.02);
        }

    </style>

</head>


<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper m-0">
        <a href="/admin/dashboard" class="btn btn-primary apply-btn " id="back"><i class="fa fa-arrow-left"
                aria-hidden="true"></i></a>

        <!-- Header -->

        <!-- /Header -->

        <!-- Sidebar -->

        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="m-0">
            <div class="content container-fluid " id="ignorePDF">

                {{-- Page Header --> --}}
                <div class=" mt-5">

                    <div class="row m-0">

                        <div class="col-sm-12 m-0 text-center">

                           
                                <div class="col-md-12">
                                    <div class="account-logo"
                                        style="display: inline-block !important; margin-right: 0px !important; float: right">
                                        <img class="" style="float: right"
                                            src="{{ asset('assets/img/kandahar.png') }}" alt="Dreamguy's Technologies">
                                    </div>
                                    <div style="display: inline-block !important">
                                        <h4 class="page-title">د لوړو زده کړو وزارت</h4>
                                        <h4 class="page-title">کندهار پوهنتون</h4>
                                        <h4 class="page-title">مسلکي پرختیائي مرکز</h4>
                                        <h4 class="page-title m-auto"
                                            style="width:fit-content ;margin: 20px auto !important">د
                                            مسلکي پرمختیائي مرکز د (. . . . ) ربعي راپور</h4>

                                    </div>

                                    <div class="account-logo" style="display: inline-block !important ;float: left">
                                        <img class="" style="float: left"
                                            src="{{ asset('assets/img/logo2.png') }}" alt="Dreamguy's Technologies">
                                    </div>
                                </div>
                                {{-- <div class="col-md-4 ">
                                </div> --}}
                                {{-- <h5 class="text-left pl-4">د شروع نېټه:
                                </h5>
                                <h5 class="text-left pl-4">د ختم نېټه:
                                </h5> --}}
                                <div class="row mt-5 col-md-12" id="reportSearch">
                                <div class="col-md-12 m-auto " style="border: 1px solid #ffffff; border-radius:10px;">
                                    {{-- <form action="/admin/monthlyReport" method="POST">
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
                                        @endif --}}
                                    <div class="row filter-row " id="search_parts">
                                        {{-- <div class="col-sm-6 col-md-5" id="search_content" onclick="audio.play()">
                                                <div class="form-group form-focus select-focus" onclick="audio.play()">
                                                    <select class="custom-select p-2 h-100 searchInput" name="month"
                                                        style="border:1px solid rgb(113, 113, 113); background:#d0deff85;">
                                                        <option value="">میاشت انتخاب کړئ!</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>

                                                        <!-- <option>Delta Infotech</option> -->
                                                    </select>
                                                    <!-- <label class="focus-label">پروګرام انتخاب کړی</label> -->
                                                </div>
                                            </div> --}}

                                        <div class="col-sm-6 col-md-10" id="search_input">
                                            <div class="form-group ">
                                                <input type="number" class="form-control floating p-4" name="year"
                                                    id="rowCount"
                                                    style="border:1px solid rgb(113, 113, 113);background:#d0deff85;"
                                                    placeholder="د سترونو تعداد داخل کړی!">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                            <!-- <a href="#" class="">پلټنه </a> -->
                                            <button id="btn" type="" class="btn btn-success btn-block h3 p-1"
                                                onclick="audio.play()"
                                                style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;">جوړ
                                                کړی</button>
                                        </div>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->


                <div class="row" id="print">
                    <div class="col-lg-12 p-4">
                        <div class="table-responsive">
                            <h4 class="page-title m-auto" style="width:fit-content ;margin: 20px auto !important">روزنیز
                                پراګرامونه</h4>
                            <table class="table table-striped custom-table table-nowrap m-0">
                                <thead>
                                    <tr>
                                        <th class=" border border-dark bg-gradient-info" style="width:30px">
                                            لومړی
                                        </th>
                                        <th class=" border border-dark bg-gradient-info px-1" style="width:100px"
                                            colspan="2">هدف</th>



                                        <th class=" border border-dark bg-gradient-info p-3" style="width:100px"
                                            colspan="3">د
                                            اجراء وړ موده<br><br>
                                            ( . . . . .) ربعه</th>
                                        {{-- <th class=" border border-dark bg-gradient-info px-1" style="width:100px">ولد
                                        </th> --}}

                                        <th class=" border border-dark bg-gradient-info p-1" style="width:100px"
                                            rowspan="2">د کېدنکو کړنو<br> اټکل سوې سلنه</th>
                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px"
                                            rowspan="2">د اجراء سویو<br> کړنو سلنه </th>
                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px"
                                            rowspan="2">اجراء کوونکي<br> مسؤلین</th>
                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px"
                                            rowspan="2">امکانات</th>
                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px"
                                            rowspan="2">څارونکی</th>

                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px"
                                            rowspan="2">پایلي</th>
                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px"
                                            rowspan="2">د نه اجراء<br> کېدو سببونه</th>


                                    </tr>
                                    <tr>
                                        <th class=" border border-dark bg-gradient-info" style="width:30px" rowspan="2">
                                            ګڼه
                                        </th>
                                        <th class=" border border-dark bg-gradient-info px-1" style="width:100px">موخي
                                        </th>



                                        <th class=" border border-dark bg-gradient-info px-1" style="width:100px">لازمي
                                            کړني</th>

                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px"></th>
                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px"></th>
                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px"></th>


                                    </tr>
                                </thead>
                                <tbody id="tbl">
                                    {{-- @foreach ($participants as $participant) --}}
                                    {{-- @for ($index = 0; $index < $countPrograms; $index++) --}}
                                    <tr>

                                        <td class="border border-dark" style="height: 200px">1</td>
                                        <td class="border border-dark px-0"> </td>
                                        <td class="border border-dark px-0"> </td>
                                        <td class="border border-dark px-0">
                                        </td>
                                        <td class="border border-dark px-0"> </td>
                                        <td class="border border-dark px-0">

                                        </td>
                                        <td class="border border-dark px-0" dir="ltr">


                                        </td>
                                        <td class="border border-dark px-0" dir="ltr">





                                        </td>

                                        <td class="border border-dark px-0">
                                        </td>
                                        <!-- <td class="border border-dark px-0 text-right"></td> -->

                                        <td class="border border-dark p-0">
                                        </td>
                                        <td class="border border-dark p-0">
                                        </td>
                                        <td class="border border-dark p-0">
                                        </td>
                                        <td class="border border-dark p-0">
                                        </td>

                                    </tr>
                                    {{-- @endfor --}}
                                    {{-- @endforeach --}}

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="">

                <button onclick="printfile()" id="p" class="btn btn-primary submit-btn m-auto d-block">print</button>
            </div>
        </div>
        <!-- Page Wrapper -->

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
    <script src="{{ asset('assets/js/jspdf.umd.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script> --}}
    <script src="{{ asset('assets/sweet-alert/sweetalert.min.js') }}"></script>

    <script>
        function printfile() {
            $('#p').removeClass('d-block');
            $('#back').addClass('d-none');
            $('#reportSearch').addClass('d-none');
            $('#p').addClass('d-none');
            window.print();
            $('#p').removeClass('d-none');
            $('#p').addClass('d-block');
            $('#back').removeClass('d-none');
            $('#reportSearch').removeClass('d-none');




        }
        $('#btn').click(function() {
            if ($('#rowCount').val() == "") {
                alert("رقم داخل کړئ!")
            } else {
                for (let index = 0; index < $('#rowCount').val(); index++) {
                    var txt1 =
                        `<tr>
                            <td class="border border-dark" style="height: 200px">${index+2}</td>
                            <td class="border border-dark px-0"> </td>
                            <td class="border border-dark px-0"> </td>
                            <td class="border border-dark px-0">
                            </td>
                            <td class="border border-dark px-0"> </td>
                            <td class="border border-dark px-0">
                            </td>
                            <td class="border border-dark px-0" dir="ltr">
                            </td>
                            <td class="border border-dark px-0" dir="ltr">   </td>
                            <td class="border border-dark px-0">
                            </td>
                            <td class="border border-dark p-0">
                            </td>
                            <td class="border border-dark p-0">
                            </td>
                            <td class="border border-dark p-0">
                            </td>
                            <td class="border border-dark p-0">
                            </td>
                        </tr>`;
                    $("#tbl").children().last().after(txt1);

                }
                $('#tbl').children().last().remove();

            }
            // alert("Handler for .click() called.");
        });
    </script>


</body>

</html>
