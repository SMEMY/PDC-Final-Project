@extends('master.master')

<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
hahahaha
@endsection
<!-- here we add css custom style -->
@section('custom-css')
			thead tr th{
				font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
				font-size: 20px !important;
				
			}
			label{
				font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

			}
			h3, p, button{
				font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
				
			}
			h3{
				font-size: 25px !important;

			}
			p{
				font-size: 20px !important;

			}
			td{
				border-right: 1px solid #d8d8d8;
				border-bottom:1px solid #d8d8d8;
				font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
				font-size: 20px !important;
				text-align: center;
			}
			tr th{
				border:1px solid  gray !important;
				background: #00c5fb;
				font-weight: bold !important;
			}
@endsection


@section('content')



        <div class="main-wrapper">
			<!-- Page Wrapper -->
            <div class="page-wrapper">
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">د پروګرام ګډونوال</h3>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
					<form action="/programSpecificParticipant/{{$programID}}" method="get">
						{{ method_field('GET') }}
						{{ csrf_field() }}
						<div class="row filter-row">
							<div class="col-sm-6 col-md-5">
								<div class="form-group form-focus">
									<input type="text" class="form-control floating" name="name">
									<label class="focus-label">د ګډونوال نوم</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-5">
								<div class="form-group form-focus">
									<input type="text" class="form-control floating" name="phone_number">
									<label class="focus-label">د ګډونوال د ټلیفون شمېره</label>
								</div>
							</div>

							<div class="col-sm-6 col-md-2">
								<!-- <a href="#" class="btn btn-success btn-block p-0 pt-2" style="font-size: 25px;">پلټنه </a> -->
								<button class="btn btn-success btn-block p-0 pt-2 ">پلټنه</button>

							</div>
						</div>
					</form>
					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped mb-0">
									<thead>
										<tr>
											<th class="text text-center">نوم</th>
											<th class="text text-center">تخلص</th>
											<th class="text text-center">کاري ځاي</th>
											<th class="text text-center">کاري دفتر</th>
											<th class="text-nowrap text-center">کاري شعبه</th>
											<th class="text text-center">ټلیفون شمېره</th>
											<th class="text text-center">برېښنالیک</th>
											<th class="text text-center" class="text-right no-sort">عملیه</th>
										</tr>
									</thead>
									<tbody>
										@foreach($participants as $participant)
										<tr>
											<td>{{$participant->name}}</td>
											<td >{{$participant->last_name}}</td>
											<td>{{$participant->office_campus}}</td>
											<td>{{$participant->office_building}}</td>
											<td>{{$participant->office_department}}</td>
											<td>{{$participant->phone_number}}</td>
											<td>{{$participant->email}}</td>
											<td class="text-right" style="border-left: 1px solid #d8d8d8;">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-left" >
														<a class="dropdown-item" href="/participantList/{{$participant->id}}/edit" ><i class="fa fa-pencil m-r-5"></i> اصلاح يې کړی</a>
														<a class="dropdown-item" href="/participantList/{{$participant->id}}" data-toggle="modal" data-target="#delete_employee" onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i> له منځه یې اوسی</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-user-o m-r-5"></i>نور معلومات تر لاسه کړی</a>
													</div>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
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
											<input class="d-none" type="number" name="program_id" id="" value="{{$programID}}">
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
            </div>
			<!-- /Page Wrapper -->		
        </div>


		<!-- /Main Wrapper -->
@endsection

@section('custom-js')
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