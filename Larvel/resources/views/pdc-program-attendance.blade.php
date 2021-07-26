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

	font-size:25px !important;
	
}
td{
	font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			font-size:20px !important;
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
		.swal-modal{
			padding: 20px 24px;
    		width: 600px;
		}

		.swal-modal div{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }
		.swal-text{
			text-align: right;

		}
		.swal-button{
			background: #d65353;
			font-size: 18px;
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
								<li class="breadcrumb-item active">د پي ډي سي د پروګارم دګډونوالو لیست</li>
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
								@if ($errors->any())
									<div class="mb-2" id="alertMassege">
										<ul style="list-style-type:none" class="p-0 m-0">

											@foreach ($errors->all() as $error)
											<li class="rounded p-2 m-1 alert alert-danger" >
												{{ $error }}
											</li>
											@endforeach
											
										</ul>
									</div>
								@endif
									<tr class="col-12"
										style="background: linear-gradient(to right, #00c5fb 0%, #0253cc 100%);">
										<th class=" col-2 p-3 border text-light" style="font-size: 18px;">
											<strong>ګډونوال</strong>
										</th>
										<th class="text-center border col-5 p-3" style="font-size: 18px;">
											<strong>سوبتیا</strong>
										</th>
										<th class="text-center border col-5 p-3" style="font-size: 18px;">
											<strong>ناسوبتیا</strong>
										</th>

									</tr>

								</thead>
								<tbody class="overflow-hidden">
									<form action="/pdcProgramAttendanceEntry" class="" method="POST">

										{{ method_field('POST') }}
										{{ csrf_field() }}
										<input type="text" class="d-none" name="program_id"  value="{{$programID}}">
										@if(count($participants) === 0 )
										<tr class="p-0">
											<td colspan="3"  class="p-0">
												<div class="" id="alertMassege">
													<ul style="list-style-type:none" class="p-0 m-0">
														<li class="rounded p-4 my-3  success alert-success text-center"  style="font-size: 25px !important;">
															د ټولو ګډونالو حاضري سیسټم ته داخل کړل سوی دی!
														</li>
													</ul>
												</div>
											</td>
										</tr>
										@else
											@foreach($participants as $participant)
											
											<tr class="border col-12">
												<td class="border-left p-3 col-2" style="font-weight: bold;">
													{{$participant->name}} {{$participant->last_name}}
												</td>
												<td class="text-center p-1 border-left ">
													<input class="form-control text-center col-11 m-auto" type="number" placeholder="سوبتیا" name="presence[{{$loop->index}}]" value="{{old('presence[0]')}}"> 
												</td>
												<td class="text-center p-1 border-left ">
													<input class="form-control text-center col-11 m-auto" type="number" placeholder="ناسوبتیا" name="absence[{{$loop->index}}]"> 
												</td>
												<td class="d-none">
													<input type="text" class="d-none" name="participant_id[{{$loop->index}}]" id="" value="{{$participant->id}}">
												</td>
											</tr>
											@endforeach
											<tr>
												<td colspan="3" class="text-center"><button type="submit"
														class="btn btn-info btn-lg col-4">معلومات ثبت کړی</button></td>
											</tr>
										@endif

									</form>


								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->
		</div>
		<!-- Page Wrapper -->
@endsection
@section('custom-js')


		@if(Session::has('program_added'))
            <script>
            swal('ډېر ښه!',"{!! Session::get('program_added') !!}", "success", {
                button: "مننه",
            });
            </script>
        @endif
		@if(Session::has('attendance_not_added'))
            <script>
            swal('وبخښی !',"{!! Session::get('attendance_not_added') !!}", "warning", {
                button: "بیا ځلي معلومات داخل کړی",
            });
            </script>
        @endif

@endsection