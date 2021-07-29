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
						<h3 class="account-title mb-5" style="font-size:35px !important; font-weight: bolder;">د مسلکي پرمختیائي مرکز پروګرام تسهيلونکی ثبت کړی</h3>
						<!-- <p class="account-subtitle"></p> -->
<hr !important>
						<!-- Account Form -->
						<form action="/{{$path}}List/{{$member->id}}" method="POST">
								{{ method_field('PUT') }}
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
								   @if($path === 'facilitatorProfileForProgram')
								   <input class="d-none" type="number" name="program_id" id="" value="{{$program_id[0]->program_id}}">
								   @endif
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">نوم <span class="text-danger">*</span></label>
											<input class="form-control " type="text" name="member_name" value="{{$member->name}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">تخلص</label>
											<input class="form-control " type="text" name="last_name" value="{{$member->last_name}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">ټلیفون شمېره<span
													class="text-danger">*</span></label>
											<input class="form-control" type="tel" pattern="[0-9]+" name="phone_number" value="{{$member->phone_number}}">
										</div>
									</div>
									<div class=" col-md-6">
										<div class="form-group">
											<label class="col-form-label">برېښنالیک<span
													class="text-danger">*</span></label>
											<input class="form-control" type="email" name="email" value="{{$member->email}}">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">جنسیت<span
													class="text-danger">*</span></label>
											<select class="custom-select" name="gender">
												<!-- <option selected="">جنسیت</option> -->
												<option ></option>
												@if($member->gender === 'نارینه')
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
											<input class="form-control " type="text" name="office_campus" value="{{$member->office_campus}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">کاري دفتر<span
													class="text-danger">*</span></label>
													<input class="form-control " type="text" name="office_building" value="{{$member->office_building}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">کاري شعبه</label>
											<input class="form-control" type="text" name="office_department" value="{{$member->office_department}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">کاري منصب<span
													class="text-danger">*</span></label>
											<select class="custom-select" name="office_position">
												<!-- <option selected="">جنسیت</option> -->
												<option ></option>
												@if($member->office_position === 'رئیس')
												<option selected value="رئیس">رئیس</option>
												<option value="مرستیال">مرستیال</option>
												<option value="ښوونکی">ښوونکی</option>
												<option value="اداري کارمند">اداري کارمند</option>
												@elseif($member->office_position === 'مرستیال')
												<option value="رئیس">رئیس</option>
												<option selected value="مرستیال">مرستیال</option>
												<option value="ښوونکی">ښوونکی</option>
												<option value="اداري کارمند">اداري کارمند</option>
												@elseif($member->office_position === 'ښوونکی')
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
											<label class="col-form-label"> کاري برخه<span class="text-danger">*</span></label>
											<select class="custom-select rankS" name="office_position_category">
												<option ></option>
												@if($member->office_position_category === 'اداري')
												<option selected value="اداري">اداري</option>
												<option value="تدریسي">تدریسي</option>
												<option value="اداري او تدریسي">اداري او تدریسي</option>
												@elseif($member->office_position_category === 'تدریسي')
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
									@if($member->educational_rank != null)
									<div class="col-md-12" id="temp1">
										<div class="form-group">
											<label class="col-form-label">علمي رتبه<span class="text-danger">*</span></label>
											<select class="form-control" name="educational_rank">
												<option></option>
												@if($member->educational_rank === 'پوهایالی')
												<option selected value="پوهایالی">پوهایالی</option>
												<option value="پوهنیار">پوهنیار</option>
												<option value="پوهنمل">پوهنمل</option>
												<option value="پوهاند">پوهاند</option>
												@elseif($member->educational_rank === 'پوهنیار')
												<option value="پوهایالی">پوهایالی</option>
												<option selected value="پوهنیار">پوهنیار</option>
												<option value="پوهنمل">پوهنمل</option>
												<option value="پوهاند">پوهاند</option>
												@elseif($member->educational_rank === 'پوهنمل')
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
								<!-- this part has been hidden just for DB member role -->

								<!-- <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">پاسورډ<span
													class="text-danger">*</span></label>
											<input class="form-control" type="password" name="password" value="{{$member->password}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">پاسورډ تائید کړی<span
													class="text-danger">*</span></label>
											<input class="form-control input-sm" type="password" name="password_confirmation" value="{{$member->password}}">
										</div>
									</div>
								</div> -->
							<hr !important>	<!-- this part has been hidden just for DB member role -->

							<div class="form-group text-center col-md-4 m-auto">
								<button class="btn btn-primary  account-btn col-md-12" type="submit">تسهیلونکی ثبت
									کړی</button>
							</div>
							<div class="account-footer my-5">
								<p>آیا تر مخه مو حساب کړی دی؟ <a href="login.html">لاګ ان</a></p>
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
		var s = true;
		$("select.rankS").change(function () {
			var state = $(this).children("option:selected").val();
			// alert("You have selected the country - " + state);
			console.log(typeof state);
			if ((state === "تدریسي" || state === "اداري او تدریسي") && s === true) {
				var txt1 =
					`<div class="col-md-12" id="temp">
						<div class="form-group">
							<label class="col-form-label">علمي رتبه<span class="text-danger">*</span></label>
								<select class="form-control" name="educational_rank">
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
				$("#temp1").remove();

				s = false;
			}
			else if (state === "اداري" && s === false) {
				$("#temp").remove();
				$("#temp1").remove();

				s = true
			}
			else{
				$("#temp1").remove();

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