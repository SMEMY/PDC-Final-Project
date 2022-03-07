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
        label {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;

        }

        h3 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;


        }

        input {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        select {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;

            height: 44px !important;
            border-radius: 3px !important;
            outline: none;
            background-color: #f0fcff !important;
            border: 1px solid #e3e3e3 !important;

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

        textarea:focus {
            box-shadow: 0px 0px 2px #000 !important;
        }

        input {
            background: #f0fcff !important;
        }

        textarea {
            background: #f0fcff !important;

        }

        #for {
            transition: all 0.3s;
        }

        #alertMassege {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        .swal-modal div {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        h4 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 30px !important;
        }

        .swal-text {
            text-align: right;

        }

        .swal-modal {
            padding: 20px 24px;
            width: 600px;
        }

        #answers>div {
            width: 100px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            border-radius: 10px;
        }

        #answers div {
            font-size: 20px !important;
            text-shadow: 0px 0px 3px white;
        }

        #answers div>div {
            border-radius: 30px !important;
            {{-- background:#2d4b5c73 !important; --}}
        }

        h5 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

        }

    </style>
</head>

<body>
    <!-- Main Wrapper -->
    <a href="/admin/pdcProgramInfo/{{ $programID }}" class="btn btn-primary apply-btn "><i class="fa fa-arrow-left"
            aria-hidden="true"></i></a>
    <div class="main-wrapper">
        <div class="account-content">
            <!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
        
                <div class="account-logo mt-5">
                    <a href="index.html"><img src="{{ asset('assets/img/logo2.png') }}"
                            alt="Dreamguy's Technologies"></a>
                </div>
                <!-- Account Logo -->
                <!-- <div class="account-logo mt-5" style="width: 1150px;">
                     <a href="index.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
                    </div> -->
                <!-- /Account Logo -->

                <div class="account-box m-auto" style="width: 1200px; margin-top: 75px;" id="for">
                    <h4 class="p-3 bg-info d-block text-center rounded" style="font-weight:bold"><i
                            class="pr-2 fa fa-"></i>د اړونده پروګرام د پوښتنلیک دځوابونو راپور</h4>
                    <div class="account-wrapper mt-3" style="">
                        <h5 class="col-md-12 p-3 d-block text-center rounded"
                            style="background: #0000001a; font-size:20px">
                            د
                            پوښتنلیک سوالونه</h5>
                        <div class="row p-3">
                            @for ($index = 0; $index < count($questions); $index++)
                                <div class="col-md-6 col-sm-6 border p-3 rounded">
                                    <h3 class=" p-3 rounded " style="background: #0000001a; font-size:20px"><span
                                            class="text-danger ">{{ $index + 1 }}- سوال: </span>
                                        {{ $questions[$index]->question }}</h3>

                                    <div class="row  text-center" id="answers">
                                        <div class="col-md-3 my-2">
                                            <div class="bg-info  rounded text-center"
                                                style="background:#009efb73 !important;">
                                                <div class="col-md-12">ښه</div>
                                                <div class="col-md-12 ">{{ $first[$index] }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 my-2">
                                            <div class=" bg-info rounded text-center"
                                                style="background:#009efb73 !important ; border-raduis:40px !important">
                                                <div class="col-md-12">ډېر ښه</div>
                                                <div class="col-md-12 ">{{ $second[$index] }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 my-2">
                                            <div class=" bg-info rounded text-center"
                                                style="background:#009efb73 !important;">
                                                <div class="col-md-12">متوسط</div>
                                                <div class="col-md-12">{{ $third[$index] }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 my-2">
                                            <div class=" bg-info rounded text-center"
                                                style="background:#009efb73 !important;">
                                                <div class="col-md-12">بد</div>
                                                <div class="col-md-12 ">{{ $fourth[$index] }}</div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- <div id="container" class="m-3" style="width:80%;">
                         <canvas id="myChart" width="200" height="200"></canvas>
                        </div> -->
                                </div>
                            @endfor
                        </div>
                        <h5 class="col-md-12 p-3 d-block text-center rounded my-3"
                            style="background: #0000001a; font-size:20px">د ډګوونکو نظرونه</h5>
                        <div class="row px-3" style="min-height: 200px; height: auto; !important; ">
                            @for ($index = 0; $index < count($comments); $index++)
                                <!-- <div class="col-md-6 p-2"> -->
                                <div class="col-md-12 my-2 rounded p-3 "
                                    style="background: #71caff5c !important;font-size:18px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;">
                                    {{ $index + 1 }}- {{ $comments[$index]->comment }}
                                </div>
                                <!-- </div> -->
                            @endfor
                        </div>
                        <!-- <div class="row">
                       <div class="col-md-4">
                        <canvas id="myChart" width="200" height="200"></canvas>
                       </div>
                       <div class="col-md-4">
                        <canvas id="myChart1" width="200" height="200"></canvas>
                       </div>
                       <div class="col-md-4">
                        <canvas id="myChart2" width="200" height="200"></canvas>
                       </div>
                      </div> -->
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
    @if (Session::has('member_added'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('member_added') !!}", "success", {
                button: "مننه",
            });
        </script>
    @endif
    @if (Session::has('password_confirm'))
        <script>
            swal('وبخښئ!', "{!! Session::get('password_confirm') !!}", "warning", {
                button: "بیا ځلي کتنه وکړئ",
            });
        </script>
    @endif
    <script>
        // var ctx = document.getElementById('myChart').getContext('2d');
        // var myChart = new Chart(ctx, {
        // 	type: 'bar',
        // 	data: {
        // 		labels: ['ښه', 'ډېر ښه', 'متوسط', 'بد'],
        // 		datasets: [{
        // 			label: '# of Votes',
        // 			data:
        // 			backgroundColor: [
        // 				'rgba(255, 99, 132, 0.2)',
        // 				'rgba(54, 162, 235, 0.2)',
        // 				'rgba(255, 206, 86, 0.2)',
        // 				'rgba(75, 192, 192, 0.2)',
        // 			],
        // 			borderColor: [
        // 				'rgba(255, 99, 132, 1)',
        // 				'rgba(54, 162, 235, 1)',
        // 				'rgba(255, 206, 86, 1)',
        // 				'rgba(75, 192, 192, 1)',
        // 			],
        // 			borderWidth: 1
        // 		}]
        // 	},
        // 	options: {
        // 		scales: {
        // 			y: {
        // 				beginAtZero: true
        // 			}
        // 		}
        // 	}
        // });
        $("#toggle_btn").click(function() {
            if ($('#for').css('width') === '1100px' && $('#for').css('margin-right') === '140px') {
                console.log("alkfjlakfd");
                $("#for").css("width", "1200px");
                $("#for").css("margin-right", "0px");
            } else {
                $("#for").css("width", "1100px");
                $("#for").css("margin-right", "140px");
            }
        });
    </script>
</body>

</html>
