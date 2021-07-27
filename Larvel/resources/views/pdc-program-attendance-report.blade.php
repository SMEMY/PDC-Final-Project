@extends('master.master')

<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
hahahaha
@endsection
<!-- here we add css custom style -->
@section('custom-css')
input {
			background: white !important;
			/* border: 1px solid rgb(159, 158, 158) !important; */
		}
li, h3{
	font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size:30px !important;
}
		th{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			text-align: center !important;
			padding:10 !important;
			<!-- line-height: 15px; -->
			font-size: 20px !important;
			font-weight: bold !important;
			border-radius: 5px !important;

		}
		td{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			text-align: center !important;
			border-radius: 5px !important;
			padding:2px !important;
			font-size: 20px !important;

		}
		h4{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-weight: bold !important;
			font-size: 20px !important;
			

		}
		h5{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

		}
		table{
			border-collapse: separate !important;
		}
li{
	font-size: 20px !important;
}
		td>input:focus {
			box-shadow: 0px 0px 8px rgb(126, 126, 126) !important;
			z-index: 1000 !important;
			transition: all 0.2s;
			transform: scaleX(1.03) !important;
			overflow-x: hidden;
			border: none;
		}
		input::placeholder{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size:17px !important;
		}
@endsection
	
	
	
<!-- here we add dynamic content -->
@section('content')

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">سوبتیا پاڼه</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">د پي ډي سي د پروګارم دګډونوالو د حاضرۍ راپور</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->


				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table table-nowrap mb-0 ">
								<thead>
									<tr class="col-12"
										style="background: linear-gradient(to right, #00c5fb 0%, #0253cc 100%);">
										<th class=" col-2 p-2 border text-light" style="font-size: 18px;">
											<strong>ګډونوال</strong>
										</th>
										<th class="text-center border col-3 p-1 text-light" style="font-size: 18px;">
											<strong>مجموعه ورځي</strong>
										</th>
										<th class="text-center border col-3 p-2" style="font-size: 18px;">
											<strong>سوبتیا</strong>
										</th>
										<th class="text-center border col-3 p-2" style="font-size: 18px;">
											<strong>ناسوبتیا</strong>
										</th>
										
										<th class="text-center border col-1 p-2" style="font-size: 18px;">
											<strong>عملیه</strong>
										</th>

									</tr>

								</thead>
								<tbody class="overflow-hidden">
									<form action="/pdcProgramAttendanceEntry" class="" method="POST">

										{{ method_field('POST') }}
										{{ csrf_field() }}
										

										@foreach($attendanceReport as $participant)
										<tr class="border col-12">
											<td class="border-left text-left pl-3">
												{{$participant->name}} {{$participant->last_name}}
											</td>
											<td class="text-center  border-left ">
												{{$participant->total_days}}
											</td>
											<td class="text-center  border-left ">
												{{$participant->presence_days}}
											</td>
											<td class="text-center  border-left ">
												{{$participant->absence_days}}
											</td>
											<td class="border" dir="ltr">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-left">
														<a class="dropdown-item" href="/pdcProgramAttendanceReport/{{$participant->id}}/edit"><i class="fa fa-pencil m-r-5"></i> اصلاح يې کړی</a>
														<a class="dropdown-item" href="/pdcProgramAttendanceReport/{{$participant->p_id}}" data-toggle="modal" data-target="#delete_employee" onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i> له منځه یې اوسی</a>
													</div>
												</div>
											</td>
										</tr>
										@endforeach
										

									</form>


								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Delete Project Modal -->
			<div class="modal custom-modal fade" id="delete_employee" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>ګدونوال له منځه یوسی!</h3>
									<p>آیا تاسي مطمئین یاست چي یاد ګډونوال له منځه یوسی؟</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<form action="" method="post"  id="pathGetter">
												{{ method_field('DELETE') }}
												{{ csrf_field() }}
												<input class="d-none" type="text" name="page" id="" value="pdc-program-participants-list">
												<input class="d-none" type="number" id="" name="program_id" id="" value="{{$programID}}">
												<input class="d-none" type="number" id="P_ID" name="participant_id" id="" value="">
												<button type="submit" class="btn btn-danger continue-btn col-md-12" class="">له منځه یوسی</button>
											</form>
											<!-- <a href="" class="btn btn-primary continue-btn">Delete</a> -->
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-dismiss="modal"
												class="btn btn-primary cancel-btn" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;">فسخه کړی</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
<!-- /Delete Project Modal -->
			<!-- /Page Content -->

		</div>
		<!-- Page Wrapper -->
@endsection
@section('custom-js')
		@if(Session::has('success'))
            <script>
            swal('ډېر ښه!',"{!! Session::get('success') !!}", "success", {
                button: "سمده",
            });
            </script>
        @endif
<script>
	function pathFinder(num)
	{
		console.log(num.href.split('/'));
		var participantArr = num.href.split('/');
		var participantlen = participantArr.length;
		var participantID = participantArr[participantlen - 1];
		document.getElementById('P_ID').value = participantID;
		console.log(participantID);
		document.getElementById("pathGetter").action = num.href;

	}
</script>
@endsection
