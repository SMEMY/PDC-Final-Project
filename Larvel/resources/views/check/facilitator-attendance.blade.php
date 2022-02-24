@extends('master.master')



<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
'Facilitator Attendance'
@endsection





@section('custom-css')
input {
			background: white !important;
			/* border: 1px solid rgb(159, 158, 158) !important; */
		}

		td>input:focus {
			box-shadow: 0px 0px 8px rgb(126, 126, 126) !important;
			z-index: 1000 !important;
			transition: all 0.2s;
			transform: scaleX(1.02) !important;
			overflow-x: hidden;
			border: none;
		}
@endsection


@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Attendance</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Attendance</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<!-- Search Filter
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3"> 
							<div class="form-group form-focus select-focus">
								<select class="select floating"> 
									<option>-</option>
									<option>Jan</option>
									<option>Feb</option>
									<option>Mar</option>
									<option>Apr</option>
									<option>May</option>
									<option>Jun</option>
									<option>Jul</option>
									<option>Aug</option>
									<option>Sep</option>
									<option>Oct</option>
									<option>Nov</option>
									<option>Dec</option>
								</select>
								<label class="focus-label">Select Month</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3"> 
							<div class="form-group form-focus select-focus">
								<select class="select floating"> 
									<option>-</option>
									<option>2019</option>
									<option>2018</option>
									<option>2017</option>
									<option>2016</option>
									<option>2015</option>
								</select>
								<label class="focus-label">Select Year</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<a href="#" class="btn btn-success btn-block"> Search </a>  
						</div>     
                    </div> -->
				<!-- /Search Filter -->

				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table table-nowrap mb-0 ">
								<thead>
									<tr class="col-12"
										style="background: linear-gradient(to right, #00c5fb 0%, #0253cc 100%);">
										<th class=" col-2 p-3 border text-light" style="font-size: 18px;">
											<strong>Employee</strong>
										</th>
										<th class="text-center border col-5 p-3" style="font-size: 18px;">
											<strong>Presence</strong>
										</th>
										<th class="text-center border col-5 p-3" style="font-size: 18px;">
											<strong>Absence</strong>
										</th>

									</tr>

								</thead>
								<tbody class="overflow-hidden">
									<form action="#" class="overflow-hidden">
									
										<tr class="border col-12">
											<td class="border-left p-1 col-2">
												<h2 class="table-avatar">
													<a class="avatar avatar-xs" href="profile.html"><img alt=""
															src="assets/img/profiles/avatar-09.jpg"></a>
													<a href="profile.html">John Doe</a>
												</h2>
											</td>
											<td class="text-center p-1 border-left "><input
													class="form-control text-center col-11 m-auto" type="number"
													placeholder="Default input"> </td>
											<td class="text-center p-1 border-left "><input
													class="form-control text-center col-11 m-auto" type="number"
													placeholder="Default input"> </td>
										</tr>
										<tr class="border col-12">
											<td class="border-left p-1 col-2">
												<h2 class="table-avatar">
													<a class="avatar avatar-xs" href="profile.html"><img alt=""
															src="assets/img/profiles/avatar-09.jpg"></a>
													<a href="profile.html">John Doe</a>
												</h2>
											</td>
											<td class="text-center p-1 border-left "><input
													class="form-control text-center col-11 m-auto" type="number"
													placeholder="Default input"> </td>
											<td class="text-center p-1 border-left "><input
													class="form-control text-center col-11 m-auto" type="number"
													placeholder="Default input"> </td>
										</tr>
										<tr>
											<td colspan="3" class="text-center"><button type="submit"
													class="btn btn-info btn-lg col-4">Save</button></td>
										</tr>

									</form>


								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->

			<!-- Attendance Modal -->
			<div class="modal custom-modal fade" id="attendance_info" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Attendance Info</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<div class="card punch-status">
										<div class="card-body">
											<h5 class="card-title">Timesheet <small class="text-muted">11 Mar
													2019</small></h5>
											<div class="punch-det">
												<h6>Punch In at</h6>
												<p>Wed, 11th Mar 2019 10.00 AM</p>
											</div>
											<div class="punch-info">
												<div class="punch-hours">
													<span>3.45 hrs</span>
												</div>
											</div>
											<div class="punch-det">
												<h6>Punch Out at</h6>
												<p>Wed, 20th Feb 2019 9.00 PM</p>
											</div>
											<div class="statistics">
												<div class="row">
													<div class="col-md-6 col-6 text-center">
														<div class="stats-box">
															<p>Break</p>
															<h6>1.21 hrs</h6>
														</div>
													</div>
													<div class="col-md-6 col-6 text-center">
														<div class="stats-box">
															<p>Overtime</p>
															<h6>3 hrs</h6>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="card recent-activity">
										<div class="card-body">
											<h5 class="card-title">Activity</h5>
											<ul class="res-activity-list">
												<li>
													<p class="mb-0">Punch In at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														10.00 AM.
													</p>
												</li>
												<li>
													<p class="mb-0">Punch Out at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														11.00 AM.
													</p>
												</li>
												<li>
													<p class="mb-0">Punch In at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														11.15 AM.
													</p>
												</li>
												<li>
													<p class="mb-0">Punch Out at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														1.30 PM.
													</p>
												</li>
												<li>
													<p class="mb-0">Punch In at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														2.00 PM.
													</p>
												</li>
												<li>
													<p class="mb-0">Punch Out at</p>
													<p class="res-activity-time">
														<i class="fa fa-clock-o"></i>
														7.30 PM.
													</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Attendance Modal -->

		</div>
		<!-- Page Wrapper -->
@endsection
