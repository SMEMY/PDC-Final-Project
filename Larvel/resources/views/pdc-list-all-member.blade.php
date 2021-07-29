@extends('master.master')



<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
hahahaha
@endsection

@section('custom-css')

* {
	font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.sel {
	transform: translate3d(10px, 32px, 0px) !important;
}
input:focus{
	/* border-color: #5092f4 !important; */
	box-shadow: 0px 0px 5px #5092f4 !important;
}
select{
	font-size: 20px !important;
}

@endsection


@section('content')
<div class="page-wrapper">

			<!-- Page Content -->
			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">تسهیلوونکي</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">اډمېن پاڼه</a></li>
								<li class="breadcrumb-item active">تسهیلوونکي</li>
							</ul>
						</div>
						
					</div>
				</div>
				<!-- /Page Header -->

				<!-- Search Filter -->
				<form action="memberList" method="POST">
				{{ method_field('POST') }}
      			{{ csrf_field() }}
					<div class="row filter-row mb-5" id="search_parts">
						<div class="col-sm-6 col-md-5" id="search_input">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating disable" name="search_content" disabled id="searchInput">
								<label class="focus-label">تسهیلونکی وپلټی</label>
							</div>
						</div>
						
						<div class="col-sm-6 col-md-5" id="search_content">
							<div class="form-group form-focus select-focus">
								<select class="custom-select p-2 h-100 searchInput" name="search_type">
									<a href="/facilitatorList"><option selected value="">د پلټني عنصر انتخاب کړی!</option></a>
									<option value="name">نوم</option>
									<option value="email">برېښنالیک</option>
									<option value="phone_number">د موبائیل شمېره</option>
									<option value="educational_rank">علمي رتبه</option>
									<option value="gender">جنسیت</option>
									<option value="office_building">کاري دفتر</option>
									<option value="office_department">کاري شعبه</option>
									<option value="office_position">کاري منصب</option>
									<option value="office_position_category">کاري برخه</option>
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

				<div class="row staff-grid-row">
				@foreach($members as $member)
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3" >
						<div class="profile-widget" style="box-shadow: 0px 0px 2px 1px #89d0e5;">
							<div class="profile-img">
								<a href="{{$path}}Profile/{{$member->id}}" class="avatar"><i class="mt-2 fa fa-user-o text-info" style="font-size:60px; margin-left:0px;     "></i></a>
							</div>
							<div class="dropdown profile-action" dir="rtl">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false"><i class="material-icons">more_vert</i></a>
								<div class="sel dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/{{$path}}List/{{$member->id}}/edit"  ><i
                                class="fa fa-pencil m-r-5"></i> اصلاح یې کړی</a>
									<a class="dropdown-item" href="{{$path}}List/{{$member->id}}" data-toggle="modal"
										data-target="#delete_client" id="path" onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i> له منځه یې اوسی</a>
								</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{$path}}Profile/{{$member->id}}">{{ $member->educational_rank }} {{ $member->name }} {{ $member->last_name }}</a></h4>
							<!-- <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5> -->
							<div class="small text-muted">{{ $member->office_building }}</div>
							<div class="small text-muted">{{ $member->email }}</div>
							<!-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a> -->
							<!-- <a href="client-profile.html" class="btn btn-white btn-sm m-t-10">معلوت وګوری</a> -->
						</div>
					</div>
				@endforeach	

					

				</div>
			</div>
			<!-- /Page Content -->


			<!-- Delete Client Modal -->
			<div class="modal custom-modal fade" id="delete_client" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>ښاغلی/آغلې له منځه وړل</h3>
								<p>آیا تاسي باوري یاست چي یاد کس له سیسټم څخه له منځه یوسي؟</p>
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
			<!-- /Delete Client Modal -->

		</div>
		<!-- /Page Wrapper -->
@endsection


@section('custom-js')

		@if(Session::has('member_edited'))
            <script>
            swal('ډېر ښه!',"{!! Session::get('member_edited') !!}", "success", {
                button: "مننه",
            });
            </script>
        @endif
<script>

	function pathFinder(num)
	{
		console.log(num.href);
		document.getElementById("pathGetter").action = num.href;

	}
		// function afterText() {
		var s = true;
		$("select.searchInput").change(function () {
			var state = $(this).children("option:selected").val();
			// alert("You have selected the country - " + state);
			console.log(state);
			// console.log($('#search_parts').children().first().remove());
			
			
			if(state === 'name')
			{
				var content = 
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="text" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label">تسهیلونکی وپلټی</label>
				</div>
				</div>
				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);
			}
			if(state === 'email')
			{
				var content = 
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="email" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label">برېښنالیک ولیکی</label>
				</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'phone_number')
			{
				var content = 
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="text" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label">موبائیل شماره ولیکی</label>
				</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'educational_rank')
			{
				var content = 
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<select class="custom-select p-2 h-100" name="search_content">
						<option selected>علمي رتبه انتخاب کړی</option>
						<option value="پوهایالی">پوهایالی</option>
						<option value="پوهنیار">پوهنیار</option>
						<option value="پوهنمل">پوهنمل</option>
						<option value="پوهاند">پوهاند</option>
						<!-- <option value="3">اداري کارمند</option> -->
					</select>
				</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'gender')
			{
				var content = 
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<select class="custom-select p-2 h-100" name="search_content">
						<!-- <option selected="">جنسیت</option> -->
						<option selected>جنسیت انتخاب کړی</option>
						<option value="نارینه">نارینه</option>
						<option value="ښځینه">ښځینه</option>
					</select>
				</div>
				</div>
				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'office_building')
			{
				var content = 
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="text" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label"> کاري دفتر نوم مو ولیکی</label>
				</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'office_department')
			{
				var content = 
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="text" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label"> کاري شعبې نوم مو ولیکی</label>
				</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'office_position')
			{
				var content = 
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<select class="custom-select p-2 h-100" name="search_content">
						<!-- <option selected="">جنسیت</option> -->
						<option selected>کاري رتبه</option>
						<option value="رئیس">رئیس</option>
						<option value="مرستیال">مرستیال</option>
						<option value="ښوونکی">ښوونکی</option>
						<option value="اداري کارمند">اداري کارمند</option>
					</select>
				</div>
				</div>
				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			if(state === 'office_position_category')
			{
				var content = 
				`
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<select class="custom-select p-2 h-100" name="search_content">
						<!-- <option selected="">جنسیت</option> -->
						<option selected>کاري برخه</option>
						<option value="اداري">اداري</option>
						<option value="تدریسي">تدریسي</option>
						<option value="اداري او تدریسي">اداري او تدریسي</option>
						<!-- <option value="3">اداري کارمند</option> -->
					</select>
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
						<input type="text" class="form-control floating disable" name="search_content" disabled id="searchInput">
						<label class="focus-label">تسهیلونکی وپلټی</label>
					</div>
				</div>

				`;
				$('#search_parts').children().first().remove()
				$("#search_content").before(content);

			}
			
			// else
			// {
			// 	var content = 
			// 	`
			// 	<div class="form-group form-focus">
			// 		<input type="text" class="form-control floating disable" name="search_content" readonly id="searchInput">
			// 		<label class="focus-label">تسهیلونکی وپلټی</label>
			// 	</div>
			// 	`;
			// 	$("#search_content").before(content);

			// }
			// if ((state === "2" || state === "3") && s === true) {
			// 	var txt1 =
			// 		`<div class="col-md-12" id="temp">
			// 			<div class="form-group">
			// 				<label class="col-form-label">علمي رتبه<span class="text-danger">*</span></label>
			// 					<select class="form-control" name="educational_rank">
			// 					<!-- <option selected="">جنسیت</option> -->
			// 					<option value="پوهایالی">پوهایالی</option>
			// 					<option value="پوهنیار">پوهنیار</option>
			// 					<option value="پوهنمل">پوهنمل</option>
			// 					<option value="پوهاند">پوهاند</option>
			// 					<!-- <option value="3">اداري کارمند</option> -->
			// 				</select>

			// 			</div>
			// 		</div>`;

				// $("#rank").after(txt1);
				// s = false;
			// }
			// else if (state === "1" && s === false) {
			// 	$("#temp").remove();
			// 	s = true
			// }

		});
	</script>
@endsection

