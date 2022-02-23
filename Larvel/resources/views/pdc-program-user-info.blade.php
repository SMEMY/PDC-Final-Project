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
		@foreach($userProfile as $profile)
		<div class="row">
			<div class="col-md-12">
				<h4 class="text-center d-block rounded p-3 bg-info" style="font-weight: bold"><i class="pr-2 fa fa-"></i>د اړونده {{$name}} په اړه بشپړ معلومات</h4>
			</div>
			<div class="col-md-8">
				<div class="job-info job-widget" style=" box-shadow:0px 0px 0px 1px #00beff; border-radius: 5px; ">
								<div class="dropdown-file">
									<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="/admin/facilitatorProfileForProgram/{{$profile->id}}/edit" class="dropdown-item"><i class="fa fa-download m-r-5"></i>معلومات  اصلاح کول</a>
										<a class="dropdown-item" href="/admin/deleteFacilitatorForProgram/{{$profile->id}}" data-toggle="modal"
											data-target="#delete_client" id="path" onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i>معلومات له منځه یې اوسی</a>
									</div>
								</div>
					<br>
					<br>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د {{$name}} نوم: <span class="text-blue">{{ $profile->name }} {{$profile->last_name}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-phone"></i>د {{$name}} د ټلیفوم شمېره: <span class="text-blue">{{ $profile->phone_number }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-mail-forward"></i>د {{$name}} برېښنالیک: <span class="text-blue">{{ $profile->email }}</span></li>
						@if($profile->gender == 'نارینه')
						<li class="col-md-12"><i class="pr-2 fa fa-male"></i>د {{$name}} جنسیت: <span class="text-blue">{{ $profile->gender }}</span></li>
						@else
						<li class="col-md-12"><i class="pr-2 fa fa-female"></i>د {{$name}} جنسیت: <span class="text-blue">{{ $profile->gender }}</span></li>
						@endif
						<li class="col-md-12"><i class="pr-2 fa fa-university"></i>د {{$name}} کاري ځاي: <span class="text-blue">{{ $profile->office_campus }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-building"></i>د {{$name}} کاري بلاک: <span class="text-blue">{{ $profile->office_building }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-graduation-cap"></i>د {{$name}} کاري شعبه: <span class="text-blue">{{ $profile->office_department }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-pencil-square-o"></i>د {{$name}} کاري رتبه: <span class="text-blue">{{ $profile->office_position }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-pencil"></i>د {{$name}} علمي رتبه: <span class="text-blue">{{ $profile->educational_rank }}</span></li>

					</ul>
				</div>

			</div>
			<div class="col-md-4" id="cards_headings">

				<div class="job-det-info job-widget" style=" box-shadow:0px 0px 0px 1px #00beff; border-radius: 5px; " id="small">
					<h4 class="account-title">د {{$name}} اړونده کړني</h4>
					<a class="btn job-btn mt-3 p-2 " href="/facilitatorEnrolledPrograms/{{$profile->id}}" >د {{$name}} پروګرامونه</a>
					<a class="btn job-btn mt-3 p-2 " href="/programEnrollmentForFacilitator/{{$profile->id}}" > {{$name}} پروګرام ته شاملول</a>
				</div>
			</div>
		</div>
		@endforeach
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
												   <input class="d-none" type="number" name="program_id" id="file_name" value="{{$program_id}}">
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
		@if(Session::has('facilitator_deleted'))
            <script>
            swal('ډېر ښه!',"{!! Session::get('facilitator_deleted') !!}", "success", {
                button: "سمده",
            });
            </script>
        @endif
        @if(Session::has('member_edited'))
        <script>
        swal('ډېر ښه!',"{!! Session::get('member_edited') !!}", "success", {
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


