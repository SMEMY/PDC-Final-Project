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
		#info h4{
			color: black !important;
			background:#009efb80 !important;
		}
        p, h5 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 20px !important;
			color: black !important;

		}
		a{
			font-size:20px !important;

		}
        li {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 20px !important;
			color: black !important;

		}
	
        h3 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			color: black !important;

		}
		#save_info a:hover{
			transform: scale(1.02);
			transition: all  0.2s;
			<!-- font-size: 16px !important; -->
		}
		#small li, #small a{
			font-size: 20px !important;
			font-wieght: bold;
			border-radius: 5px !important;
		}
		#images i{
			color: black;
			font-size: 20px;
			background: #c4f1ffdb;
			padding: 10px;
			line-height: 8px;
			border-radius: 3px;


		}
		#images a{
			color: black !important;
		}
		#images img{
			width: 100% !important;

			height: 300px !important;
			border: 1px solid gray;
		}
		#images_home{
			
			<!-- width: 45% !important; -->
		}
		#images ul{
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
		<div class="row" >
			<div class="col-md-12 p-0" style="padding:0px !important; padding-left:20px !important;">
				<h4 class="p-3 bg-info d-block text-center rounded" style="font-weight:bold"><i class="pr-2 fa fa-"></i>د اړونده پروګرام په اړه معلومات</h4>
				<div class="job-info job-widget col-md-12">
					<div class="dropdown dropdown-action profile-action" id="edit">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
								class="material-icons">more_vert</i></a>
						<div class="dropdown-menu dropdown-menu-right" style="z-index: 100;">
							<a class="dropdown-item" href="/pdcProgramList/{{$programs->id}}/edit"  ><i
									class="fa fa-pencil m-r-5"></i>معلومات اصلاح کړی</a>
							<a class="dropdown-item" href="/pdcProgramDelete/{{$programs->id}}" data-toggle="modal"
												data-target="#delete_project" id="path" onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i> له منځه یې اوسی</a>
						</div>
					</div>
					<br>
					<br>
					<ul class="job-post-det ">
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام نوم: : <span
						class="text-blue">{{ $programs->name }}</span></li>

						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام ډول: <span
						class="text-blue">{{ $programs->type }}</span></li>

						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام تسهیلونکی: <span
								class="text-blue">{{ $programs->facilitator }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام سپانسر: <span
								class="text-blue">{{ $programs->sponsor }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام همایه کوونکی: <span
								class="text-blue">{{ $programs->supporter }}</span></li>

						<li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام تنظیمونکی: <span
								class="text-blue">{{ $programs->manager }}</span></li>

						<li class="col-md-12"><i class="pr-2 fa fa-money"></i>د پروګرام بودیجه: <span
								class="text-blue">{{ $programs->fund }}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-users"></i>په پروګرام کي د ګډونوالو شمېر: <span
								class="text-blue">{{$programs->participant_amount}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-money"></i>د پروګرام فیس: <span
								class="text-blue">{{$programs->fee}}</span></li>
						<li class="col-md-12"><i class="pr-2 fa fa-qrcode"></i>د پروګرام کوډ د ګډونوالو لپاره: <span
								class="text-white bg-info p-1" style="border-radius: 5px; font-weight:bold">(- {{$programs->participant_code}} -)</span></li>
						<li class="col-md-12"><i class="pr- fa fa-qrcode"></i> د پروګرام کوډ د تسهیلونکو لپاره : <span
								class="text-white bg-info p-1" style="border-radius: 5px; font-weight:bold">(- {{$programs->facilitator_code}} -)</span></li>		
					</ul>
				</div>
				<div class="job-content job-widget col-md-12" id="info">
					
					<div class="job-desc-title">
						<h4 class="text-center mt-4 p-3 rounded">د اړونده پروګرام په اړه وضاحت</h4>
					</div>
					<div class="job-description">
						<p> {{ $programs->program_description }} </p>
					</div>
					<div class="job-desc-title ">
						<h4 class="text-center mt-4 p-3 rounded">د پروګرام سهولتونه</h4>
					</div>
					<div class="job-description">
						<ul class="square-list">
					

							@foreach( $programs->getFacilities as $facility)
							<li> {{ $facility->facility }} </li>
							
							@endforeach
						</ul>
					</div>
					<div class="job-desc-title ">
						<h4 class="text-center mt-4 p-3 rounded">د پروګرام  اجنډا: </h4>
					</div>
					<div class="job-description">
						<ul class="square-list">
					

							@foreach( $programs->getAgendas as $agenda)
							<li> {{ $agenda->agenda }} </li>
							
							@endforeach
						</ul>
					</div>
					<div class="job-desc-title">
						<h4 class="text-center mt-4 p-3 rounded">د پروګرام  پایلي: </h4>
					</div>
					<div class="job-description">
						<ul class="square-list">
					

							@foreach( $programs->getResults as $result)
							<li> {{ $result->result }} </li>
							
							@endforeach
						</ul>
					</div>
					<div class="job-desc-title">
						<h4 class="text-center mt-4 p-3 rounded">د پروګرام  ارزوني: </h4>
					</div>
					<div class="job-description">
						<ul class="square-list">
					

							@foreach( $programs->getEvaluations as $evaluation)
							<li> {{ $evaluation->evaluation }} </li>
							
							@endforeach
						</ul>
					</div>
					<div class="job-desc-title">
						<h4 class="text-center mt-4 p-3 rounded">د پروګرام  انځورونه: </h4>
					</div>
					<div id="images">
						<ul class="square-list1 p-0 m-0">
							@foreach($programs->getPhotos as $photo)
							<li class=" col-md-4 p-3" style="display: inline-block" id="images_home">
								<div class="dropdown-file p-3">
									<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="/downloadPhoto/{{$photo->path}}" class="dropdown-item"><i class="fa fa-download m-r-5"></i>کښته یې کړی</a>
										<a class="dropdown-item" href="/deletePhoto/{{$photo->path}}" data-toggle="modal"
											data-target="#delete_client" id="path" onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i> له منځه یې اوسی</a>
									</div>
								</div>
								<a href="{{ asset( 'storage/images/'.$photo->path) }}" target="_blank">
									<img src="{{ asset( 'storage/images/'.$photo->path) }}" alt="none" class="img-fluid rounded  mx-auto  rounded" srcset="">
								</a>
							</li>
							@endforeach
						</ul>
					</div>
					
					
				</div>
			</div>
			<div class="row col-md-12" id="small" > 
				<div class="col-md-6" Style="padding:0px !important; padding-left:20px !important;">
					<div class="job-det-info job-widget col-md-12" style=" border-radius: 5px; box-shadow:1px 0px 3px 0px #00beff" id="date">
						<h4 class="account-title">نېټه</h4>
						
						<ul class="job-post-det ">
							<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i><strong>د جوړېدو نېټه: </strong><span class="text-blue">{{ $programs->year }} - {{$programs->month}} - {{$programs->start_day}}</span></li>
							<li class="col-md-12"><i class="pr-2 fa fa-calendar"></i><strong>د جوړېدو نېټه: </strong><span class="text-blue">{{ $programs->year }} - {{$programs->month}} - {{$programs->end_day}}</span></li>
							<li class="col-md-12"><i class="pr-2 fa fa-clock-o"></i><strong>د شروع کېدو وخت: </strong><span class="text-blue">{{ $programs->start_time }}</span></li>
							<li class="col-md-12"><i class="pr-2 fa fa-clock-o"></i><strong>د شروع کېدو وخت: </strong><span class="text-blue">{{ $programs->end_time }}</span></li>
						
						</ul>
						<!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
					</div>
				</div>
				<div class="col-md-6" Style="padding:0px !important; padding-right:20px !important;">
					<div class="job-det-info job-widget col-md-12" style=" box-shadow:1px 0px 3px 0px #00beff; border-radius: 5px; " id="address">
						<h4 class="account-title">پته   </h4>
					
						<ul class="job-post-det">
							<li class="col-md-12"><i class="pr-2 fa fa-university"></i><strong>د ساحې نوم:  </strong><span class="text-blue">{{ $programs->campus_name }}</span></li>
							<li class="col-md-12"><i class="pr-2 fa fa-building"></i><strong> د ودانۍ نوم:  </strong><span class="text-blue">{{ $programs->block_name }}</span></li>
							<li class="col-md-12"><i class="pr-2 fa fa-calculator"></i><strong> د ودانۍ شمېره: </strong><span class="text-blue">{{ $programs->block_number }}</span></li>
							<li class="col-md-12"><i class="pr-2 fa fa-calculator"></i><strong> د صالون شمېره: </strong><span class="text-blue">{{ $programs->room_number }}</span></li>
						
						</ul>
						<!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
					</div>
				</div>
				<div class="col-md-6" Style="padding:0px !important; padding-left:20px !important;">
					<div class="job-det-info job-widget col-md-12" style=" box-shadow:1px 0px 5px 0px #00beff; border-radius: 5px; " id="save_info">
						<h4 class="account-title">معلومات ثبتول</h4>
	
						<a class="btn job-btn mt-3 p-2" href="/pdcProgramAttendance/{{$programs->id}}" >د پروګرام د ګډونوالو حاضري ثبتول</a>
						<a class="btn job-btn mt-3 p-2" href="/pdcProgramFacility/{{$programs->id}}" >د پروګرام سهولتونه ثبتول</a>
						<a class="btn job-btn mt-3 p-2" href="/pdcProgramAgenda/{{$programs->id}}" >د پروګرام اجنډاوي ثبتول</a>
						<a class="btn job-btn mt-3 p-2" href="/pdcProgramEvaluation/{{$programs->id}}" >د پروګرام ارزوني ثبتول</a>
						<a class="btn job-btn mt-3 p-2" href="/pdcProgramResult/{{$programs->id}}" >د پروګرام پایلي ثبتول</a>
						<a class="btn job-btn mt-3 p-2" href="/pdcProgramPhoto/{{$programs->id}}" >د پروګرام تفرقه ثبتول</a>
						<a class="btn job-btn mt-3 p-2" href="/storeMaterials/{{$programs->id}}" >د پروګرام درسي موادو ثبتول</a>
						<a class="btn job-btn mt-3 p-2" href="/feedbackFormInsertion/{{$programs->id}}" >د پروګرام پوښتنلیک ثبتول</a>
					</div>
				</div>
				<div class=" col-md-6" Style="padding:0px !important; padding-right:20px !important;">
					<div class="job-det-info job-widget col-md-12" style=" box-shadow:1px 0px 5px 0px #00beff; border-radius: 5px; " id="save_info">
						<h4 class="account-title">د پروګرام  نور معلومات </h4>
	
						<a class="btn job-btn mt-3 p-2" href="/facilitatorProfileForProgram/{{$program_id}}" >د پروګرام تسهیلونکی</a>
						<a class="btn job-btn mt-3 p-2" href="/specificeProgramParticipants/{{$programs->id}}" >د پروګرام د ګډونوالو لیست</a>
						<a class="btn job-btn mt-3 p-2 bg-danger" href="/pdcProgramAttendancePaper/{{$programs->id}}" >د پروګرام د ګډونوالو حاضري پاڼه</a>
						<a class="btn job-btn mt-3 p-2 " href="/pdcProgramAttendanceReport/{{$programs->id}}" >د پروګرام د ګډونوالو د سوبتیا راپور </a>
						<a class="btn job-btn mt-3 p-2" href="/feedback/{{$programs->id}}" >د پروګرام پوښتنلیک ډوکول</a>
						<a class="btn job-btn mt-3 p-2 bg-danger" href="/" >د پروګرام پوښتنلیک اوسط</a>
						<a class="btn job-btn mt-3 p-2" href="/materials/{{$programs->id}}" >د پروګرام تدریسي مواد</a>
	
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /Page Content -->
			
<!-- Delete Project Modal -->
<div class="modal custom-modal fade" id="delete_project" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>پروګرام له منځه وړل</h3>
								<p>آیا تاسي باوري یاست چي یاد پروګرام له سیسټم څخه له منځه یوسي؟</p>
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

@if(Session::has('program_part_added'))
	<script>
	swal('ډېر ښه!',"{!! Session::get('program_part_added') !!}", "success", {
		button: "مننه",
	});
	</script>
@endif
@section('custom-js')
@if(Session::has('warn'))
	<script>
	swal('وبخښئ!',"{!! Session::get('warn') !!}", "warning", {
		button: "وروسته کوښښ وکړئ",
	});
	</script>
@endif
@if(Session::has('all_facilitator_deleted'))
	<script>
	swal('ډېر ښه!',"{!! Session::get('all_facilitator_deleted') !!}", "success", {
		button: "سمده",
	});
	</script>
@endif
@if(Session::has('questionnaire_deleted'))
	<script>
	swal('ډېر ښه!',"{!! Session::get('questionnaire_deleted') !!}", "success", {
		button: "سمده",
	});
	</script>
@endif
@if(Session::has('success'))
	<script>
	swal('ډېر ښه!',"{!! Session::get('success') !!}", "success", {
		button: "سمده",
	});
	</script>
@endif
@if(Session::has('program_materials_added'))
	<script>
	swal('ډېر ښه!',"{!! Session::get('program_materials_added') !!}", "success", {
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

