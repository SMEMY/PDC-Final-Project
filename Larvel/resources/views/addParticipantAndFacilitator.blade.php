@extends('master.master')
@section('custom-css')
label {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;

	}
    h3{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            

        }
        input{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
		}
        select{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;

			height: 44px  !important; 
			border-radius: 3px  !important; 
			outline: none;
			background-color:#f0fcff  !important; 
			border:1px solid #e3e3e3  !important;
			
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
		textarea{
			background: #f0fcff !important;

		}
		#for{
			transition:all 0.3s;
		}
@endsection



@section('content')
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			<!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
			<div class="container ">

				<!-- Account Logo -->
				<!-- <div class="account-logo mt-5" style="width: 1150px;">
					<a href="index.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
				</div> -->
				<!-- /Account Logo -->

				<div class="account-box" style="width: 1100px; margin-top: 75px; margin-right:140px;" id="for">
					<div class="account-wrapper mt-3" style="">
						<h3 class="account-title mb-5" style="font-size:35px !important; font-weight: bolder;">د مسلکي پرمختیائي مرکز پروګرام ګډونوال ثبت کړئ</h3>
						<!-- <p class="account-subtitle"></p> -->
						<hr !important>
						<!-- Account Form -->
						<form action="/memberStore" method="POST">
								{{ method_field('POST') }}
      					 	    {{ csrf_field() }}
								    @if ($errors->any())
										<div class="mb-5" id="alertMassege">
											<ul style="list-style-type:none" class="p-0 m-0">
												@foreach ($errors->all() as $error)
												<li class="rounded p-2 m-1 alert alert-danger" >
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
											<input class="form-control" type="text"  name="member_name" value="{{old('member_name')}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">تخلص</label>
											<input class="form-control " type="text" name="last_name" value="{{old('last_name')}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">ټلیفون شمېره<span
													class="text-danger">*</span></label>
											<input class="form-control" type="tel"  name="phone_number" value="{{old('phone_number')}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">برېښنالیک<span
													class="text-danger">*</span></label>
											<input class="form-control" type="email" name="email" value="{{old('email')}}">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">جنسیت<span
													class="text-danger">*</span></label>
											<select class="custom-select" name="gender">
												@if(old('gender') === 'ښځینه')
												<option ></option>
												<option value="نارینه">نارینه</option>
												<option selected value="ښځینه">ښځینه</option>
												@elseif(old('gender') === 'نارینه')
												<option ></option>
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
												@if(old('office_campus') === 'کندهار پوهتون')
												<option ></option>
												<option selected value="کندهار پوهتون" > کندهار پوهنتون</option>
												@else
												<option selected></option>
												<option value="کندهار پوهتون" > کندهار پوهنتون</option>
												@endif
											</select>

										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">کاري دفتر<span
													class="text-danger">*</span></label>
											<select class="custom-select " name="office_building">
									
												@if(old('office_building') === 'طب')
                                                <option ></option>
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
                                                <option ></option>
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
                                                <option ></option>
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
                                                <option ></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option selected value="حقوق">حقوق</option>
                                                <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option  value="ژورنالیزم">ژورنالیزم</option>
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
                                                <option ></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option selected value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option  value="ژورنالیزم">ژورنالیزم</option>
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
                                                <option ></option>
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
                                                <option ></option>
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
                                                <option ></option>
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
                                                <option ></option>
                                                <option value="طب">طب</option>
                                                <option value="انجنیري">انجنیري</option>
                                                <option value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                                <option value="حقوق">حقوق</option>
                                                <option value="اداره ئې عامه">اداره ئې عامه</option>
                                                <option value="ژورنالیزم">ژورنالیزم</option>
                                                <option value="اقتصاد">اقتصاد</option>
                                                <option value="زراعت">زراعت</option>
                                                <option selected value="شرعیات">شرعیات</option>
                                                <option  value="ادبیات">ادبیات</option>
                                                <option  value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
												<option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
												<option value="ریاست مقام">ریاست مقام</option>
												<option value="اداري معاونیت">اداري معاونیت</option>
                                                @elseif(old('office_building') === 'ادبیات')
                                                <option ></option>
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
                                                <option  value="ساینس">ساینس</option>
                                                <option value="تعلیم او تربیه">تعلیم او تربیه</option>
												<option value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
												<option value="ریاست مقام">ریاست مقام</option>
												<option value="اداري معاونیت">اداري معاونیت</option>
                                                @elseif(old('office_building') === 'ساینس')
                                                <option ></option>
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
                                                <option ></option>
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
                                                <option ></option>
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
                                                <option  value="تعلیم او تربیه">تعلیم او تربیه</option>
												<option selected value="محصلینو چارو معاونیت">محصلینو چارو معاونیت</option>
												<option value="ریاست مقام">ریاست مقام</option>
												<option value="اداري معاونیت">اداري معاونیت</option>
												@elseif(old('office_building') === 'ریاست مقام')
                                                <option ></option>
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
                                                <option ></option>
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
											<input class="form-control" type="text" name="office_department" value="{{old('office_department')}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">کاري منصب<span
													class="text-danger">*</span></label>
											<select class="custom-select" name="office_position">
												@if(old('office_position') === 'رئیس')
												<option ></option>
												<option selected value="رئیس">رئیس</option>
												<option value="مرستیال">مرستیال</option>
												<option value="ښوونکی">ښوونکی</option>
												<option value="اداري کارمند">اداري کارمند</option>
												@elseif(old('office_position') === 'مرستیال')
												<option ></option>
												<option value="رئیس">رئیس</option>
												<option selected value="مرستیال">مرستیال</option>
												<option value="ښوونکی">ښوونکی</option>
												<option value="اداري کارمند">اداري کارمند</option>
												@elseif(old('office_position') === 'ښوونکی')
												<option ></option>
												<option value="رئیس">رئیس</option>
												<option value="مرستیال">مرستیال</option>
												<option selected value="ښوونکی">ښوونکی</option>
												<option value="اداري کارمند">اداري کارمند</option>
												@elseif(old('office_position') === 'اداري کارمند')
												<option ></option>
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
												@if(old('office_position_category') === 'اداري')
												<option ></option>
												<option selected value="اداري">اداري</option>
												<option value="تدریسي">تدریسي</option>
												<option value="اداري او تدریسي">اداري او تدریسي</option>
												@elseif(old('office_position_category') === 'تدریسي')
												<option ></option>
												<option value="اداري">اداري</option>
												<option selected value="تدریسي">تدریسي</option>
												<option value="اداري او تدریسي">اداري او تدریسي</option>
												@elseif(old('office_position_category') === 'اداري او تدریسي')
												<option ></option>
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
									@if(old('office_position_category') === 'تدریسي' || old('office_position_category') === 'اداري او تدریسي')
									<div class="col-md-12" id="temp">
										<div class="form-group">
											<label class="col-form-label">علمي رتبه<span class="text-danger">*</span></label>
												<select class="custom-select" name="educational_rank">
												@if(old('educational_rank') === 'پوهیالی')
													<option ></option>
													<option selected value="پوهیالی">پوهیالی</option>
													<option value="پوهنیار">پوهنیار</option>
													<option value="پوهنمل">پوهنمل</option>
													<option value="پوهاند">پوهاند</option>
												@elseif(old('educational_rank') === 'پوهنیار')
													<option ></option>
													<option value="پوهیالی">پوهیالی</option>
													<option selected value="پوهنیار">پوهنیار</option>
													<option value="پوهنمل">پوهنمل</option>
													<option value="پوهاند">پوهاند</option>
												@elseif(old('educational_rank') === 'پوهنمل')
													<option ></option>
													<option value="پوهیالی">پوهیالی</option>
													<option value="پوهنیار">پوهنیار</option>
													<option selected value="پوهنمل">پوهنمل</option>
													<option value="پوهاند">پوهاند</option>
												@elseif(old('educational_rank') === 'پوهاند')
													<option ></option>
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
								<hr !important>	<!-- this part has been hidden just for DB Facilitator role -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">پاسورډ<span
													class="text-danger">*</span></label>
											<input class="form-control" type="password" name="password" value="{{old('password')}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">پاسورډ تائید کړی<span
													class="text-danger">*</span></label>
											<input class="form-control input-sm" type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
										</div>
									</div>


							</div>
							<hr !important>	<!-- this part has been hidden just for DB Facilitator role -->

							<div class="form-group text-center col-md-4 m-auto">
								<button class="btn btn-primary  account-btn col-md-12" type="submit">تسهیلونکی ثبت
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
@endsection




@section('custom-js')
@if(Session::has('member_added'))
            <script>
            swal('ډېر ښه!',"{!! Session::get('member_added') !!}", "success", {
                button: "مننه",
            });
            </script>
        @endif
		@if(Session::has('password_confirm'))
            <script>
            swal('وبخښئ!',"{!! Session::get('password_confirm') !!}", "warning", {
                button: "بیا ځلي کتنه وکړئ",
            });
            </script>
        @endif
	<script>
		var s = true;
		childCount = $('#dynamic').children("div").length;
		$("select.rankS").change(function () {
			var state = $(this).children("option:selected").val();
			// alert("You have selected the country - " + state);
			console.log(typeof state);
			if(childCount === 6)
			{
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
			}
			else if (state === "اداري" && s === false) {
				$("#temp").remove();
				s = true
			}
			else{
				// s=false;
			}

		});


		$( "#toggle_btn" ).click(function() {
            if($('#for').css('width') === '1100px' && $('#for').css('margin-right') === '140px')
            {
                console.log("alkfjlakfd");
                $("#for").css("width", "1200px");
                $("#for").css("margin-right", "0px");
            }
            else{
                $("#for").css("width", "1100px");
                $("#for").css("margin-right", "140px");
            }
        });
	</script>
@endsection