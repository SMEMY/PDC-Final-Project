@extends('master.master')

<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
hahahaha
@endsection
<!-- here we add css custom style -->
@section('custom-css')
h4 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size:30px !important;
		}
		#cards_headings h4{
			font-size:25px !important;

		}
        p, h5 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 20px !important;
		}
		a{
			font-size:20px !important;
		}
        li {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 20px !important;
		}
        h3 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

		}
		#cards_headings a:hover{
			transform: scale(1.04);
			transition: all  0.2s;
		}
		#date, #address{
			transition: all  0.2s;

		}
		#date:hover, #address:hover{
			transform: scale(1.02);
			transition: all  0.2s;
		}
		#small li, #small a{
			font-size: 20px !important;
			font-wieght: bold;
			border-radius: 5px !important;
		}
		span{
			font-weight: bold !important;
		}
@endsection

<!-- here we add dynamic content -->
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content">


		<!-- Account Logo -->

		<!-- /Account Logo -->
		<div class="row">
			<div class="col-md-12">
				<h4 class="text-center d-block rounded p-3 bg-info" style="font-weight: bold"><i class="pr-2 fa fa-"></i>د اړونده ګډونوال په اړه بشپړ معلومات</h4>
			</div>
			<div class="col-md-8">
				<div class="job-info job-widget" style=" box-shadow:0px 0px 0px 1px #00beff; border-radius: 5px; ">
								<div class="dropdown-file">
									<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="/admin/participantAllList/{{$userProfile[0]->user_id}}/edit" class="dropdown-item"><i class="fa fa-download m-r-5"></i>معلومات  اصلاح کول</a>
										<a class="dropdown-item" href="/admin/participantAllList/{{$userProfile[0]->user_id}}" data-toggle="modal"
											data-target="#delete_client" id="path" onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i>معلومات له منځه یې اوسی</a>
									</div>
								</div>
					<br>
					<br>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د ګډونوال نوم: <span class="text-blue">{{ $userProfile[0]->name }} {{$userProfile[0]->last_name}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-phone"></i>د ګډونوال د ټلیفوم شمېره: <span class="text-blue">{{ $userProfile[0]->phone_number }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-mail-forward"></i>د ګډونوال برېښنالیک: <span class="text-blue">{{ $userProfile[0]->email }}</span></li>
						@if($userProfile[0]->gender == 'نارینه')
						<li class="col-md-12"><i class="pr-2 fa fa-male"></i>د ګډونوال جنسیت: <span class="text-blue">{{ $userProfile[0]->gender }}</span></li>
						@else
						<li class="col-md-12"><i class="pr-2 fa fa-female"></i>د ګډونوال جنسیت: <span class="text-blue">{{ $userProfile[0]->gender }}</span></li>
						@endif
						<li class="col-md-12"><i class="pr-2 fa fa-university"></i>د ګډونوال کاري ځاي: <span class="text-blue">{{ $userProfile[0]->office_campus }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-building"></i>د ګډونوال کاري بلاک: <span class="text-blue">{{ $userProfile[0]->office_building }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-graduation-cap"></i>د ګډونوال کاري شعبه: <span class="text-blue">{{ $userProfile[0]->office_department }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-pencil-square-o"></i>د ګډونوال کاري رتبه: <span class="text-blue">{{ $userProfile[0]->office_position }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-pencil"></i>د ګډونوال علمي رتبه: <span class="text-blue">{{ $userProfile[0]->educational_rank }}</span></li>

					</ul>
				</div>

			</div>
			<div class="col-md-4" id="cards_headings">

				<div class="job-det-info job-widget" style=" box-shadow:0px 0px 0px 1px #00beff; border-radius: 5px; " id="small">
					<h4 class="account-title">د ګډونوال اړونده کړني</h4>
					<a class="btn job-btn mt-3 p-2 " href="/admin/{{$user_request}}EnrolledPrograms/{{$userProfile[0]->user_id}}" >د ګډونوال پروګرامونه</a>

					<a class="btn job-btn mt-3 p-2 " href="/admin/{{$user_request}}EnrollmentForProgram/{{$userProfile[0]->user_id}}" > ګډونوال پروګرام ته شاملول</a>
				</div>
			</div>
		</div>
	</div>
<!-- /Page Content -->
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
</div>
<!-- /Page Wrapper -->
@endsection


@section('custom-js')
		@if(Session::has('added_to_program'))
            <script>
            swal('ډېر ښه!',"{!! Session::get('added_to_program') !!}", "success", {
                button: "مننه",
            });
            </script>
        @endif
        @if(Session::has('program_code_not_found'))
        <script>
        swal('وبخښی!',"{!! Session::get('program_code_not_found') !!}", "warning", {
            button: "سمده",
        });
        </script>
    @endif
<script>
		function pathFinder(num)
					{
						// console.log(num.href.split('/'));
						// var fileArr = num.href.split('/');
						// var fileArrlen = fileArr.length;
						// var fileName = fileArr[fileArrlen - 1];
						// // document.getElementById('file_name').value = fileName;
						// console.log(fileName);
						document.getElementById("pathGetter").action = num.href;

					}
</script>
@endsection


