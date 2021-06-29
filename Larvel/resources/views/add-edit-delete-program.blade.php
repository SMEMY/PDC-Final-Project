@extends('master.master')

<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
hahahaha
@endsection
<!-- here we add css custom style -->
@section('custom-css')
label {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
		}

		select:focus {
			box-shadow: 0px 0px 15px #c7f5ff;
		}

		input:focus {
			box-shadow: 0px 0px 15px #c7f5ff !important;
		}
        input {
			background: #f0fcff !important;
		}
@endsection

<!-- here we add dynamic content -->
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">پروګرامونه</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">آدمېن پاڼه</a></li>
                    <li class="breadcrumb-item active">پروګرامونه</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn px-4" data-toggle="modal" data-target="#create_project"><i
                        class="fa fa-plus"></i>پروګرام ثبت کړی</a>
                <div class="view-icons">
                    <a href="projects.html" class="grid-view btn btn-link active"><i
                            class="fa fa-th"></i></a>
                    <a href="project-list.html" class="list-view btn btn-link"><i
                            class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <!-- Search Filter -->
    <div class="row filter-row">
        <div class="col-sm-6 col-md-5">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating">
                <label class="focus-label">د پروګرام نوم</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-5">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating">
                <label class="focus-label">د پروګرام ایډي</label>
            </div>
        </div>

        <div class="col-sm-6 col-md-2">
            <a href="#" class="btn btn-success btn-block p-0 pt-2" style="font-size: 25px;">پلټنه </a>
        </div>
    </div>
    <!-- Search Filter -->

    <div class="row">
        <div class="col-md-6">
            <a class="job-list" href="program_details.html">
                <div class="job-list-det">
                    <div class="job-list-desc">
                        <h3 class="job-list-title">د HLMS په اړه لارښونه </h3>
                        <br>
                        <h4 class="job-department "><strong>د پروګرام ډول: </strong>ورکشاپ</h4>
                        <h4 class="job-department mt-4"><strong>د پروګرام تسهیلونکی: </strong>محمدد یاسر
                            مجاهد</h4>
                        <p class="text-muted mt-4"><strong>معلومات: </strong> موږ باید د HLMS څڅخه د وطن د
                            پرمختګ لپاره ګټه وانخسیدس مسیببا شسبمشتنبی شبانش بش بشسنتسب شمب شمسب بخثخهبر
                            رشمحش رندرثقب شس مشس
                        </p>
                    </div>
                    <div class="job-type-info">
                        <span class="job-types">نور معلومات</span>
                    </div>
                </div>
                <div class="job-list-footer">
                    <ul>
                        <li class="mb-2 ml-3"><i class="fa fa-map-signs"></i> <strong>ادرس: </strong>کندهار
                            پوهنتون
                        </li>
                        <li class="mb-2 ml-3"><i class="fa fa-money"></i> <strong>د پروګرام فیس: </strong>
                            500
                            افغانۍ</li>
                        <li class="mb-2 ml-3"><i class="fa fa-clock-o"></i> <strong>د پروګرام دوام:
                            </strong> درې
                            ورخي</li>
                    </ul>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a class="job-list" href="program_details.html">
                <div class="job-list-det">
                    <div class="job-list-desc">
                        <h3 class="job-list-title">د HLMS په اړه لارښونه </h3>
                        <br>
                        <h4 class="job-department "><strong>د پروګرام ډول: </strong>ورکشاپ</h4>
                        <h4 class="job-department mt-4"><strong>د پروګرام تسهیلونکی: </strong>محمدد یاسر
                            مجاهد</h4>
                        <p class="text-muted mt-4"><strong>معلومات: </strong> موږ باید د HLMS څڅخه د وطن د
                            پرمختګ لپاره ګټه وانخسیدس مسیببا شسبمشتنبی شبانش بش بشسنتسب شمب شمسب بخثخهبر
                            رشمحش رندرثقب شس مشس
                        </p>
                    </div>
                    <div class="job-type-info">
                        <span class="job-types">نور معلومات</span>
                    </div>
                </div>
                <div class="job-list-footer">
                    <ul>
                        <li class="mb-2 ml-3"><i class="fa fa-map-signs"></i> <strong>ادرس: </strong>کندهار
                            پوهنتون
                        </li>
                        <li class="mb-2 ml-3"><i class="fa fa-money"></i> <strong>د پروګرام فیس: </strong>
                            500
                            افغانۍ</li>
                        <li class="mb-2 ml-3"><i class="fa fa-clock-o"></i> <strong>د پروګرام دوام:
                            </strong> درې
                            ورخي</li>
                    </ul>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a class="job-list" href="program_details.html">
                <div class="job-list-det">
                    <div class="job-list-desc">
                        <h3 class="job-list-title">د HLMS په اړه لارښونه </h3>
                        <br>
                        <h4 class="job-department "><strong>د پروګرام ډول: </strong>ورکشاپ</h4>
                        <h4 class="job-department mt-4"><strong>د پروګرام تسهیلونکی: </strong>محمدد یاسر
                            مجاهد</h4>
                        <p class="text-muted mt-4"><strong>معلومات: </strong> موږ باید د HLMS څڅخه د وطن د
                            پرمختګ لپاره ګټه وانخسیدس مسیببا شسبمشتنبی شبانش بش بشسنتسب شمب شمسب بخثخهبر
                            رشمحش رندرثقب شس مشس
                        </p>
                    </div>
                    <div class="job-type-info">
                        <span class="job-types">نور معلومات</span>
                    </div>
                </div>
                <div class="job-list-footer">
                    <ul>
                        <li class="mb-2 ml-3"><i class="fa fa-map-signs"></i> <strong>ادرس: </strong>کندهار
                            پوهنتون
                        </li>
                        <li class="mb-2 ml-3"><i class="fa fa-money"></i> <strong>د پروګرام فیس: </strong>
                            500
                            افغانۍ</li>
                        <li class="mb-2 ml-3"><i class="fa fa-clock-o"></i> <strong>د پروګرام دوام:
                            </strong> درې
                            ورخي</li>
                    </ul>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a class="job-list" href="program_details.html">
                <div class="job-list-det">
                    <div class="job-list-desc">
                        <h3 class="job-list-title">د HLMS په اړه لارښونه </h3>
                        <br>
                        <h4 class="job-department "><strong>د پروګرام ډول: </strong>ورکشاپ</h4>
                        <h4 class="job-department mt-4"><strong>د پروګرام تسهیلونکی: </strong>محمدد یاسر
                            مجاهد</h4>
                        <p class="text-muted mt-4"><strong>معلومات: </strong> موږ باید د HLMS څڅخه د وطن د
                            پرمختګ لپاره ګټه وانخسیدس مسیببا شسبمشتنبی شبانش بش بشسنتسب شمب شمسب بخثخهبر
                            رشمحش رندرثقب شس مشس
                        </p>
                    </div>
                    <div class="job-type-info">
                        <span class="job-types">نور معلومات</span>
                    </div>
                </div>
                <div class="job-list-footer">
                    <ul>
                        <li class="mb-2 ml-3"><i class="fa fa-map-signs"></i> <strong>ادرس: </strong>کندهار
                            پوهنتون
                        </li>
                        <li class="mb-2 ml-3"><i class="fa fa-money"></i> <strong>د پروګرام فیس: </strong>
                            500
                            افغانۍ</li>
                        <li class="mb-2 ml-3"><i class="fa fa-clock-o"></i> <strong>د پروګرام دوام:
                            </strong> درې
                            ورخي</li>
                    </ul>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a class="job-list" href="program_details.html">
                <div class="job-list-det">
                    <div class="job-list-desc">
                        <h3 class="job-list-title">د HLMS په اړه لارښونه </h3>
                        <br>
                        <h4 class="job-department "><strong>د پروګرام ډول: </strong>ورکشاپ</h4>
                        <h4 class="job-department mt-4"><strong>د پروګرام تسهیلونکی: </strong>محمدد یاسر
                            مجاهد</h4>
                        <p class="text-muted mt-4"><strong>معلومات: </strong> موږ باید د HLMS څڅخه د وطن د
                            پرمختګ لپاره ګټه وانخسیدس مسیببا شسبمشتنبی شبانش بش بشسنتسب شمب شمسب بخثخهبر
                            رشمحش رندرثقب شس مشس
                        </p>
                    </div>
                    <div class="job-type-info">
                        <span class="job-types">نور معلومات</span>
                    </div>
                </div>
                <div class="job-list-footer">
                    <ul>
                        <li class="mb-2 ml-3"><i class="fa fa-map-signs"></i> <strong>ادرس: </strong>کندهار
                            پوهنتون
                        </li>
                        <li class="mb-2 ml-3"><i class="fa fa-money"></i> <strong>د پروګرام فیس: </strong>
                            500
                            افغانۍ</li>
                        <li class="mb-2 ml-3"><i class="fa fa-clock-o"></i> <strong>د پروګرام دوام:
                            </strong> درې
                            ورخي</li>
                    </ul>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /Page Content -->

<!-- Create Project Modal -->
<div id="create_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content style=" width: 1000px !important;"">
            <div class="modal-header">
                <h5 class="modal-title">پروګرام ثبت کړی</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د پروګرام نوم</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د پروګرام ډول</label>
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;">
                                    <option>ورکشاپ</option>
                                    <option>سیمینار</option>
                                    <option>سمفوزیم</option>
                                    <option>کنفرانس</option>
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
                                <input class="form-control" type="text">
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د پروګرام حمایه کوونکی</label>
                                <!-- <div class="cal-icon"> -->
                                <input class="form-control" type="text">
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <hr !important>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د پروګرام تنظیمونکی</label>
                                <input placeholder="" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د پروګرام </label>
                                <input placeholder="" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <hr !important>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="">د پروګرام تسهیلونک</label>
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;">
                                    <option selected="">تسهیلونکی انتخاب کړی</option>
                                    <option value="1">سید احمد محبوبي</option>
                                    <option value="2">محمد یاسر مجاهد</option>
                                    <option value="3">عبدالواحد وثیق</option>
                                    <option value="3">میرام ګل</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د پروګرام د ګډون والو کچه</label>
                                <input placeholder="" class="form-control" type="number">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>د پروګرام یودیجه</label>
                                <input placeholder="$" class="form-control" type="number">
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
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;">
                                    <option selected>مبلغ</option>
                                    <option value="0">یا</option>
                                    <option value="1">هو</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <hr !important>

                    <div class="row">
                        <div class="form-group col-md-12" id="facilities">
                            <div class="form-group">
                                <label>د پروګرام سهولتونه</label>
                                <input placeholder="1" class="form-control" type="text">
                            </div>

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
                            <div class="form-group">
                                <label>د پروګرام اجنډا</label>
                                <input placeholder="1" class="form-control" type="text">
                            </div>

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

                    <div class="row my-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو ساحه</label>
                                <input placeholder="" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو تعمیر نوم</label>
                                <input placeholder="" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>د پروګرام د اطاق نمبر</label>
                                <input placeholder="" class="form-control" type="number">
                            </div>
                        </div>
                    </div>
                    <hr !important>
                    <div class="row my-5">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>د پېل کېدو نېټه</label>
                                <input placeholder="" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>دشروع کېدو وخت</label>
                                <input placeholder="" class="form-control" type="time">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>د ختمېدو وخت</label>
                                <input placeholder="" class="form-control" type="time">
                            </div>
                        </div>
                    </div>
                    <hr !important>
                    <div class="row " id="files">
                        <!-- <div class="form-group col-12" id="files"> -->
                        <!-- <div class="form-group col-md-12"> -->
                        <div class=" col-md-6">
                            <div class="form-group custom-file ">
                                <input type="file" class="custom-file-input" id="customFile" name="filename"
                                    onchange="nameShow(this)">
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
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->


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
                                aria-label="With textarea"></textarea>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Create Project Modal -->



<!-- Delete Project Modal -->
<div class="modal custom-modal fade" id="delete_project" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Project</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal"
                                class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Project Modal -->

</div>
<!-- /Page Wrapper -->
@endsection

@section('cutom-js')
<script>
		var count = 2;
		function afterText() {
			var txt1 =
				`
				<div class="form-group">
										
										<input placeholder="${count}" class="form-control" type="text">
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
										
										<input placeholder="${count1}" class="form-control" type="text">
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
			console.log(typeof state);
			if ((state === "1") && s === true) {
				$("#fee").removeClass('d-block');
				var txt1 =
					`<div class="col-md-12" id="temp">
						<div class="form-group">
							<label>دپروګرام د داخلېدو مبلغ</label>
											<input placeholder="$" class="form-control" type="number">

						</div>
					</div>`;

				$("#rank").after(txt1);
				s = false;
			}
			else if (state === "0" && s === false) {
				$("#temp").remove();
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

	</script>

    @endsection