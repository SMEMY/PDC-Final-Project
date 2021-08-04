@extends('master.master')
@section('custom-css')
label {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;

	}
    h3{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            

        }
        input{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
		}
        select{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;

			height: 44px  !important; 
			border-radius: 3px  !important; 
			outline: none;
			background-color:#f0fcff  !important; 
			border:1px solid #e3e3e3  !important;
			
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
			background: #f0fcff !important;
		}
		textarea{
			background: #f0fcff !important;

		}
		#for{
			transition:all 0.3s;
		}
		#alertMassege{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }
        .swal-modal div{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 20px !important;
        }
		h4{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 30px !important;
		}
		.swal-text{
			text-align: right;

		}
		.swal-modal{
			padding: 20px 24px;
    		width: 600px;
		}
		#answers>div{
			width:100px;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
			border-radius: 10px;
		}
		#answers div{
            font-size: 20px !important;
			text-shadow: 0px 0px 3px white;
		}
		#answers div div{
			<!-- background: #71caffba!important; -->
		}
		h5{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

		}
@endsection



@section('content')
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			<!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
			<div class="container ">

				<!-- Account Logo -->
				<!-- <div class="account-logo mt-5" style="width: 1150px;">
					<a href="index.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
				</div> -->
				<!-- /Account Logo -->

				<div class="account-box" style="width: 1100px; margin-top: 75px; margin-right:140px;" id="for">
					<h4 class="p-3 bg-info d-block text-center rounded" style="font-weight:bold"><i class="pr-2 fa fa-"></i>د اړونده پروګرام د پوښتنلیک دځوابونو راپور</h4>
					<div class="account-wrapper mt-3" style="">
						<h5 class="col-md-12 p-3 d-block text-center rounded" style="background: #0000001a; font-size:20px">د پوښتنلیک سوالونه</h5>
						<div class="row p-3">
							@for($index = 0; $index< count($questions); $index++)
							<div class="col-md-6 border p-3 rounded">
								<h3 class=" p-3 rounded " style="background: #0000001a; font-size:20px"><span class="text-danger ">{{$index+1}}- سوال:  </span> {{$questions[$index]->question}}</h3>
							
								<div class="row  text-center" id="answers">
									<div class="col-md-3 my-2">
										<div class="bg-info  rounded text-center" style="background:#009efb73 !important;">
											<div class="col-md-12">ښه</div>
											<div class="col-md-12 ">{{$first[$index]}}</div>
										</div>
									</div>
									<div class="col-md-3 my-2">
										<div class=" bg-info rounded text-center"  style="background:#009efb73 !important">
											<div class="col-md-12">ډېر ښه</div>
											<div class="col-md-12 ">{{$second[$index]}}</div>
										</div>
									</div>
									<div class="col-md-3 my-2">
										<div class=" bg-info rounded text-center"  style="background:#009efb73 !important;">
											<div class="col-md-12">متوسط</div>
											<div class="col-md-12">{{$third[$index]}}</div>
										</div>
									</div>
									<div class="col-md-3 my-2">
										<div class=" bg-info rounded text-center"  style="background:#009efb73 !important;">
											<div class="col-md-12">بد</div>
											<div class="col-md-12 ">{{$fourth[$index]}}</div>
										</div>
									</div>
								
								</div>
								<!-- <div id="container" class="m-3" style="width:80%;">
									<canvas id="myChart" width="200" height="200"></canvas>
								</div> -->
							</div>
							@endfor
						</div>
						<h5 class="col-md-12 p-3 d-block text-center rounded my-3" style="background: #0000001a; font-size:20px">د پوښتنلیک نظرونه</h5>
						<div class="row px-3" style="height: 300px !important;  overflow-y: scroll;">
						@for($index = 0; $index< count($comments); $index++)
							<!-- <div class="col-md-6 p-2"> -->
								<div class="col-md-12 my-2 rounded p-3 "  style="background: #71caff5c !important;font-size:18px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;">
									{{$index+1}}- {{$comments[$index]->comment}}
								</div>
							<!-- </div> -->
						@endfor
						</div>
						<!-- <div class="row">
							<div class="col-md-4">
								<canvas id="myChart" width="200" height="200"></canvas>
							</div>
							<div class="col-md-4">
								<canvas id="myChart1" width="200" height="200"></canvas>
							</div>
							<div class="col-md-4">
								<canvas id="myChart2" width="200" height="200"></canvas>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->
@endsection




@section('custom-js')

		@if(Session::has('member_added'))
            <script>
            swal('ډېر ښه!',"{!! Session::get('member_added') !!}", "success", {
                button: "مننه",
            });
            </script>
        @endif
		@if(Session::has('password_confirm'))
            <script>
            swal('وبخښئ!',"{!! Session::get('password_confirm') !!}", "warning", {
                button: "بیا ځلي کتنه وکړئ",
            });
            </script>
        @endif
<script>
		// var ctx = document.getElementById('myChart').getContext('2d');
		// var myChart = new Chart(ctx, {
		// 	type: 'bar',
		// 	data: {
		// 		labels: ['ښه', 'ډېر ښه', 'متوسط', 'بد'],
		// 		datasets: [{
		// 			label: '# of Votes',
		// 			data: 
		// 			backgroundColor: [
		// 				'rgba(255, 99, 132, 0.2)',
		// 				'rgba(54, 162, 235, 0.2)',
		// 				'rgba(255, 206, 86, 0.2)',
		// 				'rgba(75, 192, 192, 0.2)',
		// 			],
		// 			borderColor: [
		// 				'rgba(255, 99, 132, 1)',
		// 				'rgba(54, 162, 235, 1)',
		// 				'rgba(255, 206, 86, 1)',
		// 				'rgba(75, 192, 192, 1)',
		// 			],
		// 			borderWidth: 1
		// 		}]
		// 	},
		// 	options: {
		// 		scales: {
		// 			y: {
		// 				beginAtZero: true
		// 			}
		// 		}
		// 	}
		// });
		$( "#toggle_btn" ).click(function() {
            if($('#for').css('width') === '1100px' && $('#for').css('margin-right') === '140px')
            {
                console.log("alkfjlakfd");
                $("#for").css("width", "1200px");
                $("#for").css("margin-right", "0px");
            }
            else{
                $("#for").css("width", "1100px");
                $("#for").css("margin-right", "140px");
            }
        });
</script>
@endsection