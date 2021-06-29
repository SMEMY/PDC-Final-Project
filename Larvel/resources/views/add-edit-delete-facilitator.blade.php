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
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i
									class="fa fa-plus"></i> تسهیلونکی اضافه کړی</a>
							
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<!-- Search Filter -->
				<div class="row filter-row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">د تسهیلونکی نوم</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
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
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client-profile.html" class="avatar"><img alt=""
										src="assets/img/flags/af.png"></a>
							</div>
							<div class="dropdown profile-action" dir="rtl">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false"><i class="material-icons">more_vert</i></a>
								<div class="sel dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_client"><i
											class="fa fa-pencil m-r-5"></i> Edit</a>
									<a class="dropdown-item" href="#" data-toggle="modal"
										data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
								</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">محمد یاسر
									مجاهد</a></h4>
							<!-- <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5> -->
							<div class="small text-muted">تسهیلونکی</div>
							<div class="small text-muted">ای ټي کورس</div>
							<!-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a> -->
							<!-- <a href="client-profile.html" class="btn btn-white btn-sm m-t-10">معلوت وګوری</a> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client-profile.html" class="avatar"><img alt=""
										src="assets/img/flags/af.png"></a>
							</div>
							<div class="dropdown profile-action" dir="rtl">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false"><i class="material-icons">more_vert</i></a>
								<div class="sel dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_client"><i
											class="fa fa-pencil m-r-5"></i> Edit</a>
									<a class="dropdown-item" href="#" data-toggle="modal"
										data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
								</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">محمد یاسر
									مجاهد</a></h4>
							<!-- <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5> -->
							<div class="small text-muted">تسهیلونکی</div>
							<div class="small text-muted">ای ټي کورس</div>
							<!-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a> -->
							<!-- <a href="client-profile.html" class="btn btn-white btn-sm m-t-10">معلوت وګوری</a> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client-profile.html" class="avatar"><img alt=""
										src="assets/img/flags/af.png"></a>
							</div>
							<div class="dropdown profile-action" dir="rtl">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false"><i class="material-icons">more_vert</i></a>
								<div class="sel dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_client"><i
											class="fa fa-pencil m-r-5"></i> Edit</a>
									<a class="dropdown-item" href="#" data-toggle="modal"
										data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
								</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">محمد یاسر
									مجاهد</a></h4>
							<!-- <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5> -->
							<div class="small text-muted">تسهیلونکی</div>
							<div class="small text-muted">ای ټي کورس</div>
							<!-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a> -->
							<!-- <a href="client-profile.html" class="btn btn-white btn-sm m-t-10">معلوت وګوری</a> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client-profile.html" class="avatar"><img alt=""
										src="assets/img/flags/af.png"></a>
							</div>
							<div class="dropdown profile-action" dir="rtl">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false"><i class="material-icons">more_vert</i></a>
								<div class="sel dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_client"><i
											class="fa fa-pencil m-r-5"></i> Edit</a>
									<a class="dropdown-item" href="#" data-toggle="modal"
										data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
								</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">محمد یاسر
									مجاهد</a></h4>
							<!-- <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5> -->
							<div class="small text-muted">تسهیلونکی</div>
							<div class="small text-muted">ای ټي کورس</div>
							<!-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a> -->
							<!-- <a href="client-profile.html" class="btn btn-white btn-sm m-t-10">معلوت وګوری</a> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client-profile.html" class="avatar"><img alt=""
										src="assets/img/flags/af.png"></a>
							</div>
							<div class="dropdown profile-action" dir="rtl">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false"><i class="material-icons">more_vert</i></a>
								<div class="sel dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_client"><i
											class="fa fa-pencil m-r-5"></i> Edit</a>
									<a class="dropdown-item" href="#" data-toggle="modal"
										data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
								</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">محمد یاسر
									مجاهد</a></h4>
							<!-- <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5> -->
							<div class="small text-muted">تسهیلونکی</div>
							<div class="small text-muted">ای ټي کورس</div>
							<!-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a> -->
							<!-- <a href="client-profile.html" class="btn btn-white btn-sm m-t-10">معلوت وګوری</a> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="client-profile.html" class="avatar"><img alt=""
										src="assets/img/flags/af.png"></a>
							</div>
							<div class="dropdown profile-action" dir="rtl">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false"><i class="material-icons">more_vert</i></a>
								<div class="sel dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_client"><i
											class="fa fa-pencil m-r-5"></i> Edit</a>
									<a class="dropdown-item" href="#" data-toggle="modal"
										data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
								</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">محمد یاسر
									مجاهد</a></h4>
							<!-- <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5> -->
							<div class="small text-muted">تسهیلونکی</div>
							<div class="small text-muted">ای ټي کورس</div>
							<!-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a> -->
							<!-- <a href="client-profile.html" class="btn btn-white btn-sm m-t-10">معلوت وګوری</a> -->
						</div>
					</div>

					<!-- <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-02.jpg"
										alt=""></a>
							</div>
							<div class="dropdown profile-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false"><i class="material-icons">more_vert</i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#" data-toggle="modal"
										data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
									<a class="dropdown-item" href="#" data-toggle="modal"
										data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
								</div>
							</div>
							<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">John Doe</a></h4>
							<div class="small text-muted">Web Designer</div>
						</div>
					</div> -->

				</div>
			</div>
			<!-- /Page Content -->

			<!-- Add Client Modal, Edit Client Modal -->
			<div id="add_client" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">تسهیلونکی اضافه کړی</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">نوم <span class="text-danger">*</span></label>
											<input class="form-control" type="text" value="laksdjflasdk">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">تخلص</label>
											<input class="form-control " type="text">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">ټلیفون شمېره<span
													class="text-danger">*</span></label>
											<input class="form-control" type="tel" pattern="[0-9]+">
										</div>
									</div>
									<div class=" col-md-12">
										<div class="form-group">
											<label class="col-form-label">برېښنالیک<span
													class="text-danger">*</span></label>
											<input class="form-control" type="email">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">جنسیت<span
													class="text-danger">*</span></label>
											<select class="form-control">
												<!-- <option selected="">جنسیت</option> -->
												<option value="1">نارینه</option>
												<option value="2">ښځینه</option>
												<option value="3">یو بل شی</option>
											</select>

										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">کاري دفتر<span
													class="text-danger">*</span></label>
											<select class="form-control">
												<!-- <option selected="">جنسیت</option> -->
												<option value="1">کمپیوټر ساینس</option>
												<option value="2">محصلینو چارو معاونیت</option>
												<option value="3">یو بل شی</option>
											</select>

										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">کاري شعبه</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">کاري منصب<span
													class="text-danger">*</span></label>
											<select class="form-control">
												<!-- <option selected="">جنسیت</option> -->
												<option value="1">رئیس</option>
												<option value="2">مرستیال</option>
												<option value="3">ښوونکی</option>
												<option value="3">اداري کارمند</option>
											</select>
										</div>
									</div>
									<div class="col-md-12" id="rank">
										<div class="form-group">
											<label class="col-form-label"> کاري برخه<span
													class="text-danger">*</span></label>
											<select class="form-control rankS">
												<!-- <option selected="">جنسیت</option> -->
												<option value="1">اداری</option>
												<option value="2">تدریسي</option>
												<option value="3">اداري او تدریسي</option>
												<!-- <option value="3">اداري کارمند</option> -->
											</select>

										</div>
									</div>
									<!-- this part has been hidden just for DB Facilitator role -->
									<div class="col-md-12 d-none">
										<div class="form-group">
											<label class="col-form-label">role in program<span
													class="text-danger">*</span></label>
											<input type="text" class="form-control" name="" id="role"
												value="Facilitator">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">پاسورډ<span
													class="text-danger">*</span></label>
											<input class="form-control" type="password">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">پاسورډ تائید کړی<span
													class="text-danger">*</span></label>
											<input class="form-control input-sm" type="password">
										</div>
									</div>


								</div>

								<div class="submit-section col-md-12">
									<button class="btn btn-success p-2 submit-btn col-md-4">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Client Modal -->

			<!-- Delete Client Modal -->
			<div class="modal custom-modal fade" id="delete_client" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>تسهیلونکی له منځه وړل</h3>
								<p>آیا تاسي باوري یاست چي تسهیلونکی له سیسټم څخه له منځه یوسي؟</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-md-6">
										<a href="javascript:void(0);" class="btn btn-danger col-md-12">له منځه یې
											اوسی</a>
									</div>
									<div class="col-md-6">
										<a href="javascript:void(0);" data-dismiss="modal"
											class="btn btn-primary col-md-12">قطعه یې کړی</a>
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


@section('cutom-js')
<script>
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
								<select class="form-control">
								<!-- <option selected="">جنسیت</option> -->
								<option value="1">پوهایالی</option>
								<option value="2">پوهنیار</option>
								<option value="3">پوهنمل</option>
								<option value="3">پوهاند</option>
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

