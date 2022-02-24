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
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- <link type="text/css" rel="stylesheet" href="{{mix('css/app.css')}}"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" /> -->

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">

    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

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
        select:hover{
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
        #edit a{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 15px !important;
        }
        .dropdown.profile-action{
            position: relative !important;
            top: 42px;
        }
        #edit1{
            top: 13px !important;
        }
        .swal-modal div{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }
		.swal-text{
			text-align: right;

		}
		.swal-modal{
			padding: 20px 24px;
    		width: 600px;
		}
        #alertMassege{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 30px !important;
        }
        .bg-primary, .badge-primary{
            background-color:#00c5fb2b !important;
        }
    </style>

</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <a href="/admin/pdcProgramInfo/{{$program_id}}" class="btn btn-primary apply-btn">پروګرام ووینی</a>
        <div class="account-content">
            <!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
            <div class="container ">

                <!-- Account Logo -->
                <div class="account-logo mt-5">
                    <a href="index.html"><img src="{{asset('assets/img/logo2.png')}}" alt="Dreamguy's Technologies"></a>
                </div>
                <!-- /Account Logo -->

                <div class="account-box border board-danger" style="width: 1000px;">
                @if(count($comments) !== 0 || count($locations) !== 0 || count($facilities) !== 0 || count($materials) !== 0)

                    <div class="dropdown dropdown-action profile-action" id="edit1">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-left">
                            <a class="dropdown-item" href="/admin/feedback/{{$program_id}}/edit"  ><i
                                    class="fa fa-pencil m-r-5"></i>معلومات اصلاح کړی</a>
                                    <a class="dropdown-item"  data-toggle="modal"
                                        data-target="#delete_project" id="path" ><i class="fa fa-trash-o m-r-5"></i> له منځه یې اوسی</a>
                        </div>
                    </div>
                @endif
                    <div class="account-wrapper" style="">
                        <h3 class="account-title" style=" font-size: 35px">د پروګرام اړونده پوښتنلیک</h3>
                        <!-- <h4 class="mt-5 mb-5">د مهربانی له مخي په لاندي درکړل سوي لیسټ کي سوالونه په (X) سره په نښه کړئ! -->
                        </h4>
                        <hr>
                        @if( count($materials) !== 0)
                            <h4 class="bg-primary p-3 rounded text-center" style=" font-size: 25px;"> <strong> د
                                    ورکشاپ/ټرېنینګ مواد</strong></h4>
                            @foreach($materials as $material)
                            <div class="row mb-0" style="border-bottom:1px solid rgba(0,0,0,.1) !important;">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="form-group mb-2">
                                            <input class="d-none" type="text" name="materials[{{$loop->index}}]" id=""
                                            value="{{$material->id}}">
                                            <div class="dropdown dropdown-action profile-action" id="edit">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-left">
                                                    <a class="dropdown-item" href="/admin/deleteQuestion/{{$material->id}}"><i class="fa fa-trash-o m-r-5"></i>یاده پوښتنه له سیسټم څخه له منځه یوسی</a>
                                                </div>
                                            </div>
                                            <p class="mb-0 p-2 " style="background:#d7e5ff6e;border-radius:5px;">( {{$loop->iteration}} ) <i class="fa fa-hand-o-left"></i>
                                            {{$material->question}}
                                             </p>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>
                            @endforeach
                        @endif
                        @if( count($facilities) !== 0)
                            <h4 class="bg-primary p-3 rounded text-center mt-3" style=" font-size: 25px;"> <strong>
                                    آســـــــــــــــانتیـــــــــــــــاوي</strong></h4>
                            @foreach($facilities as $facility)
                            <div class="row mb-0" style="border-bottom:1px solid rgba(0,0,0,.1) !important;">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="form-group mb-2">
                                            <input class="d-none" type="text" name="facilities[{{$loop->index}}]" id=""
                                                value="{{$facility->id}}">
                                                <div class="dropdown dropdown-action profile-action" id="edit">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                                            class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-left">
                                                        <a class="dropdown-item" href="/deleteQuestion/{{$facility->id}}"><i class="fa fa-trash-o m-r-5"></i>یاده پوښتنه له سیسټم څخه له منځه یوسی</a>
                                                    </div>
                                                </div>
                                            <p class="mb-0 p-2 " style="background:#d7e5ff6e;border-radius:5px;">( {{$loop->iteration}} ) <i
                                                    class="fa fa-hand-o-left"></i> {{$facility->question}} </p>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>
                            @endforeach
                        @endif
                        @if( count($locations) !== 0)
                            <h4 class="bg-primary p-3 rounded text-center mt-3" style=" font-size: 25px;"> <strong>
                                    ځـــــــــاي</strong></h4>
                            @foreach($locations as $location)
                            <div class="row mb-0" style="border-bottom:1px solid rgba(0,0,0,.1) !important;">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="form-group mb-2">
                                            <input class="d-none" type="text" name="locations[{{$loop->index}}]" id=""
                                                value="{{$location->id}}">
                                                <div class="dropdown dropdown-action profile-action" id="edit">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                                            class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-left">
                                                        <a class="dropdown-item" href="/deleteQuestion/{{$location->id}}"><i class="fa fa-trash-o m-r-5"></i>یاده پوښتنه له سیسټم څخه له منځه یوسی</a>
                                                    </div>
                                                </div>
                                            <p class="mb-0 p-2 " style="background:#d7e5ff6e;border-radius:5px;">( {{$loop->iteration}} ) <i
                                                    class="fa fa-hand-o-left"></i> {{$location->question}} </p>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>
                            @endforeach
                        @endif

                            @if( count($comments) !== 0)
                            <h4 class="bg-primary p-3 rounded text-center mt-3" style=" font-size: 25px;"> <strong>
                                    عمومي نظر</strong></h4>
                            @foreach($comments as $comment)
                            <div class="row mb-0" style="border-bottom:1px solid rgba(0,0,0,.1) !important;">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="form-group mb-2">
                                            <input class="d-none" type="text" name="opinions[{{$loop->index}}]" id=""
                                                value="{{$comment->id}}">
                                                <div class="dropdown dropdown-action profile-action" id="edit">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                                            class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-left">
                                                        <a class="dropdown-item" href="/deleteQuestion/{{$comment->id}}"><i class="fa fa-trash-o m-r-5"></i>یاده پوښتنه له سیسټم څخه له منځه یوسی</a>
                                                    </div>
                                                </div>
                                            <p class="mb-0 p-2 " style="background:#d7e5ff6e;border-radius:5px;">( {{$loop->iteration}} ) <i
                                                    class="fa fa-hand-o-left"></i> {{$comment->question}} </p>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>
                            @endforeach
                        @endif
                        @if(count($comments) === 0 && count($locations) === 0 && count($facilities) === 0 && count($materials) === 0)

                            <div class="mb-5" id="alertMassege">

                                    <div class="rounded p-5 m-1 alert alert-danger text-center" >
                                       د یاد پروګرام لپاره پوښتنلیک شتون نلري!
                                    </div>


                                </ul>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>

<!-- Delete Project Modal -->
            <div class="modal custom-modal fade" id="delete_project" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>ښاغلی/آغلې له منځه وړل</h3>
								<p>آیا تاسي باوري یاست چي یاد پوښتنلیک له منځه وړی؟</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-md-6">
                          				<a class="btn btn-primary continue-btn col-md-12" href="/deleteQuestionnaire/{{$program_id}}">پوښتنلیک له منځه یوسی</a>
									</div>
									<div class="col-6">
										<a href="javascript:void(0);" data-dismiss="modal"
											class="btn btn-primary cancel-btn">قطعه یې کړی</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- /Delete Project Modal -->
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
    <!-- sweet alert -->
<script src="{{asset('assets/sweet-alert/sweetalert.min.js')}}"></script>
		@if(Session::has('feedback_edited'))
            <script>
            swal('ډېر ښه!',"{!! Session::get('feedback_edited') !!}", "success", {
                button: "مننه",
            });
            </script>
        @endif
        @if(Session::has('question_deleted'))
            <script>
            swal('ډېر ښه!',"{!! Session::get('question_deleted') !!}", "success", {
                button: "مننه",
            });
            </script>
        @endif
        @if(Session::has('question_not_found'))
            <script>
            swal(' وبخښئ!',"{!! Session::get('question_not_found') !!}", "warning", {
                button: "بیاځلي امتحان کړی",
            });
            </script>
        @endif
        @if(Session::has('questionnaire_not_found'))
            <script>
            swal(' وبخښئ!',"{!! Session::get('questionnaire_not_found') !!}", "warning", {
                button: "بیاځلي امتحان کړی",
            });
            </script>
        @endif
    <script>


        function colorChanger(option){
            $(option).addClass('bg-primary');

        }
    </script>

</body>

</html>
