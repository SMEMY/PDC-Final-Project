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
			transition: all 0.3s;

        }
        #alertMassege{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
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

				<div class="account-box" style="width: 1000px; margin-top: 75px; margin-right:200px;" id="for">
					<div class="account-wrapper mt-3" style="">
						<h3 class="account-title mb-5">د تقرر/علمي رتبې پروګرام ثبت کړی</h3>
						<!-- <p class="account-subtitle"></p> -->
                        <hr !important>

						<!-- Account Form -->
                    <form action="/admin/educationalProgramList/{{$program->id}}" method="post" >
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                                <div class="row">
                                    @if ($errors->any())
                                        <div class="mb-5 col-md-12" id="alertMassege">
                                            <ul style="list-style-type:none" class="p-0 m-0">
                                                @foreach ($errors->all() as $error)
                                                <li class="rounded p-2 m-1 alert alert-danger" >
                                                    {{ $error }}
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د علمي کنفرانفس/ سیمینار موضوع</label>
                                        <input class="form-control" type="text" name="topic" value="{{$program->topic}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د تقرري/ علمي ترفېع ډول</label>
                                        <select class="custom-select"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="type">
                                            @if($program->type == 'علمي ترفېع')
                                            <option></option>
                                            <option selected value="علمي ترفېع">علمي ترفېع</option>
                                            <option  value="ارتقاء">ارتقاء</option>
                                            <option  value="تقرر">تقرر</option>
                                            @elseif($program->type == 'ارتقاء')
                                            <option  value="علمي ترفېع">علمي ترفېع</option>
                                            <option selected value="ارتقاء">ارتقاء</option>
                                            <option  value="تقرر">تقرر</option>
                                            @else
                                            <option  value="علمي ترفېع">علمي ترفېع</option>
                                            <option  value="ارتقاء">ارتقاء</option>
                                            <option selected value="تقرر">تقرر</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د استاد نوم</label>
                                        <!-- <div class="cal-icon"> -->
                                        <input class="form-control" type="text" name="teacher_name" value="{{$program->teacher_name}}">
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د استاد تخلص</label>
                                        <!-- <div class="cal-icon"> -->
                                        <input class="form-control" type="text" name="teacher_last_name" value="{{$program->teacher_last_name}}">
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>د استاد تخلص پلار نوم</label>
                                        <!-- <div class="cal-icon"> -->
                                        <input class="form-control" type="text" name="father_name" value="{{$program->father_name}}">
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د استاد پوهنتون</label>
                                        <select class="custom-select"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="university">
                                            @if($program->university === 'کندهار پوهنتون')
                                            <option ></option>
                                            <option selected value="کندهار پوهنتون">کندهار پوهنتون</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د استاد پوهنځۍ </label>
                                        <select class="custom-select"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="faculty">
                                        
                                            @if($program->faculty === 'طب')
                                            <option ></option>
                                            <option selected value="طب">طب</option>
                                            <option  value="انجنیري">انجنیري</option>
                                            <option  value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                            <option  value="حقوق">حقوق</option>
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            <option  value="ژورنالیزم">ژورنالیزم</option>
                                            <option  value="اقتصاد">اقتصاد</option>
                                            <option  value="زراعت">زراعت</option>
                                            <option  value="شرعیات">شرعیات</option>
                                            <option  value="ادبیات">ادبیات</option>
                                            <option  value="ساینس">ساینس</option>

                                            @elseif($program->faculty === 'انجنیري')
                                            <option  value="طب">طب</option>
                                            <option selected value="انجنیري">انجنیري</option>
                                            <option  value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                            <option  value="حقوق">حقوق</option>
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            <option  value="ژورنالیزم">ژورنالیزم</option>
                                            <option  value="اقتصاد">اقتصاد</option>
                                            <option  value="زراعت">زراعت</option>
                                            <option  value="شرعیات">شرعیات</option>
                                            <option  value="ادبیات">ادبیات</option>
                                            <option  value="ساینس">ساینس</option>                                   
                                            <option  value="تعلیم او تربیه">تعلیم او تربیه</option>
                                            @elseif($program->faculty === 'حقوق')
                                            <option  value="طب">طب</option>
                                            <option  value="انجنیري">انجنیري</option>
                                            <option  selected value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                            <option  value="حقوق">حقوق</option>
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            <option  value="ژورنالیزم">ژورنالیزم</option>
                                            <option  value="اقتصاد">اقتصاد</option>
                                            <option  value="زراعت">زراعت</option>
                                            <option  value="شرعیات">شرعیات</option>
                                            <option  value="ادبیات">ادبیات</option>
                                            <option  value="ساینس">ساینس</option>                                   
                                            <option  value="تعلیم او تربیه">تعلیم او تربیه</option>                                    
                                            <option selected value="اداره ئې عامه">اداره ئې عامه</option>
                                            @elseif($program->faculty === 'ژورنالیزم')
                                            <option  value="طب">طب</option>
                                            <option  value="انجنیري">انجنیري</option>
                                            <option  selected value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                            <option  value="حقوق">حقوق</option>
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            <option  selected value="ژورنالیزم">ژورنالیزم</option>
                                            <option  value="اقتصاد">اقتصاد</option>
                                            <option  value="زراعت">زراعت</option>
                                            <option  value="شرعیات">شرعیات</option>
                                            <option  value="ادبیات">ادبیات</option>
                                            <option  value="ساینس">ساینس</option>                                    
                                            <option  value="تعلیم او تربیه">تعلیم او تربیه</option>                                  
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            @elseif($program->faculty === 'اقتصاد')
                                            <option  value="طب">طب</option>
                                            <option  value="انجنیري">انجنیري</option>
                                            <option  selected value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                            <option  value="حقوق">حقوق</option>
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            <option  value="ژورنالیزم">ژورنالیزم</option>
                                            <option  selected value="اقتصاد">اقتصاد</option>
                                            <option   value="زراعت">زراعت</option>
                                            <option  value="شرعیات">شرعیات</option>
                                            <option  value="ادبیات">ادبیات</option>
                                            <option  value="ساینس">ساینس</option>                                
                                            <option  value="تعلیم او تربیه">تعلیم او تربیه</option>                                    
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>                                   
                                            @elseif($program->faculty === 'زراعت')
                                            <option  value="طب">طب</option>
                                            <option  value="انجنیري">انجنیري</option>
                                            <option   value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                            <option  value="حقوق">حقوق</option>
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            <option  value="ژورنالیزم">ژورنالیزم</option>
                                            <option  value="اقتصاد">اقتصاد</option>
                                            <option  selected value="زراعت">زراعت</option>
                                            <option  value="شرعیات">شرعیات</option>
                                            <option  value="ادبیات">ادبیات</option>
                                            <option  value="ساینس">ساینس</option>                                   
                                            <option  value="تعلیم او تربیه">تعلیم او تربیه</option>                                   
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>                                   
                                            @elseif($program->faculty === 'ادبیات')
                                            <option  value="طب">طب</option>
                                            <option  value="انجنیري">انجنیري</option>
                                            <option   value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                            <option  value="حقوق">حقوق</option>
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            <option  value="ژورنالیزم">ژورنالیزم</option>
                                            <option  value="اقتصاد">اقتصاد</option>
                                            <option   value="زراعت">زراعت</option>
                                            <option   value="شرعیات">شرعیات</option>
                                            <option  selected value="ادبیات">ادبیات</option>
                                            <option  value="ساینس">ساینس</option>                                  
                                            <option  value="تعلیم او تربیه">تعلیم او تربیه</option>                                  
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>  
                                            @elseif($program->faculty === 'ساینس')
                                            <option  value="طب">طب</option>
                                            <option  value="انجنیري">انجنیري</option>
                                            <option   value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                            <option  value="حقوق">حقوق</option>
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            <option  value="ژورنالیزم">ژورنالیزم</option>
                                            <option  value="اقتصاد">اقتصاد</option>
                                            <option   value="زراعت">زراعت</option>
                                            <option   value="شرعیات">شرعیات</option>
                                            <option  value="ادبیات">ادبیات</option>
                                            <option  selected value="ساینس">ساینس</option>                                    
                                            <option  value="تعلیم او تربیه">تعلیم او تربیه</option>                                   
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            @elseif($program->faculty === 'تعلیم او تربیه')
                                            <option  value="طب">طب</option>
                                            <option  value="انجنیري">انجنیري</option>
                                            <option   value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                            <option  value="حقوق">حقوق</option>
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            <option  value="ژورنالیزم">ژورنالیزم</option>
                                            <option  value="اقتصاد">اقتصاد</option>
                                            <option   value="زراعت">زراعت</option>
                                            <option   value="شرعیات">شرعیات</option>
                                            <option  value="ادبیات">ادبیات</option>
                                            <option   value="ساینس">ساینس</option>                                   
                                            <option  selected value="تعلیم او تربیه">تعلیم او تربیه</option>                                    
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            @else
                                            <option  value="طب">طب</option>
                                            <option  value="انجنیري">انجنیري</option>
                                            <option   value="کمپیوټر ساینس">کمپیوټر ساینس</option>
                                            <option  value="حقوق">حقوق</option>
                                            <option  value="اداره ئې عامه">اداره ئې عامه</option>
                                            <option  value="ژورنالیزم">ژورنالیزم</option>
                                            <option  value="اقتصاد">اقتصاد</option>
                                            <option   value="زراعت">زراعت</option>
                                            <option   value="شرعیات">شرعیات</option>
                                            <option  value="ادبیات">ادبیات</option>
                                            <option   value="ساینس">ساینس</option>                                   
                                            <option   value="تعلیم او تربیه">تعلیم او تربیه</option>                                    
                                            <option  selected value="اداره ئې عامه">اداره ئې عامه</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="">د استاد دیپارټمنټ</label>
                                        <input class="form-control" type="text" name="department" value="{{$program->department}}">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د استاد اوسنی علمي رتبه</label>
                                        <select class="custom-select"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="current_educational_position">
                                            <option ></option>
                                            @if($program->current_educational_position === 'پوهیالی')
                                            <option selected value="پوهیالی">پوهیالی</option>
                                            <option  value="پوهنیار">پوهنیار</option>
                                            <option  value="پوهنمل">پوهنمل</option>
                                            <option  value="پوهاند">پوهاند</option>
                                            @elseif($program->current_educational_position === 'پوهنیار')
                                            <option  value="پوهیالی">پوهیالی</option>
                                            <option  selected dvalue="پوهنیار">پوهنیار</option>
                                            <option  value="پوهنمل">پوهنمل</option>
                                            <option  value="پوهاند">پوهاند</option>
                                            @elseif($program->current_educational_position === 'پوهنمل')
                                            <option  value="پوهیالی">پوهیالی</option>
                                            <option   value="پوهنیار">پوهنیار</option>
                                            <option  selected value="پوهنمل">پوهنمل</option>
                                            <option  value="پوهاند">پوهاند</option>
                                            @else
                                            <option  value="پوهیالی">پوهیالی</option>
                                            <option  value="پوهنیار">پوهنیار</option>
                                            <option  value="پوهنمل">پوهنمل</option>
                                            <option  selected value="پوهاند">پوهاند</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د استاد ترلاسه کېدونکې علمي رتبه</label>
                                        <select class="custom-select"
                                        style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="achieving_educational_position">
                                        <option ></option>
                                        @if($program->achieving_educational_position === 'پوهیالی')
                                        <option selected value="پوهیالی">پوهیالی</option>
                                        <option  value="پوهنیار">پوهنیار</option>
                                        <option  value="پوهنمل">پوهنمل</option>
                                        <option  value="پوهاند">پوهاند</option>
                                        @elseif($program->achieving_educational_position === 'پوهنیار')
                                        <option  value="پوهیالی">پوهیالی</option>
                                        <option  selected value="پوهنیار">پوهنیار</option>
                                        <option  value="پوهنمل">پوهنمل</option>
                                        <option  value="پوهاند">پوهاند</option>
                                        @elseif($program->achieving_educational_position === 'پوهنمل')
                                        <option  value="پوهیالی">پوهیالی</option>
                                        <option   value="پوهنیار">پوهنیار</option>
                                        <option  selected value="پوهنمل">پوهنمل</option>
                                        <option  value="پوهاند">پوهاند</option>
                                        @else
                                        <option  value="پوهیالی">پوهیالی</option>
                                        <option  value="پوهنیار">پوهنیار</option>
                                        <option  value="پوهنمل">پوهنمل</option>
                                        <option  selected value="پوهاند">پوهاند</option>
                                        @endif
                                        </select>										
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="">د غونډي د ګډونوالو شمېر</label>
                                        <input class="form-control" type="number" name="participant_amount" value="{{$program->participant_amount}}">
                                    </div>
                                </div>
                                <!-- <h3 class="col-md-12 m-auto">د پروګرام ادرس</h3> -->
                            </div>
                            
                        
                            <hr !important>

                            <div class="row my-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>د پروګرام د رامنځته کولو ساحه</label>
                                        <input placeholder="" class="form-control" type="text" name="campus_name" value="{{$program->campus_name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>د پروګرام د رامنځته کولو تعمیر نوم</label>
                                        <input placeholder="" class="form-control" type="text" name="block_name" value="{{$program->block_name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>د پروګرام د رامنځته کولو د ودانۍ شمېره</label>
                                        <input placeholder="" class="form-control" type="number" name="block_number" value="{{$program->block_number}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>د پروګرام د اطاق نمبر</label>
                                        <input placeholder="" class="form-control" type="number" name="room_number" value="{{$program->room_number}}">
                                    </div>
                                </div>
                            </div>
                            <hr !important>
                            <div class="row my-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>نېټه</label>
                                            <input placeholder="" class="form-control" type="datetime-local" name="date" value="{{$program->date}}">
                                        </div>
                                    </div>
                                   
                            </div>
                        

                        

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
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
       
	<script>
        console.log($('#for').css('margin-right'));
		$( "#toggle_btn" ).click(function() {
            if($('#for').css('width') == '1000px' && $('#for').css('margin-right') == '200px')
            {
                console.log("alkfjlakfd");
                $("#for").css("width", "1200px");
                $("#for").css("margin-right", "0px");
            }
            else{
                console.log("else");
                $("#for").css("width", "1000px");
                $("#for").css("margin-right", "200px");
            }
        });
	</script>
@endsection