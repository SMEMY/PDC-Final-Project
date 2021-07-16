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
				<div class="row filter-row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" name="search_name">
							<label class="focus-label">د تسهیلونکی نوم</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" name="search_phone_number">
							<label class="focus-label">د تسهبلونکی د ټلیفون شمېره</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus select-focus">
							<select class="form-control p-0 h-100">
								<option>پروګرام انتخاب کړی</option>
								<option>جکسا مېتود</option>
								<!-- <option>Delta Infotech</option> -->
							</select>
							<!-- <label class="focus-label">پروګرام انتخاب کړی</label> -->
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<a href="#" class="btn btn-success btn-block h3 p-1">پلټنه </a>
					</div>
				</div>
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
<script>

	function pathFinder(num)
	{
		console.log(num.href);
		document.getElementById("pathGetter").action = num.href;

	}
		// function afterText() {
		var s = true;
		$("select.rankS").change(function () {
			var state = $(this).children("option:selected").val();
			// alert("You have selected the country - " + state);
			console.log(typeof state);
			if ((state === "2" || state === "3") && s === true) {
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
				s = false;
			}
			else if (state === "1" && s === false) {
				$("#temp").remove();
				s = true
			}

		});
			    // Insert new elements after img
		// }
	</script>
@endsection

