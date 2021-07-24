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
        p, h5 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 20px !important;
		}
        li {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 20px !important;
		}
        h3 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

		}
@endsection

<!-- here we add dynamic content -->
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
	
	<!-- Page Content -->
	<div class="content" style="">
		
		
		<!-- Account Logo -->
	
		<!-- /Account Logo -->
		<div class="row col-md-12">
			<div class="col-md-12 mb-3">

				<h4 class="p-4 bg-info d-block text-center rounded" style="font-weight:bold"><i class="pr-2 fa fa-"></i>د اړونده پروګرام په اړه معلومات</h4>
				<div class="dropdown dropdown-action profile-action p-3" id="edit">
					<a href="#" class="action-icon dropdown-toggle text-white" data-toggle="dropdown" aria-expanded="false"><i
							class="material-icons">more_vert</i></a>
					<div class="dropdown-menu dropdown-menu-right" style="z-index: 100;">
						<a class="dropdown-item" href="/educationalProgramList/{{$program->id}}/edit"  ><i
								class="fa fa-pencil m-r-5"></i>معلومات اصلاح کړی</a>
						<a class="dropdown-item" href="/pdcProgramDelete/{{$program->id}}" data-toggle="modal"
											data-target="#delete_project" id="path" onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i> له منځه یې اوسی</a>
					</div>
				   </div>
			</div>
			<div class="col-md-8">
				<div class="job-info job-widget " style="border-radius: 5px; box-shadow:0px 0px 2px 0px #00beff;">
					<br>
					<br>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-info-circle"></i><strong>د پروګرام نوم: </strong><span class="text-blue">{{ $program->topic }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-info-circle"></i><strong>د پروګرام ډول: </strong><span class="text-blue">{{ $program->type }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i><strong>د استاد نوم او تخلص: </strong><span class="text-blue"> {{ $program->teacher_name }} {{$program->teacher_last_name}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i><strong>د استاد د  پلار نوم: </strong><span
								class="text-blue">{{ $program->father_name }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-university"></i><strong>د استاد پوهنتون:</strong> <span
								class="text-blue">{{ $program->university }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-university"></i><strong>د استاد پوهنځۍ:</strong> <span
								class="text-blue">{{ $program->faculty }}</span></li>

						<li class="col-md-12"><i class="pr-2 fa fa-university"></i><strong>د استاد څانکه:</strong> <span
								class="text-blue">{{ $program->department }}</span></li>

						<li class="col-md-12"><i class="pr-2 fa fa-minus-square"></i><strong>د استاد مخکنی علمي رتبه: </strong><span
								class="text-blue">{{ $program->current_educational_position }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-plus-square"></i><strong>د استاد تر لاسه کېدونکې علمي رتبه: </strong><span
								class="text-blue">{{$program->achieving_educational_position}}</span></li>
								<li class="col-md-12"><i class="pr-2 fa fa-users"></i><strong>د ګډونوالو شمېر: </strong><span
								class="text-blue">{{$program->participant_amount}} کسان</span></li>
					</ul>
				</div>
				
			</div>
			<div class="col-md-4">
				<div class="job-det-info job-widget p-2 mb-5" style="border-radius: 5px; box-shadow:0px 0px 2px 0px #00beff;">
					<h4 class="account-title">نېټه</h4>
					<br>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i><strong> نېټه: </strong><span class="text-blue">{{ $program->year }} - {{$program->month}} - {{$program->start_day}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-clock-o"></i><strong>وخت: </strong><span class="text-blue">{{ $program->start_time }}</span></li>
					
					</ul>
					<!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
				</div>
				<br !important>
				<div class="job-det-info job-widget p-2" style="border-radius: 5px; box-shadow:0px 0px 2px 0px #00beff;">
					<h4 class="account-title">پته   </h4>
					<br>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-university"></i><strong>ساحه:  </strong><span class="text-blue">{{ $program->campus_name }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-building"></i><strong> ودانۍ:  </strong><span class="text-blue">{{ $program->block_name }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-calculator"></i><strong> د ودانۍ شمېره: </strong><span class="text-blue">{{ $program->block_number }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-calculator"></i><strong> د صالون شمېره: </strong><span class="text-blue">{{ $program->room_number }}</span></li>
					
					</ul>
					<!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
				</div>
			</div>
		</div>
	</div>
<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
@endsection

