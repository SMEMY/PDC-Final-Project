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
        h4 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			color: black !important;
			font-size: 16px !important;

		}
        p {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
		}
        li {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
		}
        h3 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 22px !important;

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
        input{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
		}

		#foot li{
            font-size:14px;
            background: #f3efef7a;
            padding:5px;
            border-radius:3px;
        }

        #program{
			transition:all 0.3s;

        }
        #program:hover{
            background: #d4f0ff !important;
            border: 1px solid blue;
			transition:all 0.3s;

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
				<a href="/admin/addEduProgram" class="btn add-btn px-4" ><i
                        class="fa fa-plus"></i>پروګرام ثبت کړی</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<!-- Search Filter -->
		@if(count($programs) !== 0)
					<form action="/admin/searchEducationalProgram" method="POST">
						{{ method_field('POST') }}
						{{ csrf_field() }}
						@if ($errors->any())
						<div class="row">
                            <div class="mb-3 col-md-12" id="alertMassege">
                                <ul style="list-style-type:none" class="p-0 m-0">
                                    @foreach ($errors->all() as $error)
                                    <li class="rounded p-2 m-1 alert alert-danger" >
                                        {{ $error }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
						</div>
                        @endif
						<div class="row filter-row mb-5" id="search_parts">
							<div class="col-sm-6 col-md-5" id="search_input">
								<div class="form-group form-focus">
									<input type="text" class="form-control floating disable" name="search_content" disabled id="searchInput">
									<label class="focus-label">علمي پروګرام وپلټئ</label>
								</div>
							</div>

							<div class="col-sm-6 col-md-5" id="search_content">
								<div class="form-group form-focus select-focus">
									<select class="custom-select p-2 h-100 searchInput" name="search_type">
										<option selected value="">د پلټني عنصر انتخاب کړی!</option>
										<option value="topic">د پروګرام موضوع</option>
										<option value="type">د پروګرام ډول</option>
										<option value="teacher_name">د استاد نوم</option>
										<option value="teacher_last_name">د استاد تخلص</option>
										<option value="university">د استاد پوهنتون</option>
										<option value="faculty">د استاد پوهنځۍ</option>
										<option value="department">د استاد کاري ديپارټمنټ</option>
										<option value="year">د عملي پروګرام کال</option>
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
		<!-- Search Filter -->
		<div class="row">
			@foreach($programs as $program)
			<div class="col-md-6">
				<div class="card p-0" id="program">
					<div class="card-body p-1">
						<div class="dropdown dropdown-action profile-action">
							<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
									class="material-icons">more_vert</i></a>
							<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="/admin/educationalProgramList/{{$program->id}}/edit"  ><i
									class="fa fa-pencil m-r-5"></i>معلومات اصلاح کړی</a>
							<a class="dropdown-item" href="/admin/educationalProgramList/{{$program->id}}" data-toggle="modal"
												data-target="#delete_project" id="path" onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i> له منځه یې اوسی</a>
							</div>
						</div>
						<a href="/admin/educationalPrograminfo/{{$program->id}}">
							<div class="job-list-desc" style="padding: 15px 15px 5px 15px">
								<h3 class="job-list-title text-center pb-2"> {{$program->topic}} </h3>
								<!-- <br> -->
								<h4 class="job-department "><strong>دشخص نوم:  </strong> {{$program->teacher_name}} {{$program->teacher_last_name}}</h4>
								<h4 class="job-department "><strong>د پروګرام ډول: </strong> {{$program->type}} </h4>

								<!-- <p class="text-muted mt-4 col-md-12"><strong>پوهنتون: </strong> {{$program->university}}
								<p class="text-muted mt-4 col-md-12"><strong>پوهنځۍ: </strong> {{$program->faculty}} -->
								<!-- </p> -->
							</div>
							<div class="job-list-footer p-0" id="foot">
								<ul class="m-0" style="padding:5px 10px; background: linear-gradient(to left, #88e5ff 0%, #3687ff8c 120%); border-radius: 0 0 4px 4px;">
									<li class="ml-1 d-inline-block"><i class="fa fa-map-signs text-danger"></i> <strong>ادرس: </strong>
									{{$program->campus_name}}
								</li>
								<!-- <br>-->
								<li class="ml-1 d-inline-block" dir="rtl"><i class="fa fa-calendar text-danger"></i> <strong> نېټه:
									</strong> {{date('Y - m - d ', strtotime($program->date))}}</li>

									<li class="ml-1 d-inline-block" dir="rtl"><i class="fa fa fa-clock-o text-danger" aria-hidden="true"></i> <strong>وخت: </strong>
									{{date('A H:i', strtotime($program->date))}}</li>
								</ul>
							</div>
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@else
		<div class="row">
			<div class="col-md-12">
				<tr class="p-0">
					<td colspan="3"  class="p-0">
						<div class="" id="alertMassege">
							<ul style="list-style-type:none " class="p-0 mt-5">
								<li class="rounded p-5 my-3  success alert-success text-center"  style="font-size: 35px !important;">
									تــر اوســـه په سیــسټم کــي علـــمي پروګــرام شتـــون نلـــري!
								</li>
							</ul>
						</div>
					</td>
				</tr>
			</div>
		</div>
		@endif
	</div>
	<!-- /Page Content -->




	<!-- Delete Project Modal -->
	<div class="modal custom-modal fade" id="delete_project" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>علمي پروګرام له منځه وړل</h3>
						<p>آیا تاسي باوري یاست چي یاد پروګرام معلومات له سیسټم څخه له منځه یوس؟</p>
					</div>
					<div class="modal-btn delete-action">
						<div class="row">
							<div class="col-md-6">
								<form action="" method="post" id="pathGetter">
									{{ method_field('DELETE') }}
									{{ csrf_field() }}

									<button type="submit" class="btn btn-primary continue-btn col-md-12">له منځه یې اوسی</button>
								</form>
							</div>
							<div class="col-6">
										<a href="javascript:void(0);" data-dismiss="modal"
										class="btn btn-primary cancel-btn">قطعه یې کړی</a>
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

@section('custom-js')
@if(Session::has('success_search'))
	<script>
	swal('ډېر ښه!',"{!! Session::get('success_search') !!}", "success", {
		button: "مننه",
	});
	</script>
@endif
@if(Session::has('warn_search'))
	<script>
	swal('وبخښئ',"{!! Session::get('warn_search') !!}", "warning", {
		button: "مننه",
	});
	</script>
@endif
@if(Session::has('success'))
	<script>
	swal('وبخښئ',"{!! Session::get('success') !!}", "success", {
		button: "مننه",
	});
	</script>
@endif
<script>

		$("select.searchInput").change(function () {
			var state = $(this).children("option:selected").val();
			if(state === 'topic')
			{
				var content =
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="text" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="د پروګرام موضوع وپلټئ">
				</div>
				</div>
				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);
			}
			if(state === 'type')
			{
				var content =
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
                <select class="custom-select p-2 h-100" name="search_content">
				<option selected value="">د پرورګرام ډول وپلټئ</option>
                                            <option  value="علمي ترفېع">علمي ترفېع</option>
                                            <option  value="ارتقاء">ارتقاء</option>
                                            <option  value="تقرر">تقرر</option>
                                        </select>
				</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'teacher_name')
			{
				var content =
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="text" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="د استاد نوم وپلټئ">
				</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'father_name')
			{
				var content =
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="text" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="د استاد د پلار نوم وپلټئ">
				</div>
				</div>
				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'teacher_last_name')
			{
				var content =
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="text" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="د استاد د تخلص وپلټئ">
				</div>
				</div>
				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'university')
			{
				var content =
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
				<select class="custom-select h-100"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="search_content">
                                            <option value="">د استاد پوهنتون وپلټئ</option>
                                            <option selected value="کندهار پوهنتون">کندهار پوهنتون</option>
                                        </select>
				</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'faculty')
			{
				var content =
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
				<select class="custom-select"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="search_content">


                                            <option selected value=""></option>
                                            <option  value="طب">طب</option>
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
				</select>
				</div>
				</div>
				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'department')
			{
				var content =
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="number" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label"> د استاد کاري دیپارټمنټ وپلټئ</label>
				</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'year')
			{
				var content =
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="number" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label"> د علمي پروګرام کال وپلټئ</label>
				</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === '')
			{
				var content =
				`
				<div class="col-sm-6 col-md-5" id="search_input">
					<div class="form-group form-focus">
						<input type="text" class="form-control floating " name="search_content" disabled id="searchInput">
						<label class="focus-label">علمي پروګرام وپلټئ</label>
					</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
        });
		function pathFinder(num)
		{
			document.getElementById("pathGetter").action = num.href;
		}

</script>

@endsection
