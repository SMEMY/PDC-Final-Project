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
        h4 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 30px !important;
            font-weight: bold;
        }

        label {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
        }

        button {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }

        select,
        input {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 17px !important;
        }

        #alertMassege li {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
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

        .bootstrap-growl {
            font-size: 30px !important;
            padding: 40px !important;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

        }


        .progress {
            position: relative;
            width: 100%;
            border: 1px solid #7F98B2;
            padding: 1px;
            border-radius: 3px;
            height: 22px;
        }

        .bar {
            background: linear-gradient(to left, #b0dbff 0%, #058ecf 100%);
            width: 0%;
            height: 18px;
            border-radius: 3px;
        }

        .percent {
            position: absolute;
            display: inline-block;
            top: 3px;
            left: 48%;
            color: #ff0303
        }

        .op {
            opacity: 0.5;
        }

        .n-op {
            opacity: 1 !important;
        }

        input:invalid:required {
            border: 3px solid red !important;
        }

    </style>
</head>

<body>
    <!-- Main Wrapper -->
    <a href="/user/enrolledPdcProgramInfo/{{ $program_id }}" class="btn btn-primary apply-btn">پروګرامونه ووینی</a>
    <div class="main-wrapper m-auto col-md-8">


        <!-- Logo -->
        <div class="account-logo mt-5">
            <a href="#"><img src="{{ asset('assets/img/logo2.png') }}" alt="Dreamguy's Technologies"></a>
        </div>
        <!-- /Logo -->

        <div class="" style="min-height: 371px;">

            <div class="content p-5" style="background: white;" id="op">
                <div class="card-header p-3">
                    <h4 class="card-title mb-0">د اوړنده پروکرام اړونده فایلونه اپلوډ کړئ</h4>
                </div>
                <form action="/user/storeMaterials" method="POST" enctype="multipart/form-data" name="formName"
                    id="filesUploads">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    <input class="d-none" type="text" name="program_id" id="prog" value="{{ $program_id }}">
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
                    <div class="row mt-5" id="files">
                        <div class=" col-md-6">
                            <div class="form-group custom-file ">
                                <input type="file" class="custom-file-input" id="customFile" name="materials[0]">
                                <label class="custom-file-label" for="customFile">د پروګرام اړونده
                                    فایل
                                    انتخاب کړی</label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="material" placeholder="د فایل نوم"
                                    name="file_name[0]">
                            </div>
                        </div>
                        <div class=" col-md-3 mb-3" id="">
                            <div class="form-group">
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                    name="file_type[0]">
                                    <option selected value="">د فایل ډول </option>
                                    <option value="لکچر">لکچر</option>
                                    <option value="کتاب">کتاب</option>
                                    <option value="انځور">انځور</option>
                                    <option value="وډیو">وډیو</option>
                                    <option value="آډیو">آډیو</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="form-group m-auto ">
                            <button type="button" id="file-remover" class="btn btn-info mx-auto rounded-circle d-none"
                                style="font-size: 20px;" onclick="removeFile()">&times;</button>
                            <button type="button" class="btn btn-info mx-auto rounded-circle" style="font-size: 20px;;"
                                onclick="addFile(), el()">&plus;</button>
                            <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                        </div>
                    </div>

                    <div class="progress mb-5 d-none" id="show">
                        <div class="bar" style="background-color: white-blue"></div>
                        <div class="percent ">0%</div>
                    </div>
                    {{-- <div>
                        <button onclick="abortForm()" id="btn-abort" class="btn btn-primary col-md-2 d-none"
                            style="display:block; margin: 10px auto !important;  ">cancel</button>

                    </div> --}}
                    <div class="m-auto" style="width: fit-content;">
                        <button type="submit" class="btn btn-primary p-2 " style="width: 300px; text-align: center;"
                            id="btn">ثبت کړی</button>
                        <!-- <button type="submit" class="btn btn-primary p-2" style="width: 300px; text-align: center;" >ثبت
       کړی</button> -->
                    </div>
                </form>
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
    <script>
        function showBar() {
            $('#show').removeClass('d-none');
        }

        function bootstrapAlert() {
            $('.bootstrap-growl').remove();

            $.bootstrapGrowl("د پروګرام فایلونه په کامیابۍ سره سیسټم ته اضافه کړل سول!", {
                type: "success",
                offset: {
                    from: "top",
                    amount: 200
                },
                align: "center",
                width: 1000,
                delay: 3000,
                allow_dismiss: true,
                stackup_spacing: 20
            });
        }

        function bootstrapAlert1() {
            swal('وبخښئ!', "د یاد پروګرام لپاره فایلونه سیسټم ته داخل کړل سوه!", "success", {
                button: "مننه",
            }).then(function() {
                var program = $('#prog').val();
                console.log(program);
                window.location = `/pdcProgramInfo/${program}`;
            });
        }
    </script>
    <script type="text/javascript">
        $(function() {
            $(document).ready(function() {
                var bar = $('.bar');
                var percent = $('.percent');
                var forr = $('#filesUploads');
                forr.ajaxForm({
                    beforeSend: function() {
                        var percentVal = '0%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                        // console.log($('input').val());
                        $('#btn-abort').removeClass('d-none');

                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        $('#show').removeClass('d-none');
                        var percentVal = (percentComplete - 6) + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                        // $('#op').addClass('op');
                        // $('#show').addClass('n-op');
                        // $(".bar").addClass('n-op');

                    },
                    complete: function(xhr) {
                        bootstrapAlert1();
                        $('#show').addClass('d-none');

                        window.setTimeout(function() {
                            var program = $('#prog').val();
                            console.log(program);
                            window.location = `/user/enrolledPdcProgramInfo/${program}`;
                        }, 1000);
                    }
                });
            });
        });

        function abortForm() {
            forr.abort();
        }
    </script>
    @if (Session::has('warn'))
        <script>
            swal('وبخښئ!', "{!! Session::get('warn') !!}", "warning", {
                button: "وروسته کوښښ وکړئ",
            });
        </script>
    @endif
    <script>
        var count4 = 2;
        var indexFile = 1;
        var indexFileType = 1;

        function addFile() {
            var txt1 =
                `							<div class=" col-md-6" >
												<div class="form-group custom-file ">
													<input type="file" class="custom-file-input" id="material"
														name="materials[${indexFile}]">
													<label class="custom-file-label" for="customFile">د پروګرام اړونده
														فایل
														انتخاب کړی</label>
												</div>
											</div>
											<div class=" col-md-3">
												<div class="form-group custom-file ">
													<input type="text" class="form-control" id="customFile"	  name="file_name[${indexFile}]" placeholder="د فایل نوم">
												</div>
											</div>
											<div class=" col-md-3 mb-3" id="">
												<div class="form-group">
													<select class="custom-select"
														style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="file_type[${indexFileType}]">
                                                        <option selected value="">د فایل ډول</option>
														<option value="لکچر">لکچر</option>
														<option value="کتاب">کتاب</option>
														<option value="انځور">انځور</option>
														<option value="وډیو">وډیو</option>
														<option value="آډیو">آډیو</option>
													</select>

												</div>
											</div>`;

            $("#files").children().last().after(txt1);
            $('#file-remover').removeClass('d-none');
            count4++; // Insert new elements after img
            indexFile++;
            indexFileType++;
        }

        function removeFile() {

            if (count4 != 2) {
                $('#files').children().last().remove();
                $('#files').children().last().remove();
                $('#files').children().last().remove();
                indexFile--;
                indexFileType--;
                count4--;
            }
            if (count4 == 2) {
                $('#file-remover').addClass('d-none');

            }

        }

        function el() {
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        }

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</body>

</html>
