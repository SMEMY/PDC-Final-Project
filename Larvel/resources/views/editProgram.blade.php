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
						<h3 class="account-title mb-5">پروګرام ثبت کړی</h3>
						<!-- <p class="account-subtitle"></p> -->
<hr !important>
						<!-- Account Form -->
						<form action="/pdcProgramList" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د پروګرام نوم</label>
                                <input class="form-control" type="text" name="name" value="{{$program[0]->name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د پروګرام ډول</label>
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="type">
                                    <option ></option>
                                    
                                    @if($program[0]->type === 'ورکشاپ')
                                        <option selected value="ورکشاپ">ورکشاپ</option>
                                    @elseif($program[0]->type === 'سیمینار')
                                        <option selected value="سیمینار">سیمینار</option>
                                    @elseif($program[0]->type === 'سمفوزیم')
                                        <option selected value="سمفوزیم">سمفوزیم</option>
                                    @else 
                                        <option selected value="کنفرانس">کنفرانس</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr !important>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د پروګرام سپانسر</label>
                                <!-- <div class="cal-icon"> -->
                                <input class="form-control" type="text" name="sponsor" value="{{$program[0]->sponsor}}">
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د پروګرام حمایه کوونکی</label>
                                <!-- <div class="cal-icon"> -->
                                <input class="form-control" type="text" name="supporter" value="{{$program[0]->supporter}}">
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د پروګرام تنظیمونکی</label>
                                <input placeholder="" class="form-control" type="text" name="manager" value="{{$program[0]->manager}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="">د پروګرام تسهیلونک</label>
                                <input placeholder="" class="form-control" type="text" name="facilitator" value="{{$program[0]->facilitator}}">

                            </div>
                        </div>
                       
                    </div>
                    <hr !important>

                    <div class="row">
             
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>د پروګرام د ګډون والو کچه</label>
                                <input placeholder="" class="form-control" type="number" name="participant_amount" value="{{$program[0]->participant_amount}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>د پروګرام یودیجه</label>
                                <input placeholder="$" class="form-control" type="number" name="fund" value="{{$program[0]->fund}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>د پروګرام یودیجه پولي واحد</label>
                                <select class="custom-select rankS"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="fund_type" value="{{$program[0]->fund_type}}">
                                    <option selected></option>
                                    @if($program[0]->fund_type == 'افغانۍ')
                                    <option selected value="افغانۍ">افغانۍ</option>
                                    @else
                                    <option selected value="ډالر">ډالر</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <!-- <h3 class="col-md-12 m-auto">د پروګرام ادرس</h3> -->
                    </div>
                    <hr !important>
                    <div class="row">
                        <div class="col-md-12" id="rank">
                            <div class="form-group">
                                <label class="col-form-label">آیا پروګرام د فیس درلودونکی دی؟<span
                                        class="text-danger">*</span></label>
                                <select class="custom-select rankS"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="fee_able">
                                    <option selected></option>
                                    @if($program[0]->fee_able == 1)
                                    <option selected value="1">هو</option>
                                    @else
                                    <option selected value="0">یا</option>
                                    @endif
                                </select>

                            </div>
                        </div>
                        @if($program[0]->fee_able == 1)
                        <div class="col-md-12" id="fee">
                            <div class="form-group">
                                <label class="col-form-label">د پروګرام فیس<span
                                        class="text-danger">*</span></label>
                                        <input placeholder="$" class="form-control" type="number" name="fee" value="{{$program[0]->fee}}">


                            </div>
                        </div>
                        @endif
                        @if($program[0]->fee_able == 1)
                        <div class="col-md-12" id="fee_type">
                            <div class="form-group">
                                <label class="col-form-label">د پروګرام د فیس پولي واحد<span
                                        class="text-danger">*</span></label>
                                <select class="custom-select rankS"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="fee_type">
                                    <option selected></option>
                                    @if($program[0]->fee_type == 'افغانۍ')
                                    <option selected value="افغانۍ">افغانۍ</option>
                                    @else
                                    <option selected value="ډالر">ډالر</option>
                                    @endif
                                </select>

                            </div>
                        </div>
                        @endif
                    </div>
                    <hr !important>
                    <div class="row my-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو ساحه</label>
                                <input placeholder="" class="form-control" type="text" name="campus_name" value="{{$program[0]->campus_name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو تعمیر نوم</label>
                                <input placeholder="" class="form-control" type="text" name="block_name" value="{{$program[0]->block_name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو تعمیر نمبر</label>
                                <input placeholder="" class="form-control" type="text" name="block_number" value="{{$program[0]->block_number}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د اطاق نمبر</label>
                                <input placeholder="" class="form-control" type="number" name="room_number" value="{{$program[0]->room_number}}">
                            </div>
                        </div>
                    </div>
                    <hr !important>
                    <div class="row my-5">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>د پېل کېدو کال</label>
                                <input placeholder="" class="form-control" type="number" name="year" value="{{$program[0]->year}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>د پېل کېدو میاشت</label>
                                <input placeholder="" class="form-control" type="number" name="month" value="{{$program[0]->month}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>د پېل کېدو ورځ</label>
                                <input placeholder="" class="form-control" type="number" name="start_day" value="{{$program[0]->start_day}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>د ختم کېدو ورځ</label>
                                <input placeholder="" class="form-control" type="number" name="end_day" value="{{$program[0]->end_day}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>دشروع کېدو ساعت</label>
                                <input placeholder="" class="form-control" type="time" name="start_time" value="{{$program[0]->start_time}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>د ختم کېدو ساعت</label>
                                <input placeholder="" class="form-control" type="time" name="end_time" value="{{$program[0]->end_time}}">
                            </div>
                        </div>
                    </div>
                    <hr !important>

                    <div class="row">
                        <div class="form-group col-md-12" id="facilities">
                            @foreach( $program[0]->getFacilities as $facility )
                            <div class="form-group">
                                <label>د پروګرام سهولتونه</label>
                                <input placeholder="1" class="form-control" type="text" name="facility{{$facility->id}}" value="{{$facility->facility}}">
                            </div>

                            @endforeach
                        </div>
                        <div class="form-group m-auto" id="ad">
                            <button type="button" id="times"
                                class="btn btn-info mx-auto rounded-circle d-none" style="font-size: 20px;"
                                onclick="rmv()">&times;</button>
                            <button type="button" class="btn btn-info mx-auto rounded-circle"
                                style="font-size: 20px;;" onclick="afterText()">&plus;</button>
                            <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                        </div>
                    </div>
                    <hr !important>

                    <div class="row mt-5">
                        <div class="form-group col-md-12" id="agendas">
                        @foreach( $program[0]->getAgendas as $agenda )

                            <div class="form-group">
                                <label>د پروګرام اجنډا</label>
                                <input placeholder="1" class="form-control" type="text" name="agenda{{ $agenda->id }}" value="{{$agenda->agenda}}">
                            </div>
                        @endforeach
                        </div>
                        <div class="form-group m-auto">
                            <button type="button" id="remove-agenda"
                                class="btn btn-info mx-auto rounded-circle d-none" style="font-size: 20px;"
                                onclick="removeAgenda()">&times;</button>
                            <button type="button" class="btn btn-info mx-auto rounded-circle"
                                style="font-size: 20px;;" onclick="addAgenda()">&plus;</button>
                            <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                        </div>
                    </div>
                    <hr !important>

                  
                    <hr !important>
                    <div class="row " id="files">
                        <div class=" col-md-6">
                            <div class="form-group custom-file ">
                                <input type="file" class="custom-file-input" id="customFile" name="filename"
                                    onchange="nameShow(this)" name="file_path">
                                <label class="custom-file-label" for="customFile">د پروګرام اړونده
                                    فایل
                                    انتخاب کړی</label>
                            </div>
                        </div>
                        <div class=" col-md-6 mb-3" id="">
                            <div class="form-group">
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="file_type">
                                    <option selected>د فایل ډول انتخاب کړی</option>
                                    <option value="0">پریشینټېشن</option>
                                    <option value="1">وډیو</option>
                                </select>

                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group m-auto ">
                            <button type="button" id="file-remover"
                                class="btn btn-info mx-auto rounded-circle d-none" style="font-size: 20px;"
                                onclick="removeFile()">&times;</button>
                            <button type="button" class="btn btn-info mx-auto rounded-circle"
                                style="font-size: 20px;;" onclick="addFile(), el()">&plus;</button>
                            <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text">د پروګرام په اړه معلومات</span>
                            </div>
                            <textarea class="form-control" style="height: 100px;"
                                aria-label="With textarea" name="program_description" value="{{$program[0]->program_description}}"></textarea>
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




@section('cutom-js')
	<script>
		$('#addProgram').addClass('active');
		var count = 2;
		function afterText() {
			var txt1 =
				`
				<div class="form-group">
										
										<input placeholder="${count}" class="form-control" type="text" name="facility${count}">
									</div>`;

			$("#facilities").children().last().after(txt1);
			$('#times').removeClass('d-none');
			count++;   // Insert new elements after img
		}
		function rmv() {

			if (count != 2) {
				$('#facilities').children().last().remove();
				count--;
			}
			if (count == 2) {
				$('#times').addClass('d-none');

			}

		}
		var count1 = 2;
		function addAgenda() {
			var txt1 =
				`
				<div class="form-group">
										
										<input placeholder="${count1}" class="form-control" type="text" name="agenda${count1}">
									</div>`;

			$("#agendas").children().last().after(txt1);
			$('#remove-agenda').removeClass('d-none');
			count1++;   // Insert new elements after img
		}
		function removeAgenda() {

			if (count1 != 2) {
				$('#agendas').children().last().remove();
				count1--;
			}
			if (count1 == 2) {
				$('#remove-agenda').addClass('d-none');

			}

		}

		var s = true;
		$("select.rankS").change(function () {
			var state = $(this).children("option:selected").val();
			// alert("You have selected the country - " + state);
			if (state === "1" && s === true) {
			console.log("hi");
				$("#fee").removeClass('d-none');
				$("#fee_type").removeClass('d-none');
				// var txt1 =
				// 	`<div class="col-md-12" id="temp">
				// 		<div class="form-group">
				// 			<label>دپروګرام د داخلېدو مبلغ</label>
				// 							<input placeholder="$" class="form-control" type="number" name="fee">

				// 		</div>
				// 	</div>`;

				// $("#rank").after(txt1);
				s = false;
			}
			else if (state === "0" && s === false) {
				$("#fee").addClass('d-none');
				$("#fee_type").addClass('d-none');

				// $("#temp").remove();
				s = true
			}

		});
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
		function addFile() {
			var txt1 =
				`	<div class=" col-md-6" >
												<div class="form-group custom-file ">
													<input type="file" class="custom-file-input" id="customFile"
														name="filename">
													<label class="custom-file-label" for="customFile">د پروګرام اړونده
														فایل
														انتخاب کړی</label>
												</div>
											</div>
											<div class=" col-md-6 mb-3" id="">
												<div class="form-group">
													<select class="custom-select"
														style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;">
														<option selected>د فایل ډول انتخاب کړی</option>
														<option value="0">پریشینټېشن</option>
														<option value="1">وډیو</option>
													</select>

												</div>
											</div>`;

			$("#files").children().last().after(txt1);
			$('#file-remover').removeClass('d-none');
			count4++;   // Insert new elements after img
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