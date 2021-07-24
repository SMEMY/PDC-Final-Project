@extends('master.master')



<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
hahahaha
@endsection





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


@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">د مقرریو او علمي ترفېعاتو پاڼه</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">آدمېن پاڼه</a></li>
                    <li class="breadcrumb-item active">علمي تقرریاني</li>
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
                <input type="text" class="form-control floating" name="search_topic">
                <label class="focus-label">د علمي کنفرانفس/ سیمینار موضوع</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-5">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" name="search_type">
                <label class="focus-label">د تقرري/ علمي ترفېع ډول</label>
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
                                <label>د علمي کنفرانفس/ سیمینار موضوع</label>
                                <input class="form-control" type="text" name="topic">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د تقرري/ علمي ترفېع ډول</label>
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="type">
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
                    </div>
                    <hr !important>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>د استاد پوهنتون</label>
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="university">
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
                                <label>د استاد پوهنځۍ </label>
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="faculty">
                                    <option selected="">تسهیلونکی انتخاب کړی</option>
                                    <option value="1">سید احمد محبوبي</option>
                                    <option value="2">محمد یاسر مجاهد</option>
                                    <option value="3">عبدالواحد وثیق</option>
                                    <option value="3">میرام ګل</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr !important>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="">د استاد څانکه</label>
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="department">
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
                                <label>د استاد اوسنی علمي رتبه</label>
                                <select class="custom-select"
                                    style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="current_educational_position">
                                    <option selected="">تسهیلونکی انتخاب کړی</option>
                                    <option value="1">سید احمد محبوبي</option>
                                    <option value="2">محمد یاسر مجاهد</option>
                                    <option value="3">عبدالواحد وثیق</option>
                                    <option value="3">میرام ګل</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>د استاد ترلاسه کېدونکې علمي رتبه</label>
                                <select class="custom-select"
                                style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="achieving_educational_position">
                                    <option selected="">تسهیلونکی انتخاب کړی</option>
                                    <option value="1">سید احمد محبوبي</option>
                                    <option value="2">محمد یاسر مجاهد</option>
                                    <option value="3">عبدالواحد وثیق</option>
                                    <option value="3">میرام ګل</option>
                                </select>										
                            </div>
                        </div>
                        <!-- <h3 class="col-md-12 m-auto">د پروګرام ادرس</h3> -->
                    </div>
                    
                
                    <hr !important>

                    <div class="row my-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو ساحه</label>
                                <input placeholder="" class="form-control" type="text" name="campus">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو تعمیر نوم</label>
                                <input placeholder="" class="form-control" type="text" name="building">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>د پروګرام د اطاق نمبر</label>
                                <input placeholder="" class="form-control" type="number" name="room_number">
                            </div>
                        </div>
                    </div>
                    <hr !important>
                    <div class="row my-5">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>د پېل کېدو نېټه</label>
                                <input placeholder="" class="form-control" type="date" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>دشروع کېدو وخت</label>
                                <input placeholder="" class="form-control" type="time" name="start_time">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>د ختمېدو وخت</label>
                                <input placeholder="" class="form-control" type="time" name="end_time">
                            </div>
                        </div>
                    </div>
                    <hr !important>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>د پروګرام د ګدون والو شمېر</label>
                                <input placeholder="" class="form-control" type="number" name="participant_amount">
                            </div>
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

