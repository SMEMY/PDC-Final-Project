@extends('master.master')

<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
hahahaha
@endsection
<!-- here we add css custom style -->
@section('custom-css')
label {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
		}
        h4 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			color: black !important;
			font-size: 16px !important;

		}
        p {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
		}
        li {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
		}
        h3 {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size: 22px !important;

		}
		select:focus {
			box-shadow: 0px 0px 15px #c7f5ff;
		}

		input:focus {
			box-shadow: 0px 0px 15px #c7f5ff !important;
		}
        input {
			
			background: #f0fcff !important;
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
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">پروګرامونه</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">آدمېن پاڼه</a></li>
                    <li class="breadcrumb-item active">پروګرامونه</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <!-- <a href="#" class="btn add-btn px-4" data-toggle="modal" data-target="#create_project"><i
                        class="fa fa-plus"></i>پروګرام ثبت کړی</a>
                <div class="view-icons">
                    <a href="projects.html" class="grid-view btn btn-link active"><i
                            class="fa fa-th"></i></a>
                    <a href="project-list.html" class="list-view btn btn-link"><i
                            class="fa fa-bars"></i></a>
                </div> -->
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <!-- Search Filter -->
    <form action="/test" method="POST">
        {{ method_field('POST') }}
      	{{ csrf_field() }}

    <div class="row filter-row">
        <div class="col-sm-6 col-md-5">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" name="search_name">
                <label class="focus-label">د پروګرام نوم</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-5">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" name="search_id">
                <label class="focus-label">د پروګرام ایډي</label>
            </div>
        </div>

        <div class="col-sm-6 col-md-2">
            <!-- <a href="#" class="btn btn-success btn-block p-0 pt-2" style="font-size: 25px;">پلټنه </a> -->
            <button class="btn btn-success btn-block p-0 pt-2 ">پلټنه</button>

        </div>
    </div>
    </form>
    <!-- Search Filter -->
    <div class="row">
        @foreach($programs as $program)
        <div class="col-md-4">
            <div class="card p-0" id="program">
                <div class="card-body p-1">
                    <div class="dropdown dropdown-action profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{$path}}/{{$program->id}}/edit"  ><i
                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i
                                    class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <a href="/educationalPrograminfo/{{$program->id}}">
                        <div class="job-list-desc" style="padding: 15px 15px 5px 15px">
                            <h3 class="job-list-title text-center pb-2"> {{$program->topic}} </h3>
                            <!-- <br> -->
                            <h4 class="job-department "><strong>دشخص نوم:  </strong> {{$program->teacher_name}} {{$program->teacher_last_name}}</h4>
                            <h4 class="job-department "><strong>د پروګرام ډول: </strong> {{$program->type}} </h4>
                           
                            <!-- <p class="text-muted mt-4 col-md-12"><strong>پوهنتون: </strong> {{$program->university}}
                            <p class="text-muted mt-4 col-md-12"><strong>پوهنځۍ: </strong> {{$program->faculty}} -->
                            <!-- </p> -->
                        </div>
                        <div class="job-list-footer p-0" id="foot">
                            <ul class="m-0" style="padding:5px 10px; background: linear-gradient(to left, #88e5ff 0%, #3687ff8c 120%); border-radius: 0 0 4px 4px;">
                                <li class="ml-1 d-inline-block"><i class="fa fa-map-signs text-danger"></i> <strong>ادرس: </strong>
                                {{$program->campus_name}}
                            </li>
							<!-- <br>-->
                            <li class="ml-1 d-inline-block"><i class="fa fa-calendar text-danger"></i> <strong> نېټه:
                                </strong> {{$program->year}} - {{$program->month}} - {{$program->start_day}}</li> 
								<!-- <br>
                                <li class="ml-1 d-inline-block"><i class="fa fa fa-clock-o text-danger" aria-hidden="true"></i> <strong>د شروع کېدو وخت: </strong>
                                    {{$program->start_time}}</li> -->
                            </ul>
                        </div>            
                    </a>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
<!-- /Page Content -->




<!-- Delete Project Modal -->
<div class="modal custom-modal fade" id="delete_project" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Project</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal"
                                class="btn btn-primary cancel-btn">Cancel</a>
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
<script>
		var count = 2;
		function afterText() {
			var txt1 =
				`
				<div class="form-group">
										
										<input placeholder="${count}" class="form-control" type="text" name="facility${count}">
									</div>`;

			$("#facilities").children().last().after(txt1);
			$('#times').removeClass('d-none');
			count++;   // Insert new elements after img
		}
		function rmv() {

			if (count != 2) {
				$('#facilities').children().last().remove();
				count--;
			}
			if (count == 2) {
				$('#times').addClass('d-none');

			}

		}
		var count1 = 2;
		function addAgenda() {
			var txt1 =
				`
				<div class="form-group">
										
										<input placeholder="${count1}" class="form-control" type="text" name="agenda${count1}">
									</div>`;

			$("#agendas").children().last().after(txt1);
			$('#remove-agenda').removeClass('d-none');
			count1++;   // Insert new elements after img
		}
		function removeAgenda() {

			if (count1 != 2) {
				$('#agendas').children().last().remove();
				count1--;
			}
			if (count1 == 2) {
				$('#remove-agenda').addClass('d-none');

			}

		}

		var s = true;
		$("select.rankS").change(function () {
			var state = $(this).children("option:selected").val();
			// alert("You have selected the country - " + state);
			if (state === "1" && s === true) {
			console.log("hi");
				$("#fee").removeClass('d-none');
				$("#fee_type").removeClass('d-none');
				// var txt1 =
				// 	`<div class="col-md-12" id="temp">
				// 		<div class="form-group">
				// 			<label>دپروګرام د داخلېدو مبلغ</label>
				// 							<input placeholder="$" class="form-control" type="number" name="fee">

				// 		</div>
				// 	</div>`;

				// $("#rank").after(txt1);
				s = false;
			}
			else if (state === "0" && s === false) {
				$("#fee").addClass('d-none');
				$("#fee_type").addClass('d-none');

				// $("#temp").remove();
				s = true
			}

		});
		// function nameShow() {
		// 	console.log(this.value);
		// 	var fileName = $(this).val().split("\\").pop();
		// 	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		// }
		function el() {
			$(".custom-file-input").on("change", function () {
				var fileName = $(this).val().split("\\").pop();
				$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
			});
		}

		$(".custom-file-input").on("change", function () {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});

		var count4 = 2;
		function addFile() {
			var txt1 =
				`	<div class=" col-md-6" >
												<div class="form-group custom-file ">
													<input type="file" class="custom-file-input" id="customFile"
														name="filename">
													<label class="custom-file-label" for="customFile">د پروګرام اړونده
														فایل
														انتخاب کړی</label>
												</div>
											</div>
											<div class=" col-md-6 mb-3" id="">
												<div class="form-group">
													<select class="custom-select"
														style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;">
														<option selected>د فایل ډول انتخاب کړی</option>
														<option value="0">پریشینټېشن</option>
														<option value="1">وډیو</option>
													</select>

												</div>
											</div>`;

			$("#files").children().last().after(txt1);
			$('#file-remover').removeClass('d-none');
			count4++;   // Insert new elements after img
		}
		function removeFile() {

			if (count4 != 2) {
				$('#files').children().last().remove();
				$('#files').children().last().remove();

				count4--;
			}
			if (count4 == 2) {
				$('#file-remover').addClass('d-none');

			}

		}

	</script>

    @endsection