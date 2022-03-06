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
        <a href="/home" class="btn btn-primary apply-btn">پروګارمونه ته رجوع وکړی</a>
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
                        <form action="/userRegister" method="POST" id="publicStore">
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
                            <div class="row">
                                <div class="col-md-6 d-none">
                                    <div class="form-group">
                                        <label class="col-form-label">نوم <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="participant" name="return">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">نوم <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="member_name"
                                            value="{{ old('member_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">تخلص</label>
                                        <input class="form-control " type="text" name="last_name"
                                            value="{{ old('last_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">ټلیفون شمېره<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="tel" name="phone_number"
                                            value="{{ old('phone_number') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">برېښنالیک<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">جنسیت<span class="text-danger">*</span></label>
                                        <select class="custom-select" name="gender">
                                            @if (old('gender') === 'ښځینه')
                                                <option></option>
                                                <option value="نارینه">نارینه</option>
                                                <option selected value="ښځینه">ښځینه</option>
                                            @elseif(old('gender') === 'نارینه')
                                                <option></option>
                                                <option selected value="نارینه">نارینه</option>
                                                <option value="ښځینه">ښځینه</option>
                                            @else
                                                <option selected></option>
                                                <option value="نارینه">نارینه</option>
                                                <option value="ښځینه">ښځینه</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <hr !important>
                            <div class="row" id="dynamic">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">کاري ساحې نوم<span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select" name="office_campus">
                                            @if (old('office_campus') === 'کندهار پوهتون')
                                                <option></option>
                                                <option selected value="کندهار پوهتون"> کندهار پوهنتون</option>
                                            @else
                                                <option selected></option>
                                                <option value="کندهار پوهتون"> کندهار پوهنتون</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">کاري دفتر<span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select " name="office_building">

                                            @if (old('office_building') === 'طب')
                                                <option></option>
                                                <option selected value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'انجنیري')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option selected value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'کمپیوټر ساینس')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option selected value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'حقوق')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option selected value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'اداره ئې عامه')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option selected value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'ژورنالیزم')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option selected value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'اقتصاد')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option selected value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'زراعت')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option selected value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'شرعیات')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option selected value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'ادبیات')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option selected value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'ساینس')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option selected value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'تعلیم او تربیه')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option selected value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'محصلینو چارو معاونیت')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option selected value="محصلینو چارو معاونیت">محصلینو چارو معاونیت
                                                </option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'ریاست مقام')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option selected value="ریاست مقام">ریاست مقام</option>
                                                <option value="اداري معاونیت">اداري معاونیت</option>
                                            @elseif(old('office_building') === 'اداري معاونیت')
                                                <option></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                                <option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
                                                <option value="ریاست مقام">ریاست مقام</option>
                                                <option selected value="اداري معاونیت">اداري معاونیت</option>
                                            @else
                                                <option selected></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option value="شرعیات">شرعیات</option>
                                                <option value="ادبیات">ادبیات</option>
                                                <option value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">کاري شعبه</label>
                                        <input class="form-control" type="text" name="office_department"
                                            value="{{ old('office_department') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">کاري منصب<span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select" name="office_position">
                                            @if (old('office_position') === 'رئیس')
                                                <option></option>
                                                <option selected value="رئیس">رئیس</option>
                                                <option value="مرستیال">مرستیال</option>
                                                <option value="ښوونکی">ښوونکی</option>
                                                <option value="اداري کارمند">اداري کارمند</option>
                                            @elseif(old('office_position') === 'مرستیال')
                                                <option></option>
                                                <option value="رئیس">رئیس</option>
                                                <option selected value="مرستیال">مرستیال</option>
                                                <option value="ښوونکی">ښوونکی</option>
                                                <option value="اداري کارمند">اداري کارمند</option>
                                            @elseif(old('office_position') === 'ښوونکی')
                                                <option></option>
                                                <option value="رئیس">رئیس</option>
                                                <option value="مرستیال">مرستیال</option>
                                                <option selected value="ښوونکی">ښوونکی</option>
                                                <option value="اداري کارمند">اداري کارمند</option>
                                            @elseif(old('office_position') === 'اداري کارمند')
                                                <option></option>
                                                <option value="رئیس">رئیس</option>
                                                <option value="مرستیال">مرستیال</option>
                                                <option value="ښوونکی">ښوونکی</option>
                                                <option selected value="اداري کارمند">اداري کارمند</option>
                                            @else
                                                <option selected></option>
                                                <option value="رئیس">رئیس</option>
                                                <option value="مرستیال">مرستیال</option>
                                                <option value="ښوونکی">ښوونکی</option>
                                                <option value="اداري کارمند">اداري کارمند</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="rank">
                                    <div class="form-group">
                                        <label class="col-form-label"> کاري برخه<span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select rankS" name="office_position_category">
                                            @if (old('office_position_category') === 'اداري')
                                                <option></option>
                                                <option selected value="اداري">اداري</option>
                                                <option value="تدریسي">تدریسي</option>
                                                <option value="اداري او تدریسي">اداري او تدریسي</option>
                                            @elseif(old('office_position_category') === 'تدریسي')
                                                <option></option>
                                                <option value="اداري">اداري</option>
                                                <option selected value="تدریسي">تدریسي</option>
                                                <option value="اداري او تدریسي">اداري او تدریسي</option>
                                            @elseif(old('office_position_category') === 'اداري او تدریسي')
                                                <option></option>
                                                <option value="اداري">اداري</option>
                                                <option value="تدریسي">تدریسي</option>
                                                <option selected value="اداري او تدریسي">اداري او تدریسي</option>
                                            @else
                                                <option selected></option>
                                                <option value="اداري">اداري</option>
                                                <option value="تدریسي">تدریسي</option>
                                                <option value="اداري او تدریسي">اداري او تدریسي</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                                @if (old('office_position_category') === 'تدریسي' || old('office_position_category') === 'اداري او تدریسي')
                                    <div class="col-md-12" id="temp">
                                        <div class="form-group">
                                            <label class="col-form-label">علمي رتبه<span
                                                    class="text-danger">*</span></label>
                                            <select class="custom-select" name="educational_rank">
                                                @if (old('educational_rank') === 'پوهیالی')
                                                    <option></option>
                                                    <option selected value="پوهیالی">پوهیالی</option>
                                                    <option value="پوهنیار">پوهنیار</option>
                                                    <option value="پوهنمل">پوهنمل</option>
                                                    <option value="پوهاند">پوهاند</option>
                                                @elseif(old('educational_rank') === 'پوهنیار')
                                                    <option></option>
                                                    <option value="پوهیالی">پوهیالی</option>
                                                    <option selected value="پوهنیار">پوهنیار</option>
                                                    <option value="پوهنمل">پوهنمل</option>
                                                    <option value="پوهاند">پوهاند</option>
                                                @elseif(old('educational_rank') === 'پوهنمل')
                                                    <option></option>
                                                    <option value="پوهیالی">پوهیالی</option>
                                                    <option value="پوهنیار">پوهنیار</option>
                                                    <option selected value="پوهنمل">پوهنمل</option>
                                                    <option value="پوهاند">پوهاند</option>
                                                @elseif(old('educational_rank') === 'پوهاند')
                                                    <option></option>
                                                    <option value="پوهیالی">پوهیالی</option>
                                                    <option value="پوهنیار">پوهنیار</option>
                                                    <option value="پوهنمل">پوهنمل</option>
                                                    <option selected value="پوهاند">پوهاند</option>
                                                @else
                                                    <option selected></option>
                                                    <option value="پوهیالی">پوهیالی</option>
                                                    <option value="پوهنیار">پوهنیار</option>
                                                    <option value="پوهنمل">پوهنمل</option>
                                                    <option value="پوهاند">پوهاند</option>
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                @endif
                            </div>
                            <hr !important> <!-- this part has been hidden just for DB Facilitator role -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">پاسورډ<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="password" name="password"
                                            value="{{ old('password') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">پاسورډ تائید کړی<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control input-sm" type="password"
                                            name="password_confirmation" value="{{ old('password_confirmation') }}">
                                    </div>
                                </div>


                            </div>
                            {{-- <hr !important> <!-- this part has been hidden just for DB Facilitator role --> --}}
                            <hr style="width:70%">
                            <h3 class="account-title p-3">د ګډونوال محافظوي پوښتنو برخه</h3>

                            <div class="row p-3">
                                <div class="col-sm-6 col-md-12" id="search_content">
                                    <div class="form-group form-focus select-focus">
                                        <label>لمړي پوښتنه</label>

                                        <select class="custom-select p-2 h-100 searchInput" name="f_q">
                                            <a href="/facilitatorList">
                                                <option selected value="">پوښتنه مو انتخاب کړی!</option>
                                            </a>
                                            <option value="ستاسي د خوښي خواړه کوم دي؟">ستاسي د خوښي خواړه کوم دي؟
                                            </option>
                                            <option value="د خوښي حیوان مو کوم یو دی؟">د خوښي حیوان مو کوم یو دی؟
                                            </option>
                                            <option value="د خوښي رنګ مو کوم رنګ دی؟">د خوښي رنګ مو کوم رنګ دی؟</option>
                                            <option value="په کور کي مو د ناز نوم څه دی؟">په کور کي مو د ناز نوم څه دی؟
                                            </option>
                                            <option value="ستاسي د خوښي مېوه کوم یو دی؟">ستاسي د خوښي مېوه کوم یو دی؟
                                            </option>
                                            <!-- <option>Delta Infotech</option> -->
                                        </select>
                                        <!-- <label class="focus-label">پروګرام انتخاب کړی</label> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-12 p-3">
                                    <label>ځواب</label>
                                    <input class="form-control" name="f_a" type="text" placeholder="داډمېن تخلص"
                                        value="{{ old('first_answer') }}">
                                </div>
                            </div>
                            <hr style="width:70%">
                            <div class="row p-3">
                                <div class="col-sm-6 col-md-12" id="search_content">
                                    <div class="form-group form-focus select-focus">
                                        <label>دویمه پوښتنه</label>

                                        <select class="custom-select p-2 h-100 searchInput" name="s_q">
                                            <a href="/facilitatorList">
                                                <option selected value="">پوښتنه مو انتخاب کړی!</option>
                                            </a>
                                            <option value="ستاسي د خوښي خواړه کوم دي؟">ستاسي د خوښي خواړه کوم دي؟
                                            </option>
                                            <option value="د خوښي حیوان مو کوم یو دی؟">د خوښي حیوان مو کوم یو دی؟
                                            </option>
                                            <option value="د خوښي رنګ مو کوم رنګ دی؟">د خوښي رنګ مو کوم رنګ دی؟</option>
                                            <option value="په کور کي مو د ناز نوم څه دی؟">په کور کي مو د ناز نوم څه دی؟
                                            </option>
                                            <option value="ستاسي د خوښي مېوه کوم یو دی؟">ستاسي د خوښي مېوه کوم یو دی؟
                                            </option>
                                            <!-- <option>Delta Infotech</option> -->
                                        </select>
                                        <!-- <label class="focus-label">پروګرام انتخاب کړی</label> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-12 p-3">
                                    <label>ځواب</label>
                                    <input class="form-control" name="s_a" type="text" placeholder="داډمېن تخلص"
                                        value="{{ old('second_answer') }}">
                                </div>
                            </div>
                            <hr style="width:70%">

                            <div class="row p-3">
                                <div class="col-sm-6 col-md-12" id="search_content">
                                    <div class="form-group form-focus select-focus">
                                        <label>دریمه پوښتنه</label>

                                        <select class="custom-select p-2 h-100 searchInput" name="t_q">
                                            <a href="/facilitatorList">
                                                <option selected value="">پوښتنه مو انتخاب کړی!</option>
                                            </a>
                                            <option value="ستاسي د خوښي خواړه کوم دي؟">ستاسي د خوښي خواړه کوم دي؟
                                            </option>
                                            <option value="د خوښي حیوان مو کوم یو دی؟">د خوښي حیوان مو کوم یو دی؟
                                            </option>
                                            <option value="د خوښي رنګ مو کوم رنګ دی؟">د خوښي رنګ مو کوم رنګ دی؟</option>
                                            <option value="په کور کي مو د ناز نوم څه دی؟">په کور کي مو د ناز نوم څه دی؟
                                            </option>
                                            <option value="ستاسي د خوښي مېوه کوم یو دی؟">ستاسي د خوښي مېوه کوم یو دی؟
                                            </option>
                                            <!-- <option>Delta Infotech</option> -->
                                        </select>
                                        <!-- <label class="focus-label">پروګرام انتخاب کړی</label> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-12 p-3">
                                    <label>ځواب</label>
                                    <input class="form-control" name="t_a" type="text" placeholder="داډمېن تخلص"
                                        value="{{ old('third_answer') }}">
                                </div>


                            </div>
                            <div class="form-group text-center col-md-4 m-auto">
                                <button class="btn btn-primary submit-btn" type="submit"> ثبت
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
    @if (Session::has('add'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('add') !!}", "success", {
                button: "مننه",
            }).then(function() {

                window.location = `/login`;
            });
        </script>
    @endif
    @if (Session::has('member_added'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('member_added') !!}", "success", {
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
