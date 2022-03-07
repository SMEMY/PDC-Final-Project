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
            padding: 0px 4px !important;
            line-height: 15px;
            font-size: 15px !important;
            font-weight: bold !important;
        }

        h4 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-weight: bold !important;
            font-size: 20px !important;


        }

        h5 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

        }

        table {
            border-collapse: separate !important;
        }

    </style>

</head>


<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper m-0">
        <a href="/admin/pdcProgramInfo/{{ $programID }}" class="btn btn-primary apply-btn " id="back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

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

                            <h4 class="page-title">د لوړو زده کړو وزارت</h4>
                            <h4 class="page-title">کندهار پوهنتون</h4>
                            <h4 class="page-title">مسلکي پرختیائي مرکز</h4>
                            <h4 class="page-title">د مکتوب لیکني او (ې) ګانو پېږندلګلوي ورکشاپ د ګډون حاضري</h4>
                            <h5 class="text-left pl-4">د شروع نېټه:
                                {{ date('d - m - Y ', strtotime($program[0]->start_date)) }} </h5>
                            <h5 class="text-left pl-4">د ختم نېټه:
                                {{ date('d - m - Y ', strtotime($program[0]->start_date)) }}</h5>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->


                <div class="row" id="print">
                    <div class="col-lg-12 p-4">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table table-nowrap m-0">
                                <thead>
                                    <tr>
                                        <th class=" border border-dark bg-gradient-info" style="width:30px">
                                            شــ
                                        </th>
                                        <th class=" border border-dark bg-gradient-info px-1" style="width:100px">نوم
                                        </th>
                                        <th class=" border border-dark bg-gradient-info px-1" style="width:100px">تخلص
                                        </th>
                                        {{-- <th class=" border border-dark bg-gradient-info px-1" style="width:100px">ولد
                                        </th> --}}
                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px">د بست
                                            عنوان</th>
                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px">وظیفې
                                            محل </th>
                                        <th class=" border border-dark bg-gradient-info px-0" style="width:100px">
                                            ټلیفون شمېره</th>
                                        <!-- <th class=" border border-dark bg-gradient-info px-0">برېښنالیک</th> -->
                                        @for ($index = 0; $index < $program[0]->days_duration; $index++)
                                            @if ($index + 1 < 10)
                                                <th class=" border border-dark bg-gradient-info p-1" colspan="2">
                                                    {{ $index + 1 }} <br> O - I</th>
                                            @endif
                                            @if ($index + 1 >= 10)
                                                <th class=" border border-dark bg-gradient-info p-0" colspan="2">
                                                    {{ $index + 1 }} <br> O - I</th>
                                            @endif
                                        @endfor
                                        <th class=" border border-dark bg-gradient-info px-0" style="width:50px">کتني
                                        </th>
                                        <!-- <th class="col-md-1">8</th>
                            <th class="col-md-1">9</th>
                            <th class="col-md-1">10</th> -->

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($participants as $participant)
                                        <tr>
                                            <td class="border border-dark">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="border border-dark px-0"> {{ $participant->name }} </td>
                                            <td class="border border-dark px-0">{{ $participant->last_name }}</td>
                                            {{-- <td class="border border-dark px-0">عبدالصبور</td> --}}
                                            <td class="border border-dark px-0">{{ $participant->office_position }}
                                            </td>
                                            <td class="border border-dark px-0">{{ $participant->office_building }}
                                            </td>
                                            <td class="border border-dark px-0">{{ $participant->phone_number }}</td>
                                            <!-- <td class="border border-dark px-0 text-right">{{ $participant->email }}</td> -->
                                            @for ($index = 0; $index < $program[0]->days_duration; $index++)
                                                <td class="border border-dark p-0"></td>
                                                <td class="border border-dark p-0"></td>
                                            @endfor

                                            <td class="border border-dark p-0"></td>

                                        </tr>
                                    @endforeach

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
    {{-- <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --}}
    <!-- Slimscroll JS -->
    {{-- <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script> --}}
    <!-- Chart JS -->
    {{-- <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script> --}}
    <!-- Custom JS -->
    {{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}
    <!-- Datetimepicker JS -->
    {{-- <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script> --}}
    <!-- Select2 JS -->
    {{-- <script src="{{ asset('assets/js/select2.min.js') }}"></script> --}}
    <!-- Tagsinput JS -->
    {{-- <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/jspdf.umd.min.js') }}"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script> --}}


    <script>
        function printfile() {
            $('#p').removeClass('d-block');
            $('#back').addClass('d-none');
            $('#p').addClass('d-none');
            window.print();
            $('#p').removeClass('d-none');
            $('#p').addClass('d-block');
            $('#back').removeClass('d-none');



        }
    </script>


</body>

</html>
