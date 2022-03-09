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

    </style>
</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        {{-- <a href="/home" class="btn btn-primary apply-btn">پروګارمونه ته رجوع وکړی</a> --}}
        <div class="account-content">
            <!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
            <div class="container ">

                <!-- Account Logo -->
                <div class="account-logo mt-5">
                    <a href="index.html"><img src="{{ asset('assets/img/logo2.png') }}"
                            alt="Dreamguy's Technologies"></a>
                </div>
                <!-- /Account Logo -->

                <div class="account-box m-auto" style="width: 1100px; margin-top: 75px; " id="for">
                    <div class="account-wrapper mt-3" style="">
                        <h3 class="account-title mb-5" style="font-size:35px !important; font-weight: bolder;">د مسلکي
                            پرمختیائي مرکز پروګرام ګډونوال ثبت کړئ</h3>
                        <!-- <p class="account-subtitle"></p> -->
                        <hr !important>
                        <!-- Account Form -->
                        <form action="/user/profile/{{ auth()->user()->id }}" method="POST" id="publicStore">
                            {{ method_field('PATCH') }}
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">نوم <span class="text-danger">*</span></label>
                                        <input class="form-control " type="text" name="user_name"
                                            value="{{ $user[0]->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">تخلص</label>
                                        <input class="form-control " type="text" name="last_name"
                                            value="{{ $user[0]->last_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">ټلیفون شمېره<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="tel" pattern="[0-9]+" name="phone_number"
                                            value="{{ $user[0]->phone_number }}">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">برېښنالیک<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $user[0]->email }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">جنسیت<span class="text-danger">*</span></label>
                                        <select class="custom-select" name="gender">
                                            <!-- <option selected="">جنسیت</option> -->
                                            <option></option>
                                            @if ($user[0]->gender === 'نارینه')
                                                <option selected value="نارینه">نارینه</option>
                                                <option value="ښځینه">ښځینه</option>
                                            @else
                                                <option value="نارینه">نارینه</option>
                                                <option selected value="ښځینه">ښځینه</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <hr !important>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">کاري ساحې نوم<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control " type="text" name="office_campus"
                                            value="{{ $user[0]->office_campus }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">کاري دفتر<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control " type="text" name="office_building"
                                            value="{{ $user[0]->office_building }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">کاري شعبه</label>
                                        <input class="form-control" type="text" name="office_department"
                                            value="{{ $user[0]->office_department }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">کاري منصب<span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select" name="office_position">
                                            <!-- <option selected="">جنسیت</option> -->
                                            <option></option>
                                            @if ($user[0]->office_position === 'رئیس')
                                                <option selected value="رئیس">رئیس</option>
                                                <option value="مرستیال">مرستیال</option>
                                                <option value="ښوونکی">ښوونکی</option>
                                                <option value="اداري کارمند">اداري کارمند</option>
                                            @elseif($user[0]->office_position === 'مرستیال')
                                                <option value="رئیس">رئیس</option>
                                                <option selected value="مرستیال">مرستیال</option>
                                                <option value="ښوونکی">ښوونکی</option>
                                                <option value="اداري کارمند">اداري کارمند</option>
                                            @elseif($user[0]->office_position === 'ښوونکی')
                                                <option value="رئیس">رئیس</option>
                                                <option value="مرستیال">مرستیال</option>
                                                <option selected value="ښوونکی">ښوونکی</option>
                                                <option value="اداري کارمند">اداري کارمند</option>
                                            @else
                                                <option value="رئیس">رئیس</option>
                                                <option value="مرستیال">مرستیال</option>
                                                <option value="ښوونکی">ښوونکی</option>
                                                <option selected value="اداري کارمند">اداري کارمند</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="rank">
                                    <div class="form-group">
                                        <label class="col-form-label"> کاري برخه<span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select rankS" name="office_position_category">
                                            <option></option>
                                            @if ($user[0]->office_position_category === 'اداري')
                                                <option selected value="اداري">اداري</option>
                                                <option value="تدریسي">تدریسي</option>
                                                <option value="اداري او تدریسي">اداري او تدریسي</option>
                                            @elseif($user[0]->office_position_category === 'تدریسي')
                                                <option value="اداري">اداري</option>
                                                <option selected value="تدریسي">تدریسي</option>
                                                <option value="اداري او تدریسي">اداري او تدریسي</option>
                                            @else
                                                <option value="اداري">اداري</option>
                                                <option value="تدریسي">تدریسي</option>
                                                <option selected value="اداري او تدریسي">اداري او تدریسي</option>
                                            @endif
                                            <!-- <option value="3">اداري کارمند</option> -->
                                        </select>
                                    </div>
                                </div>
                                @if ($user[0]->educational_rank != null)
                                    <div class="col-md-12" id="temp1">
                                        <div class="form-group">
                                            <label class="col-form-label">علمي رتبه<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" name="educational_rank">
                                                <option></option>
                                                @if ($user[0]->educational_rank === 'پوهایالی')
                                                    <option selected value="پوهایالی">پوهایالی</option>
                                                    <option value="پوهنیار">پوهنیار</option>
                                                    <option value="پوهنمل">پوهنمل</option>
                                                    <option value="پوهاند">پوهاند</option>
                                                @elseif($user[0]->educational_rank === 'پوهنیار')
                                                    <option value="پوهایالی">پوهایالی</option>
                                                    <option selected value="پوهنیار">پوهنیار</option>
                                                    <option value="پوهنمل">پوهنمل</option>
                                                    <option value="پوهاند">پوهاند</option>
                                                @elseif($user[0]->educational_rank === 'پوهنمل')
                                                    <option value="پوهایالی">پوهایالی</option>
                                                    <option value="پوهنیار">پوهنیار</option>
                                                    <option selected value="پوهنمل">پوهنمل</option>
                                                    <option value="پوهاند">پوهاند</option>
                                                @else
                                                    <option value="پوهایالی">پوهایالی</option>
                                                    <option value="پوهنیار">پوهنیار</option>
                                                    <option value="پوهنمل">پوهنمل</option>
                                                    <option selected value="پوهاند">پوهاند</option>
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- <hr !important>	 -->
                            <!-- this part has been hidden just for DB user role -->

                            <!-- <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label class="col-form-label">پاسورډ<span
                                             class="text-danger">*</span></label>
                                     <input class="form-control" type="password" name="password" value="{{ $user[0]->password }}">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label class="col-form-label">پاسورډ تائید کړی<span
                                             class="text-danger">*</span></label>
                                     <input class="form-control input-sm" type="password" name="password_confirmation" value="{{ $user[0]->password }}">
                                 </div>
                             </div>
                         </div> -->
                            <hr !important> <!-- this part has been hidden just for DB user role -->

                            <div class="form-group text-center col-md-12">
                                <button class="btn btn-primary submit-btn" type="submit">تسهیلونکی ثبت
                                    کړی</button>
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
    <!-- bootstrap growl js -->
    <script src="{{ asset('assets/growl/jquery.bootstrap-growl.min.js') }}"></script>
    <!-- sweet alert -->
    <script src="{{ asset('assets/sweet-alert/sweetalert.min.js') }}"></script>

    <script src="{{ asset('assets/form-js/jquery.form.min.js') }}"></script>
    @if (Session::has('user_added'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('user_added') !!}", "success", {
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
    @if (Session::has('add'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('add') !!}", "success", {
                button: "مننه",
            }).then(function() {

                window.location = `/login`;
            });
        </script>
    @endif
    @if (Session::has('user_added'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('user_added') !!}", "success", {
                button: "مننه",
            }).then(function() {

                window.location = `/login`;
            });
        </script>
    @endif
    <script>
        // $('swal-button').click
        $(".swal-button").click(function() {
            window.location = '/login';
        });
        // function bootstrapAlert1(){

        // 	}
        // $(function() {
        // 	$(document).ready(function()
        // 	{

        // 		$('#publicStore').ajaxForm({
        // 			beforeSend: function() {
        // 				// var percentVal = '0%';
        // 				// bar.width(percentVal)
        // 				// percent.html(percentVal);
        // 			},
        // 			uploadProgress: function(event, position, total, percentComplete) {
        // 				// $('#show').removeClass('d-none');
        // 				// var percentVal = percentComplete + '%';
        // 				// bar.width(percentVal)
        // 				// percent.html(percentVal);
        // 			},
        // 			complete: function(xhr) {
        // 				console.log(xhr);
        // 				bootstrapAlert1();
        // 				// $('#show').addClass('d-none');

        // 				// window.setTimeout(function () {
        // 				// 	var program = $('#prog').val();
        // 				// 	console.log(program);
        // 				// 	// window.location = `/pdcProgramInfo/${program}`;
        // 				// }, 3000);
        // 			}
        // 		});
        // 	});
        // });
        var s = true;
        childCount = $('#dynamic').children("div").length;
        $("select.rankS").change(function() {
            var state = $(this).children("option:selected").val();
            // alert("You have selected the country - " + state);
            console.log(typeof state);
            if (childCount === 6) {
                $("#temp").remove();
                childCount--;
            }
            if ((state === "تدریسي" || state === "اداري او تدریسي") && s === true) {
                var txt1 =
                    `<div class="col-md-12" id="temp">
						<div class="form-group">
							<label class="col-form-label">علمي رتبه<span class="text-danger">*</span></label>
								<select class="custom-select" name="educational_rank">
								<!-- <option selected="">جنسیت</option> -->
								<option value="پوهایالی">پوهایالی</option>
								<option value="پوهنیار">پوهنیار</option>
								<option value="پوهنمل">پوهنمل</option>
								<option value="پوهاند">پوهاند</option>
								<!-- <option value="3">اداري کارمند</option> -->
							</select>

						</div>
					</div>`;

                $("#rank").after(txt1);
                s = false;
            } else if (state === "اداري" && s === false) {
                $("#temp").remove();
                s = true
            } else {
                // s=false;
            }

        });


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
