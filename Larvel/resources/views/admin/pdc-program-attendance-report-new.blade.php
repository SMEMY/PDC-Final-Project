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

        th {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            text-align: center !important;
            padding: 10 !important;
            < !-- line-height: 15px;
            -->font-size: 20px !important;
            font-weight: bold !important;
            border-radius: 5px !important;

        }

        td {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            text-align: center !important;
            border-radius: 5px !important;
            padding: 2px !important;
            font-size: 20px !important;

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

        input::placeholder {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 17px !important;
        }

        #alertMassege {
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

    </style>
</head>

<body>
    <!-- Main Wrapper -->
    <a href="/admin/pdcProgramInfo/{{ $programID }}" class="btn btn-primary apply-btn"><i class="fa fa-arrow-left"
            aria-hidden="true"></i></a>
    <div class="main-wrapper m-auto col-md-11">


        <!-- Logo -->
        <div class="account-logo mt-5">
            <a href="#"><img src="{{ asset('assets/img/logo2.png') }}" alt="Dreamguy's Technologies"></a>
        </div>
        <div>
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">سوبتیا پاڼه</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">د پي ډي سي د پروګرام دګډونوالو د حاضرۍ راپور</li>
                        </ul>
                    </div>
                </div>
            </div>
            <form action="/admin/searchUserAttendance" method="POST">
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
                <input type="hidden" name="program_id" id="" value="{{ $programID }}">
                <div class="row filter-row mb-5" id="search_parts">
                    <div class="col-sm-6 col-md-5" id="search_input">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating disable" name="search_content" disabled
                                id="searchInput">
                            <label class="focus-label">تسهیلونکی وپلټی</label>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5" id="search_content">
                        <div class="form-group form-focus select-focus">
                            <select class="custom-select p-2 h-100 searchInput" name="search_type">
                                <a href="/facilitatorList">
                                    <option selected value="">د پلټني عنصر انتخاب کړی!</option>
                                </a>
                                <option value="name">نوم</option>
                                <option value="email">برېښنالیک</option>
                                <option value="phone_number">د موبائیل شمېره</option>
                                {{-- <option value="educational_rank">علمي رتبه</option>
                                <option value="gender">جنسیت</option>
                                <option value="office_building">کاري دفتر</option>
                                <option value="office_department">کاري شعبه</option>
                                <option value="office_position">کاري منصب</option>
                                <option value="office_position_category">کاري برخه</option> --}}
                                <!-- <option>Delta Infotech</option> -->
                            </select>
                            <!-- <label class="focus-label">پروګرام انتخاب کړی</label> -->
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <!-- <a href="#" class="">پلټنه </a> -->
                        <button type="submit" class="btn btn-success btn-block h3 p-1">پلټنه</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table table-nowrap mb-0 ">
                            <thead>
                                <tr class="col-12"
                                    style="background: linear-gradient(to right, #00c5fb 0%, #0253cc 100%);">
                                    <th class=" col-2 p-2 border text-light" style="font-size: 18px;">
                                        <strong>ګډونوال</strong>
                                    </th>
                                    <th class="text-center border col-3 p-1 text-light" style="font-size: 18px;">
                                        <strong>مجموعه ورځي</strong>
                                    </th>
                                    <th class="text-center border col-3 p-2" style="font-size: 18px;">
                                        <strong>سوبتیا</strong>
                                    </th>
                                    <th class="text-center border col-3 p-2" style="font-size: 18px;">
                                        <strong>ناسوبتیا</strong>
                                    </th>

                                    <th class="text-center border col-1 p-2" style="font-size: 18px;">
                                        <strong>عملیه</strong>
                                    </th>

                                </tr>

                            </thead>
                            <tbody class="overflow-hidden">
                                <form action="/pdcProgramAttendanceEntry" class="" method="POST">

                                    {{ method_field('POST') }}
                                    {{ csrf_field() }}


                                    @foreach ($attendanceReport as $participant)
                                        <tr class="border col-12">
                                            <td class="border-left text-left pl-3">
                                                {{ $participant->name }} {{ $participant->last_name }}
                                            </td>
                                            <td class="text-center  border-left ">
                                                {{ $participant->total_days }}
                                            </td>
                                            <td class="text-center  border-left ">
                                                {{ $participant->presence_days }}
                                            </td>
                                            <td class="text-center  border-left ">
                                                {{ $participant->absence_days }}
                                            </td>
                                            <td class="border" dir="ltr">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false"><i
                                                            class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-left">
                                                        <a class="dropdown-item"
                                                            href="/admin/pdcProgramAttendanceReport/{{ $participant->id }}/edit"><i
                                                                class="fa fa-pencil m-r-5"></i> اصلاح يې کړی</a>
                                                        <a class="dropdown-item"
                                                            href="/admin/pdcProgramAttendanceReport/{{ $participant->p_id }}"
                                                            data-toggle="modal" data-target="#delete_employee"
                                                            onclick="pathFinder(this)"><i
                                                                class="fa fa-trash-o m-r-5"></i>
                                                            له منځه یې اوسی</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                </form>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>ګدونوال له منځه یوسی!</h3>
                                <p>آیا تاسي مطمئین یاست چي یاد ګډونوال له منځه یوسی؟</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="" method="post" id="pathGetter">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <input class="d-none" type="text" name="page" id=""
                                                value="pdc-program-participants-list">
                                            <input class="d-none" type="number" id="" name="program_id" id=""
                                                value="{{ $programID }}">
                                            <input class="d-none" type="number" id="P_ID" name="participant_id"
                                                id="" value="">
                                            <button type="submit" class="btn btn-danger continue-btn col-md-12"
                                                class="">له منځه یوسی</button>
                                        </form>
                                        <!-- <a href="" class="btn btn-primary continue-btn">Delete</a> -->
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal"
                                            class="btn btn-primary cancel-btn"
                                            style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;">فسخه
                                            کړی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    @if (Session::has('success'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('success') !!}", "success", {
                button: "سمده",
            });
        </script>
    @endif
    @if (Session::has('warn_search'))
        <script>
            swal('وبخښۍ!', "{!! Session::get('warn_search') !!}", "warning", {
                button: "مننه",
            });
        </script>
    @endif
    <script>
        function pathFinder(num) {
            console.log(num.href.split('/'));
            var participantArr = num.href.split('/');
            var participantlen = participantArr.length;
            var participantID = participantArr[participantlen - 1];
            document.getElementById('P_ID').value = participantID;
            console.log(participantID);
            document.getElementById("pathGetter").action = num.href;

        }
        var s = true;
        $("select.searchInput").change(function() {
            var state = $(this).children("option:selected").val();
            // alert("You have selected the country - " + state);
            console.log(state);
            // console.log($('#search_parts').children().first().remove());


            if (state === 'name') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="text" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label">تسهیلونکی وپلټی</label>
				</div>
				</div>
				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);
            }
            if (state === 'email') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="email" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label">برېښنالیک ولیکی</label>
				</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'phone_number') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="text" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label">موبائیل شماره ولیکی</label>
				</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === '') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
					<div class="form-group form-focus">
						<input type="text" class="form-control floating disable" name="search_content" disabled id="searchInput">
						<label class="focus-label">تسهیلونکی وپلټی</label>
					</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
        });
    </script>
</body>

</html>
