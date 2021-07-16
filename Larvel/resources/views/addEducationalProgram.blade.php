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

				<div class="account-box" style="width: 1200px; margin-top: 75px; margin-right:70px;" id="for">
					<div class="account-wrapper mt-3" style="">
						<h3 class="account-title mb-5">د تقرر/علمي رتبې پروګرام ثبت کړی</h3>
						<!-- <p class="account-subtitle"></p> -->
                        <hr !important>

						<!-- Account Form -->
			<form action="/educationalProgramList" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د علمي کنفرانفس/ سیمینار موضوع</label>
                                <input class="form-control" type="text" name="topic">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د تقرري/ علمي ترفېع ډول</label>
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="type">
                                    <option></option>
                                    <option value="علمي ترفېع">علمي ترفېع</option>
                                    <option value="ارتقاء">ارتقاء</option>
                                    <option value="تقرر">تقرر</option>
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
                                <input class="form-control" type="text" name="teacher_name">
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د استاد تخلص</label>
                                <!-- <div class="cal-icon"> -->
                                <input class="form-control" type="text" name="teacher_last_name">
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>د استاد تخلص پلار نوم</label>
                                <!-- <div class="cal-icon"> -->
                                <input class="form-control" type="text" name="father_name">
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
                                    <option selected=""></option>
                                    <option value="کندهار پوهنتون">کندهار پوهنتون</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د استاد پوهنځۍ </label>
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="faculty">
                                    <option selected=""></option>
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
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr !important>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="">د استاد دیپارټمنټ</label>
                                <input class="form-control" type="text" name="department">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د استاد اوسنی علمي رتبه</label>
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="current_educational_position">
                                    <option selected=""></option>
                                    <option value="پوهیالی">پوهیالی</option>
                                    <option value="پوهنیار">پوهنیار</option>
                                    <option value="پوهنمل">پوهنمل</option>
                                    <option value="پوهاند">پوهاند</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>د استاد ترلاسه کېدونکې علمي رتبه</label>
                                <select class="custom-select"
                                style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="achieving_educational_position">
                                <option selected=""></option>
                                    <option value="پوهیالی">پوهیالی</option>
                                    <option value="پوهنیار">پوهنیار</option>
                                    <option value="پوهنمل">پوهنمل</option>
                                    <option value="پوهاند">پوهاند</option>
                                </select>										
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="">د غونډي د ګډونوالو شمېر</label>
                                <input class="form-control" type="number" name="participant_amount">
                            </div>
                        </div>
                        <!-- <h3 class="col-md-12 m-auto">د پروګرام ادرس</h3> -->
                    </div>
                    
                
                    <hr !important>

                    <div class="row my-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو ساحه</label>
                                <input placeholder="" class="form-control" type="text" name="campus_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو تعمیر نوم</label>
                                <input placeholder="" class="form-control" type="text" name="block_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو د ودانۍ شمېره</label>
                                <input placeholder="" class="form-control" type="number" name="block_number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د اطاق نمبر</label>
                                <input placeholder="" class="form-control" type="number" name="room_number">
                            </div>
                        </div>
                    </div>
                    <hr !important>
                    <div class="row my-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پېل کېدو کېدو کال</label>
                                <input placeholder="" class="form-control" type="number" name="year">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پېل کېدو کېدو میاشت</label>
                                <input placeholder="" class="form-control" type="number" name="month">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پېل کېدو کېدو  ورځ</label>
                                <input placeholder="" class="form-control" type="number" name="start_day">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>دشروع کېدو وخت</label>
                                <input placeholder="" class="form-control" type="time" name="start_time">
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
            if($('#for').css('width') === '1200px' && $('#for').css('margin-right') === '70px')
            {
                console.log("alkfjlakfd");
                $("#for").css("width", "1200px");
                $("#for").css("margin-right", "0px");
            }
            else{
                $("#for").css("width", "1200px");
                $("#for").css("margin-right", "70px");
            }
        });
	</script>
@endsection