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
		a:hover{
			transform: scale(1.08);
			transition: all  0.4s;
		}
		#date, #address{
			transition: all  0.3s;

		}
		#date:hover, #address:hover{
			transform: scale(1.04);
			transition: all  0.4s;
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
		<div class="row col-md-12">
			<div class="col-md-7">
				<div class="job-info job-widget">
				<h4 class="m-auto " style="width: fit-content"><i class="pr-2 fa fa-"></i>د اړونده {{$name}} په اړه بشپړ معلومات</h4>
					<br>
					<br>
					<ul class="job-post-det col-md-12">
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د {{$name}} نوم: <span class="text-blue">{{ $userProfile[0]->name }} {{$userProfile[0]->last_name}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-phone"></i>د {{$name}} د ټلیفوم شمېره: <span class="text-blue">{{ $userProfile[0]->phone_number }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-mail-forward"></i>د {{$name}} برېښنالیک: <span class="text-blue">{{ $userProfile[0]->email }}</span></li>
						@if($userProfile[0]->gender == 'نارینه')
						<li class="col-md-12"><i class="pr-2 fa fa-male"></i>د {{$name}} جنسیت: <span class="text-blue">{{ $userProfile[0]->gender }}</span></li>
						@else
						<li class="col-md-12"><i class="pr-2 fa fa-female"></i>د {{$name}} جنسیت: <span class="text-blue">{{ $userProfile[0]->gender }}</span></li>
						@endif
						<li class="col-md-12"><i class="pr-2 fa fa-university"></i>د {{$name}} کاري ځاي: <span class="text-blue">{{ $userProfile[0]->office_campus }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-graduation-cap"></i>د {{$name}} کاري دیپارټمنټ: <span class="text-blue">{{ $userProfile[0]->office_department }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-pencil-square-o"></i>د {{$name}} کاري رتبه: <span class="text-blue">{{ $userProfile[0]->office_position }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-pencil"></i>د {{$name}} علمي رتبه: <span class="text-blue">{{ $userProfile[0]->educational_rank }}</span></li>

					</ul>
				</div>
				
			</div>
			<div class="col-md-5">
				
				<div class="job-det-info job-widget" style=" box-shadow:1px 0px 5px 0px #00beff; border-radius: 5px; ">
					<h4 class="account-title">د پروګرام  نور معلومات ثبتول</h4>
<br>
					<a class="btn job-btn mt-3 p-2 bg-danger" href="" >د {{$name}} پروګرامونه</a>
					<a class="btn job-btn mt-3 p-2 bg-danger" href="" > {{$name}} پروګرام ته شاملول</a>
					<a class="btn job-btn mt-3 p-2 bg-danger" href="" >د {{$name}} معلومات اصلاح کول</a>
					<a class="btn job-btn mt-3 p-2 bg-danger" href="" > {{$name}} له منځه وړل</a>
				</div>
			</div>
		</div>
	</div>
<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
@endsection

