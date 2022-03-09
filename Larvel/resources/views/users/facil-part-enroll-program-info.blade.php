@extends('mastercommon.master')

<!-- @section('page-title', 'hahahahah')
@section('page-title')
                                                                                                                                                                                            hahahaha
@endsection
<!-- here we add css custom style -->
@section('custom-css') -->
    *{
    transition: all 0.5s;

    }
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
    a{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

    }
    #date, #address{
    transition: all 0.3s;

    }
    #date:hover, #address:hover{
    transform: scale(1.04);
    transition: all 0.4s;
    }
    #alertMassege ul li
    {
    transition: all 2s !important;
    }
@endsection

<!-- here we add dynamic content -->
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <a href="/user/userEnroledPrograms/{{ auth()->user()->id }}" class="btn btn-primary apply-btn mt-5" id="back"><i
                class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <!-- Account Logo -->

        <div class="content">
            <!-- /Account Logo -->
            <div class="row col-md-12">
                @if ($errors->any())
                    <div class="mb-2 col-md-12" id="alertMassege">
                        <ul style="list-style-type:none" class="p-0 m-0">
                            @foreach ($errors->all() as $error)
                                <li class="rounded p-2 m-1 alert alert-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-7">
                    <div class="job-info job-widget">
                        <h4 class="m-auto " style="width: fit-content"><i class="pr-2 fa fa-"></i>د اړونده پروګرام
                            په اړه معلومات</h4>
                        <br>
                        <br>
                        <input type="hidden" name="role_id" id="" value="{{ $programs[0]->role_id }}">
                        <ul class="job-post-det col-md-12">
                            <li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام نوم: : <span
                                    class="text-blue">{{ $programs[0]->name }}</span></li>

                            <li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام ډول: <span
                                    class="text-blue">{{ $programs[0]->type }}</span></li>

                            <li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام تسهیلونکی: <span
                                    class="text-blue">{{ $programs[0]->facilitator }}</span></li>
                            <li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام سپانسر: <span
                                    class="text-blue">{{ $programs[0]->sponsor }}</span></li>
                            <li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام همایه کوونکی: <span
                                    class="text-blue">{{ $programs[0]->supporter }}</span></li>

                            <li class="col-md-12"><i class="pr-2 fa fa-user-o"></i>د پروګرام تنظیمونکی: <span
                                    class="text-blue">{{ $programs[0]->manager }}</span></li>

                            <li class="col-md-12"><i class="pr-2 fa fa-money"></i>د پروګرام بودیجه: <span
                                    class="text-blue">{{ $programs[0]->fund }}</span></li>
                            <li class="col-md-12"><i class="pr-2 fa fa-eye"></i>په پروګرام کي د ګډونوالو شمېر: <span
                                    class="text-blue">{{ $programs[0]->participant_amount }}</span></li>
                            <li class="col-md-12"><i class="pr-2 fa fa-eye"></i>د پروګرام فیس: <span
                                    class="text-blue">{{ $programs[0]->fee }}</span></li>

                        </ul>
                    </div>
                    <div class="job-content job-widget">

                        <div class="job-desc-title">
                            <h4>د اړونده پروګرام په اړه معلومات</h4>
                        </div>
                        <div class="job-description">
                            <p> {{ $programs[0]->program_description }} </p>
                        </div>
                        <div class="job-desc-title">
                            <h4>د پروګرام سهولتونه</h4>
                        </div>
                        <div class="job-description">
                            <ul class="square-list">
                                @if (count($facilities) != 0)

                                    @foreach ($facilities as $facil)
                                        <li> {{ $facil->facility }} </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                        <div class="job-desc-title">
                            <h4>د پروګرام پایلي: </h4>
                        </div>
                        <div class="job-description">
                            <ul class="square-list">

                                @if (count($results))
                                    @foreach ($results as $result)
                                        <li> {{ $result->result }} </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="job-desc-title">
                            <h4>د پروګرام ارزوني: </h4>
                        </div>
                        <div class="job-description">
                            <ul class="square-list">

                                @if (count($evaluations))
                                    @foreach ($evaluations as $evaluation)
                                        <li> {{ $evaluation->evaluation }} </li>
                                    @endforeach

                                @endif
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="col-md-5">
                    <div class="job-det-info job-widget" style="border-radius: 5px; box-shadow:1px 0px 5px 0px #00beff"
                        id="date">
                        <h4 class="account-title">نېټه</h4>
                        <br>
                        <ul class="job-post-det col-md-12">
                            <li class="col-md-12"><i class="pr-2 fa fa-calendar"></i><strong>د شروع نېټه:
                                </strong><span
                                    class="text-blue">{{ date('d - m - Y ', strtotime($programs[0]->start_date)) }}</span>
                            </li>
                            <li class="col-md-12"><i class="pr-2 fa fa-calendar"></i><strong>د ختمېدو نېته:
                                </strong><span
                                    class="text-blue">{{ date('d - m - Y ', strtotime($programs[0]->end_date)) }}</span>
                            </li>
                            <li class="col-md-12"><i class="pr-2 fa fa-clock-o"></i><strong>د شروع کېدو وخت:
                                </strong><span class="text-blue"
                                    dir="ltr">{{ date('H:i A', strtotime($programs[0]->start_date)) }}</span></li>
                            <li class="col-md-12"><i class="pr-2 fa fa-clock-o"></i><strong>د ختمېدو وخت:
                                </strong><span class="text-blue"
                                    dir="ltr">{{ date('H:i A', strtotime($programs[0]->start_date)) }}</span>
                            </li>

                        </ul>
                        <!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
                    </div>
                    <div class="job-det-info job-widget" style=" box-shadow:1px 0px 5px 0px #00beff; border-radius: 5px; "
                        id="address">
                        <h4 class="account-title">پته </h4>
                        <br>
                        <ul class="job-post-det col-md-12">
                            <li class="col-md-12"><i class="pr-2 fa fa-university"></i><strong>د ساحې نوم:
                                </strong><span class="text-blue">{{ $programs[0]->campus_name }}</span></li>
                            <li class="col-md-12"><i class="pr-2 fa fa-building"></i><strong> د ودانۍ نوم:
                                </strong><span class="text-blue">{{ $programs[0]->block_name }}</span></li>
                            <li class="col-md-12"><i class="pr-2 fa fa-calculator"></i><strong> د ودانۍ شمېره:
                                </strong><span class="text-blue">{{ $programs[0]->block_number }}</span></li>
                            <li class="col-md-12"><i class="pr-2 fa fa-calculator"></i><strong> د صالون شمېره:
                                </strong><span class="text-blue">{{ $programs[0]->room_number }}</span></li>

                        </ul>
                        <!-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">Enroll</a> -->
                    </div>

                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

<script>
    const myTimeout = setTimeout(myGreeting, 3000);

    function myGreeting() {
        console.log("sadflkjsdf");
        $('#alertMassege').addClass('d-none');
        clearTimeout(myTimeout);
    }
</script>

@if (Session::has('null_form'))
    <script>
        swal('وبخښئ!', "{!! Session::get('null_form') !!}", "warning", {
            button: "وروسته کوښښ وکړئ",
        });
    </script>
@endif
@if (Session::has('program_materials_added'))
    <script>
        swal('ډېر ښه!', "{!! Session::get('program_materials_added') !!}", "success", {
            button: "مننه",
        });
    </script>
@endif

@if (Session::has('warn'))
    <script>
        swal('وبخښئ!', "{!! Session::get('warn') !!}", "warning", {
            button: "وروسته کوښښ وکړئ",
        });
    </script>
@endif
@if (Session::has('success_questionnaire'))
    <script>
        swal('ډېر ښه!', "{!! Session::get('success_questionnaire') !!}", "success", {
            button: "مننه",
        });
    </script>
@endif
@section('cutom-js')
    {{-- <script src="{{ asset('assets/sweet-alert/sweetalert.min.js') }}"></script> --}}

@endsection
