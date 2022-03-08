@extends('master.master')

<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
hahahahaaa
@endsection
<!-- here we add css custom style -->
@section('custom-css')

        h4 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			color: black !important;

		}
        p {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
		}
        li {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

		}
		#foot i{
			<!-- width: 10px; -->
            <!-- color:red !important; -->
		}
        h3, h4 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 15px;
			font-weight: bold;

		}
		select:focus {
			box-shadow: 0px 0px 15px #c7f5ff;
		}

		
        input {
			background: #f0fcff !important;
		}
        p{
            max-width: 1030px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
			color: black !important;
        }




        label {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;

	}
        input{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
		}
        select{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
		}
		select:focus {
			box-shadow: 0px 0px 2px #000 !important;
			
			transition: all 0.1s;
			transform: scale(1.01);
		}

		input:focus {
			box-shadow: 0px 0px 2px #000 !important;
			transition: all 0.1s;
			transform: scale(1.02);
		}

		textarea:focus {
			box-shadow: 0px 0px 2px #000 !important;
		}
        input {

		}
		textarea{
			background: #f0fcff !important;

		}
		#for{
			transition:all 0.3s;
		}
        #foot li{
            font-size:14px;
            background: #f3efef7a;
            padding:5px;
            border-radius:3px;
        }
        #program{
			transition:all 0.3s;

        }
        #program:hover{
            background: #d4f0ff !important; 
            border: 1px solid blue;
			transition:all 0.3s;

        }

@endsection

<!-- here we add dynamic content -->
@section('content')

	<!-- Page Wrapper -->
    <div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">ربعه واره راپورونه</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">آدمېن پاڼه</a></li>
                                <li class="breadcrumb-item active">راپورونه</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <!-- Search Filter -->
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-4"> 
                        <div class="form-group form-focus select-focus">
                            <select class="select floating"> 
                                <option>اوله ربعه (حمل , ثور, جوزا)</option>
                                <option>دوهمه ربعه (سرطان , اسد, سنبله)</option>
                                <option>دریمه ربعه (میزان , عقرب, قوس)</option>
                                <option>څلورم ربعه (جدی , دلو, حوت)</option>
                            </select>
                            <label class="focus-label">ربع</label>
                        </div>
                    </div>
                  
							 
                    <!-- <div class="col-sm-6 col-md-4">  
                        <div class="form-group form-focus">
                            <div class="cal-icon">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                            <label class="focus-label">کال</label>
                        </div>
                    </div> -->
                    <div class="row filter-row mb-5" id="search_parts">
                    <div class="col-sm-6 col-md-5" id="search_input">
                    <div class="form-group form-focus">
									<input type="text"   >
									<label class="focus-label">کال </label>
						</div>
                             </div>
                                </div>


                    
                    <div class="col-sm-6 col-md-3">  
                        <a href="#" class="btn btn-success btn-block"> Search </a>  
                    </div>     
                </div>
                <!-- /Search Filter -->
                <h3>د راپور ترتیبوونکی: عنایت الله بهاند</h3>
                <h3>د راپور تائیدوونکی: پوهنمل انجینر سید احمد محبوبی</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>موخی</th>
                                        <th>لازمی کړنی</th>
                                        <th> کال</th>
                                        <th>کوم میاښت</th>
                                        <th>د کیدونکی کرنو اتکل سوی سلنه</th>
                                        <th>د ترسره سوی کرنو سلنه </th>
                                        <th>اجرا کوونکی /مسؤلین</th>
                                        <th>امکانات</th>
                                        <th>څارونکی</th>
                                        <th>لاسته راغلی پایلی</th>
                                        <th>د نه اجرا علتونه</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
										<tr>
                                        <td>
                                        <strong>1</strong>
                                           </td>
								
                                            <td>موخی نه لرو</td>
											<td>د پیزندگلوی ورکشاپ</td>
                                            <td> 1400</td>
                                            <td> 5</td>
                                            <td> %100</td>
                                            <td> %100</td>
											<td> شاغلی رحمت الله </td>
                                            <td> دولتی</td>
                                            <td> علمی معاونیت</td>
                                            <td>  </td>
                                            <td>  </td>
											<td>
												<!-- <a href="profile.html" class="avatar avatar-xs">
													<img src="assets/img/profiles/avatar-04.jpg" alt="">
												</a>
												<h2><a href="profile.html">Loren Gatlin</a></h2>
											</td>
											<td>$ 1215</td>
											<td>Cash</td> -->
											<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-danger"></i> Pending
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Pending</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
													</div>
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
                                        <tr>
                                        <td>
                                        <strong>2</strong>
                                           </td>
											
                                            <td>موخی نه لرو</td>
											<td>د پیزندگلوی ورکشاپ</td>
                                            <td> 1400</td>
                                            <td> 5</td>
                                            <td> %100</td>
                                            <td> %100</td>
											<td> شاغلی رحمت الله </td>
                                            <td> دولتی</td>
                                            <td> علمی معاونیت</td>
                                            <td>  </td>
                                            <td>  </td>
											<td>
												<!-- <a href="profile.html" class="avatar avatar-xs">
													<img src="assets/img/profiles/avatar-04.jpg" alt="">
												</a>
												<h2><a href="profile.html">Loren Gatlin</a></h2>
											</td>
											<td>$ 1215</td>
											<td>Cash</td> -->
											<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-danger"></i> Pending
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Pending</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
													</div>
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
                                    

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            
        </div>
        <!-- /Page Wrapper -->



@endsection