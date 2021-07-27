@extends('master.master')
@section('custom-css')
label {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 23px !important;

	}
    #info span{
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
        button{
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
            max-height: 200px; !important;
            min-height: 44px; !important;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
		}
		#for{
			transition:all 0.3s;
		}
        #alertMassege{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }
        .swal-modal div{
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
                
            <!-- <div class="container text-center mt-5">
                <h1>auto hidding alert massage</h1>
                <button class="btn btn-primary" onclick="bootstrapAlert()">click here</button>
            </div>
                           -->
                
                <div class="account-box" style="width: 1100px; margin-top: 75px; margin-right:140px;" id="for">
					<div class="account-wrapper mt-3" style="">
                        <h3 class="account-title mb-5" style="font-size:35px !important; font-weight: bolder;">د مسلکي پرمختیائي مرکز پروګرام ثبت پاڼه</h3>
						<!-- <p class="account-subtitle"></p> -->
                        <hr !important>
						<!-- Account Form -->
                        
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
                        <form action="/pdcProgramList" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پروګرام نوم</label>
                                        <input class="form-control" type="text" name="name" value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام ډول</label>
                                        <select class="custom-select"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="type">
                                          
                                            @if(old('type') === 'ورکشاپ')
                                            <option ></option>
                                            <option selected value="ورکشاپ">ورکشاپ</option>
                                            <option value="سیمینار">سیمینار</option>
                                            <option value="سمفوزیم">سمفوزیم</option>
                                            <option value="کنفرانس">کنفرانس</option>
                                            @elseif(old('type') === 'سیمینار')
                                            <option ></option>
                                            <option value="ورکشاپ">ورکشاپ</option>
                                            <option selected value="سیمینار">سیمینار</option>
                                            <option value="سمفوزیم">سمفوزیم</option>
                                            <option value="کنفرانس">کنفرانس</option>
                                            @elseif(old('type') === 'سمفوزیم')
                                            <option ></option>
                                            <option value="ورکشاپ">ورکشاپ</option>
                                            <option value="سیمینار">سیمینار</option>
                                            <option selected value="سمفوزیم">سمفوزیم</option>
                                            <option value="کنفرانس">کنفرانس</option>
                                            @elseif(old('type') === 'کنفرانس')
                                            <option ></option>
                                            <option value="ورکشاپ">ورکشاپ</option>
                                            <option value="سیمینار">سیمینار</option>
                                            <option value="سمفوزیم">سمفوزیم</option>
                                            <option selected value="کنفرانس">کنفرانس</option>
                                            @else
                                            <option ></option>
                                            <option value="ورکشاپ">ورکشاپ</option>
                                            <option value="سیمینار">سیمینار</option>
                                            <option value="سمفوزیم">سمفوزیم</option>
                                            <option value="کنفرانس">کنفرانس</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پروګرام سپانسر</label>
                                        <!-- <div class="cal-icon"> -->
                                        <input class="form-control" type="text" name="sponsor" value="{{old('sponsor')}}">
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام حمایه کوونکی</label>
                                        <!-- <div class="cal-icon"> -->
                                        <input class="form-control" type="text" name="supporter" value="{{old('supporter')}}">
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام تنظیمونکی</label>
                                        <input placeholder="" class="form-control" type="text" name="manager" value="{{old('manager')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">د پروګرام تسهیلونکی</label>
                                        <input placeholder="" class="form-control" type="text" name="facilitator" value="{{old('facilitator')}}">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class=""><span class="text-danger">*</span> د پروګرام د معلوماتو شمېره</label>
                                        <input placeholder="" class="form-control" type="text" name="info_mobile_number" value="{{old('info_mobile_number')}}">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پروګرام د ګډون والو کچه</label>
                                        <input placeholder="" class="form-control" type="number" name="participant_amount" value="{{old('participant_amount')}}">
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">
                    
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span>د پروګرام یودیجه</label>
                                        <input placeholder="$" class="form-control" type="number" name="fund" value="{{old('fund')}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام یودیجه پولي واحد</label>
                                        <select class="custom-select rankS"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="fund_type">
                                            @if(old('fund_type') === 'افغانۍ')
                                            <option ></option>
                                            <option selected value="افغانۍ">افغانۍ</option>
                                            <option value="ډالر">ډالر</option>
                                            @elseif(old('fund_type') === 'ډالر')
                                            <option ></option>
                                            <option value="افغانۍ">افغانۍ</option>
                                            <option selected value="ډالر">ډالر</option>
                                            @else
                                            <option ></option>
                                            <option value="افغانۍ">افغانۍ</option>
                                            <option value="ډالر">ډالر</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <!-- <h3 class="col-md-12 m-auto">د پروګرام ادرس</h3> -->
                            </div>
                            <hr !important>
                            <div class="row">
                                <div class="col-md-12 rankS" >
                                    <div class="form-group">
                                        <label class="col-form-label"> <span class="text-danger">*</span> آیا پروګرام د فیس درلودونکی دی؟<span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select rankS"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="fee_able" id="rank">
                                            @if(old('fee_able') === '1')
                                            <option ></option>
                                            <option selected value="1">هو</option>
                                            <option value="0">یا</option>
                                            @elseif(old('fee_able') === '0')
                                            <option></option>
                                            <option value="1">هو</option>
                                            <option selected value="0">یا</option>
                                            @else
                                            <option></option>
                                            <option value="1">هو</option>
                                            <option value="0">یا</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6 d-none" id="fee">
                                    <div class="form-group">
                                        <label class="col-form-label"><span class="text-danger">*</span> د پروګرام فیس</label>
                                        <input placeholder="$" class="form-control" type="number" name="fee" value="{{old('fee')}}">
                                    </div>
                                </div>
                                <div class="col-md-6 d-none" id="fee_type">
                                    <div class="form-group">
                                        <label class="col-form-label"> <span class="text-danger">*</span> د پروګرام د فیس پولي واحد</label>
                                        <select class="custom-select rankS"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="fee_type">
                                            @if(old('fee_type') === 'افغانۍ')
                                            <option ></option>
                                            <option selected value="افغانۍ">افغانۍ</option>
                                            <option value="ډالر">ډالر</option>
                                            @elseif(old('fee_type') === 'ډالر')
                                            <option selected></option>
                                            <option value="افغانۍ">افغانۍ</option>
                                            <option selected value="ډالر">ډالر</option>
                                            @else
                                            <option selected></option>
                                            <option value="افغانۍ">افغانۍ</option>
                                            <option value="ډالر">ډالر</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <hr !important>
                            <div class="row my-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پروګرام د رامنځته کولو ساحه</label>
                                        <input placeholder="" class="form-control" type="text" name="campus_name" value="{{old('campus_name')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام د رامنځته کولو تعمیر نوم</label>
                                        <input placeholder="" class="form-control" type="text" name="block_name" value="{{old('block_name')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام د رامنځته کولو تعمیر نمبر</label>
                                        <input placeholder="" class="form-control" type="number" name="block_number" value="{{old('block_number')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پروګرام د اطاق نمبر</label>
                                        <input placeholder="" class="form-control" type="number" name="room_number" value="{{old('room_number')}}">
                                    </div>
                                </div>
                            </div>
                            <hr !important>
                            <div class="row my-5">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پېل کېدو کال</label>
                                        <input placeholder="" class="form-control" type="number" name="year" value="{{old('year')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پېل کېدو میاشت</label>
                                        <input placeholder="" class="form-control" type="number" name="month" value="{{old('month')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پېل کېدو ورځ</label>
                                        <input placeholder="" class="form-control" type="number" name="start_day" value="{{old('start_day')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د ختم کېدو ورځ</label>
                                        <input placeholder="" class="form-control" type="number" name="end_day" value="{{old('end_day')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span>د پروګرام د ورځو شمېر</label>
                                        <input placeholder="" class="form-control" type="number" name="days_duration" value="{{old('days_duration')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> دشروع کېدو ساعت</label>
                                        <input placeholder="" class="form-control" type="time" name="start_time" value="{{old('start_time')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style=""><span class="text-danger">*</span> د ختم کېدو ساعت</label>
                                        <input placeholder="" class="form-control" type="time" name="end_time" value="{{old('end_time')}}">
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <!-- <div class="row">
                                <div class="form-group col-md-12" id="facilities">
                                    <div class="form-group">
                                        <label>د پروګرام سهولتونه</label>
                                        <input placeholder="1" class="form-control" type="text" name="facility[0]" value="{{old('')}}">
                                    </div>

                                </div>
                                <div class="form-group m-auto" id="ad">
                                    <button type="button" id="times"
                                        class="btn btn-info mx-auto rounded-circle d-none" style="font-size: 20px;"
                                        onclick="rmv()">&times;</button>
                                    <button type="button" class="btn btn-info mx-auto rounded-circle"
                                        style="font-size: 20px;;" onclick="afterText()">&plus;</button>
                                </div>
                            </div>
                            <hr !important> -->

                            <!-- <div class="row mt-5">
                                <div class="form-group col-md-12" id="agendas">
                                    <div class="form-group">
                                        <label>د پروګرام اجنډا</label>
                                        <input placeholder="1" class="form-control" type="text" name="agenda[0]" value="{{old('')}}">
                                    </div>

                                </div>
                                <div class="form-group m-auto">
                                    <button type="button" id="remove-agenda"
                                        class="btn btn-info mx-auto rounded-circle d-none" style="font-size: 20px;"
                                        onclick="removeAgenda()">&times;</button>
                                    <button type="button" class="btn btn-info mx-auto rounded-circle"
                                        style="font-size: 20px;;" onclick="addAgenda()">&plus;</button>
                                </div>
                            </div>
                            <hr !important> -->



                            <div class="row mt-5">
                                <div class="input-group col-md-12">
                                    <div class="input-group-prepend" id="info">
                                      <span class="input-group-text"><span class="text-danger">*</span>  د پروګرام په اړه معلومات</span>
                                    </div>
                                    <textarea class="form-control" style="height: 100px;"
                                        aria-label="With textarea" name="program_description">{{old('program_description')}}</textarea>
                                </div>
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">پروګرام ثبت کړی</button>
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
        @if(Session::has('program_added'))
            <script>
            swal('ډېر ښه!',"{!! Session::get('program_added') !!}", "success", {
                button: "مننه",
            });
            </script>
        @endif
        
	    <script>
        function bootstrapAlert(){
            $('.bootstrap-growl').remove();

            $.bootstrapGrowl("this is success!", {
                type:"danger",
                offset: {from: "top", amount: 100},
                align: "center", 
                width: 600,
                delay: 3000,
                allow_dismiss: true,
                stackup_spacing: 20
            });
        }
		$('#addProgram').addClass('active');
	

		var s = true;
		$("select.rankS").change(function () {
			var state = $(this).children("option:selected").val();
			// alert("You have selected the country - " + state);
			if (state === "1") {
				$("#fee").removeClass('d-none');
				$("#fee_type").removeClass('d-none');
			}
			else if (state === "0") {
				$("#fee").addClass('d-none');
				$("#fee_type").addClass('d-none');
			}

		});
        console.log();
        if ($('#rank').children("option:selected").val() === "1") {
			$("#fee").removeClass('d-none');
			$("#fee_type").removeClass('d-none');
		}
		// function nameShow() {
		// 	console.log(this.value);
		// 	var fileName = $(this).val().split("\\").pop();
		// 	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		// }
		function el() {
			$(".custom-file-input").on("change", function () {
				var fileName = $(this).val().split("\\").pop();
				$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
			});
		}

		$(".custom-file-input").on("change", function () {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});

		var count4 = 2;
        var indexFile = 1;
		function addFile() {
			var txt1 =
				`	<div class=" col-md-6" >
												<div class="form-group custom-file ">
													<input type="file" class="custom-file-input" id="customFile"
														name="filename[${indexFile}]">
													<label class="custom-file-label" for="customFile">د پروګرام اړونده
														فایل
														انتخاب کړی</label>
												</div>
											</div>
											<div class=" col-md-6 mb-3" id="">
												<div class="form-group">
													<select class="custom-select"
														style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="filetype[${indexFile}]">
                                                        <option selected></option>
                                    <option value="پریشینټېشن">پریشینټېشن</option>
                                    <option value="وډیو">وډیو</option>
                                    <option value="آډیو">آډیو</option>
													</select>

												</div>
											</div>`;

			$("#files").children().last().after(txt1);
			$('#file-remover').removeClass('d-none');
			count4++;   // Insert new elements after img
            indexFile++;
		}
		function removeFile() {

			if (count4 != 2) {
				$('#files').children().last().remove();
				$('#files').children().last().remove();

				count4--;
			}
			if (count4 == 2) {
				$('#file-remover').addClass('d-none');

			}

		}


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