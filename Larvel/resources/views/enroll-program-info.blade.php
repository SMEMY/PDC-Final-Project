@extends('mastercommon.master')

<!-- @section('page-title', 'hahahahah')
@section('page-title')
hahahaha
@endsection
<!-- here we add css custom style -->
@section('custom-css') -->
label {
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
		}
        h4{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

        }
        li{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

        }
        h3{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

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
@endsection

<!-- here we add dynamic content -->
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
        <!-- Account Logo -->
        <div class="account-logo my-5">
            <a href="index.html"><img src="{{asset('assets/img/logo2.png')}}" alt="Dreamguy's Technologies"></a>
        </div>
        <!-- /Account Logo -->
        <div class="row col-md-12">
            <div class="col-md-8">
                <div class="job-info job-widget">
                    <h3 class="job-title">د پروګرام نوم: {{ $programs->name }}</h3>
                    <span class="job-dept">د پروګرام ډول: {{ $programs->type }}</span>
                    <ul class="job-post-det col-md-12">
                        <li class="col-md-12"><i class="pr-2 fa fa-calendar"></i>د شروع کېدو وخت:<span class="text-blue">{{ $programs->year }}/ {{ $programs->month }}/ {{ $programs->start_day }}</span></li>
                        <li class="col-md-12"><i class="pr-2 fa fa-calendar"></i>د ختمېدو وخت: <span class="text-blue"> {{ $programs->year }}/ {{ $programs->month }}/ {{ $programs->end_day  }} </span></li>
                        <li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام تسهیلونکی: <span
                                class="text-blue">{{ null }}</span></li>
                        <li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام سپانسر: <span
                                class="text-blue">{{ $programs->sponsor }}</span></li>
                        <li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام همایه کوونکی: <span
                                class="text-blue">{{ $programs->supporter }}</span></li>

                        <li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام تنظیمونکی: <span
                                class="text-blue">{{ $programs->manager }}</span></li>

                        <li class="col-md-12"><i class="pr-2 fa fa-money"></i>د پروګرام بودیجه: <span
                                class="text-blue">{{ $programs->fund }}</span></li>
                        <li class="col-md-12"><i class="pr-2 fa fa-eye"></i>په پروګرام کي د ګډونوالو شمېر: <span
                                class="text-blue">{{$programs->participant_amount}}</span></li>
                                <li class="col-md-12"><i class="pr-2 fa fa-eye"></i>د پروګرام فیس: <span
                                class="text-blue">{{$programs->fee}}</span></li>
                    </ul>
                </div>
                <div class="job-content job-widget">
                    
                    <div class="job-desc-title">
                        <h4>د اړونده پروګرام په اړه معلومات</h4>
                    </div>
                    <div class="job-description">
                        <p> {{ $programs->program_description }} </p>
                    </div>
                    <div class="job-desc-title">
                        <h4>د پروګرام سهولتونه</h4>
                    </div>
                    <div class="job-description">
                        <ul class="square-list">
                    

                            @foreach( $programs->getFacilities as $facility)
                            <li> {{ $facility->facility }} </li>
                            
                            @endforeach
                        </ul>
                    </div>
                    <div class="job-desc-title">
                        <h4>د پروګرام  پایلي: </h4>
                    </div>
                    <div class="job-description">
                        <ul class="square-list">
                    

                            @foreach( $programs->getResults as $result)
                            <li> {{ $result->result }} </li>
                            
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-4 ">
                <div class="job-det-info job-widget">
                    <h3 class="account-title">نور معلومات</h3>
                    <div class="info-list">
                        <span><i class="fa fa-bar-chart"></i></span>
                        <h5>حالت</h5>
                        <p>شروع </p>
                    </div>
                    <div class="info-list">
                        <span><i class="fa fa-ticket"></i></span>
                        <h5>تصدیق پاڼه</h5>
                        <p>هو</p>
                    </div>
                    <div class="info-list">
                        <span><i class="fa fa-map-signs"></i></span>
                        <h5>موقېعت</h5>
                        <p>کمپس:  {{$programs->campus_name}}</p>
                        <p>تعمیر: {{$programs->block_name}}</p>
                        <p>د اطاق نمبر: {{$programs->room_number}}</p>
                    </div>
                    <div class="info-list">
                        <span><i class="fa fa-phone"></i></span>
                        <h5>ټلیفون</h5>

                        <p> 070-030-1212
                        </p>
                    </div>
                    <div class="info-list">
                        <span><i class="fa fa-envelope-square"></i></span>
                        <h5>برېښنالیک</h5>

                        <p> PDC@gmail.com</p>
                    </div>
                    <div class="info-list text-center">
                        <a class="app-ends" href="#"> {{date('d-m-Y') }} </a>
                    </div>
                    <br>
                    <!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

</div>
<!-- /Page Wrapper -->
@endsection

@section('cutom-js')

@endsection