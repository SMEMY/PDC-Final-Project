@extends('mastercommon.masterTwo')

<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
    hahahaha
@endsection
<!-- here we add css custom style -->
@section('custom-css')

    li {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 16px !important;

    }
    i{
    color:white !important;
    }
    h3 {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 25px !important;
    }

    p {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    }

    a {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    }

    h4 {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    }

    p {
    max-width: 1030px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    }
    .mar{
    margin-top:10% !important;
    }
    nav{
    width: fit-content;
    margin: 0 auto;
    }

@endsection

<!-- here we add dynamic content -->
@section('content')
    <!-- Page Content -->
    <div class="content container">
        <!-- Account Logo -->
        {{-- <div class="account-logo mt-5">
            <a href="index.html"><img src="{{ asset('assets/img/logo2.png') }}" alt="Dreamguy's Technologies"></a>
        </div> --}}
        <!-- Page Header -->
        <div class="page-header mt-5 mar">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">د مسلکي پرمختیایي مرکز پروګرامونه</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">ګډونوال</a></li>
                        <li class="breadcrumb-item active">پروګرامونه</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <nav class="col-md-12">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active col-md-6 text-center p-2 text-lg" id="nav-enroll-tab"
                        data-toggle="tab" href="#nav-enroll" role="tab" aria-controls="nav-enroll" aria-selected="true"
                        onclick="tabChanger()">هغه پروګرامونه چي تاسو داخله پکښي کړېده</a>
                    <a class="nav-item nav-link col-md-6 text-center p-2 text-lg" id="nav-unenroll-tab" data-toggle="tab"
                        href="#nav-unenroll" role="tab" aria-controls="nav-unenroll" aria-selected="false"
                        onclick="tabChanger()">هغه پروګرامونه چي تاسو غواړی داخله پکښي وکړی</a>
                </div>
            </nav>
            <div class="tab-content col-md-12" id="nav-tabContent">

                <div class="row tab-pane fade  show active" id="nav-enroll" role="tabpanel"
                    aria-labelledby="nav-enroll-tab">
                    @foreach ($enrolledPrograms as $program)
                        <form action="/user/enrolledPdcProgramInfo/{{ $program->program_id }}" method="get"
                            id="my_form{{ $program->program_id }}">
                            <input type="hidden" name="role_id" id="" value="{{ $program->role_id }}">

                            {{-- <input type="text" name="role_id{{ $program->program_id }}" id=""
                           value="{{ $program->program_id }}"> --}}
                            <div class="col-md-12">
                                <a class="job-list  border border-info" href="#" href="javascript:{}"
                                    onclick="document.getElementById('my_form{{ $program->program_id }}').submit();">
                                    <div class="job-list-det">
                                        <div class="job-list-desc">
                                            <h3 class="job-list-title">{{ $program->name }}</h3>
                                            <br>
                                            <h4 class="job-department"><strong>د پروګرام ډول:
                                                </strong>{{ $program->type }}</h4>
                                            <br !important>
                                            <p class="text-muted"><strong>د پروګرام معلومات:
                                                </strong>{{ $program->program_description }}</p>
                                        </div>

                                    </div>
                                    <div class="job-list-footer" style="background:#bde3fdc7;">
                                        <ul>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-map-signs text-info"></i>
                                                <strong>ادرس: </strong>{{ $program->campus_name }}
                                            </li>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-money text-info"></i> <strong>
                                                    فیس: </strong>{{ $program->fee }} {{ $program->fee_type }}
                                            </li>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-calendar text-info"></i><strong>
                                                    نېټه:
                                                </strong>{{ date('d - m - Y ', strtotime($program->start_date)) }}
                                            </li>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-clock-o text-info"></i> <strong>
                                                    دوام: </strong>{{ $program->days_duration }} ورځي</li>
                                            @if ($program->start_date <= Carbon\Carbon::today() && $program->end_date >= Carbon\Carbon::today())
                                                <li class="ml-2 text-dark d-inline-block p-2 rounded"
                                                    style="background: #ffffff !important;"><i
                                                        class="fa fa-unlock text-info"></i>
                                                    <strong>حالت:
                                                    </strong> جاري
                                                </li>
                                            @elseif(Carbon\Carbon::today() < $program->start_date)
                                                <li class="ml-2 text-dark d-inline-block p-2 rounded"
                                                    style="background: #ffffff !important;"><i
                                                        class="fa fa-lock text-info"></i>
                                                    <strong>حالت:
                                                    </strong>راتلونکی
                                                </li>
                                            @else
                                                <li class="ml-2 text-dark d-inline-block p-2 rounded"
                                                    style="background: #ffffff !important;"><i
                                                        class="fa fa-lock text-info"></i>
                                                    <strong>حالت:
                                                    </strong>ختم
                                                </li>
                                            @endif
                                            @if ($program->role_id == 3)
                                                <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                    style="background: #345aff !important; color:#FFFFff !important"><i
                                                        class="fa fa-user-o text-success"></i> <strong>
                                                        رول: </strong>ګډونوال</li>
                                            @else
                                                <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                    style="background: #345aff !important; color:#FFFFff !important"><i
                                                        class="fa fa-user-o text-success"></i> <strong>
                                                        رول: </strong>تسهیلونکی</li>
                                            @endif

                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </form>
                        {{-- <form action="/user/enrolledPdcProgramInfo/{{ $program->id }}" method="get" id="my_form1">
                            <input type="hidden" name="role_id" id="" value="{{ $program->role_id }}">
                            <div class="col-md-12">
                                <a class="job-list  border border-info" href="#" href="javascript:{}"
                                    onclick="document.getElementById('my_form1').submit();">
                                    <div class="job-list-det">
                                        <div class="job-list-desc">
                                            <h3 class="job-list-title">{{ $program->name }}</h3>
                                            <br>
                                            <h4 class="job-department"><strong>د پروګرام ډول:
                                                </strong>{{ $program->type }}</h4>
                                            <br !important>
                                            <p class="text-muted"><strong>د پروګرام معلومات:
                                                </strong>{{ $program->program_description }}</p>
                                        </div>

                                    </div>
                                    <div class="job-list-footer" style="background:#bde3fdc7;">
                                        <ul>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-map-signs text-info"></i>
                                                <strong>ادرس: </strong>{{ $program->campus_name }}
                                            </li>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-money text-info"></i> <strong>
                                                    فیس: </strong>{{ $program->fee }} {{ $program->fee_type }}
                                            </li>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-calendar text-info"></i><strong>
                                                    نېټه:
                                                </strong>{{ date('d - m - Y ', strtotime($program->start_date)) }}
                                            </li>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-clock-o text-info"></i> <strong>
                                                    دوام: </strong>{{ $program->days_duration }} ورځي</li>
                                            @if ($program->start_date <= Carbon\Carbon::today() && $program->end_date >= Carbon\Carbon::today())
                                                <li class="ml-2 text-dark d-inline-block p-2 rounded"
                                                    style="background: #ffffff !important;"><i
                                                        class="fa fa-unlock text-info"></i>
                                                    <strong>حالت:
                                                    </strong> جاري
                                                </li>
                                            @elseif(Carbon\Carbon::today() < $program->start_date)
                                                <li class="ml-2 text-dark d-inline-block p-2 rounded"
                                                    style="background: #ffffff !important;"><i
                                                        class="fa fa-lock text-info"></i>
                                                    <strong>حالت:
                                                    </strong>راتلونکی
                                                </li>
                                            @else
                                                <li class="ml-2 text-dark d-inline-block p-2 rounded"
                                                    style="background: #ffffff !important;"><i
                                                        class="fa fa-lock text-info"></i>
                                                    <strong>حالت:
                                                    </strong>ختم
                                                </li>
                                            @endif
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #345aff !important; color:#FFFFff !important"><i
                                                    class="fa fa-user-o text-success"></i> <strong>
                                                    رول: </strong>تسهیلونکی</li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </form> --}}
                        {{-- <div class="col-md-12">
                                <a class="job-list  border border-info"
                                    href="/user/enrolledPdcProgramInfo/{{ $program->id }}">
                                    <div class="job-list-det">
                                        <div class="job-list-desc">
                                            <h3 class="job-list-title">{{ $program->name }}</h3>
                                            <br>
                                            <h4 class="job-department"><strong>د پروګرام ډول:
                                                </strong>{{ $program->type }}</h4>
                                            <br !important>
                                            <p class="text-muted"><strong>د پروګرام معلومات:
                                                </strong>{{ $program->program_description }}</p>
                                        </div>

                                    </div>
                                    <div class="job-list-footer" style="background:#bde3fdc7;">
                                        <ul>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-map-signs text-info"></i>
                                                <strong>ادرس: </strong>{{ $program->campus_name }}
                                            </li>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-money text-info"></i> <strong>
                                                    فیس: </strong>{{ $program->fee }} {{ $program->fee_type }}
                                            </li>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-calendar text-info"></i><strong>
                                                    نېټه:
                                                </strong>{{ date('d - m - Y ', strtotime($program->start_date)) }} </li>
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #ffffff !important;"><i
                                                    class="fa fa-clock-o text-info"></i> <strong>
                                                    دوام: </strong>{{ $program->days_duration }} ورځي</li>
                                            @if ($program->start_date <= Carbon\Carbon::today() && $program->end_date >= Carbon\Carbon::today())
                                                <li class="ml-2 text-dark d-inline-block p-2 rounded"
                                                    style="background: #ffffff !important;"><i
                                                        class="fa fa-unlock text-info"></i>
                                                    <strong>حالت:
                                                    </strong> جاري
                                                </li>
                                            @elseif(Carbon\Carbon::today() < $program->start_date)
                                                <li class="ml-2 text-dark d-inline-block p-2 rounded"
                                                    style="background: #ffffff !important;"><i
                                                        class="fa fa-lock text-info"></i>
                                                    <strong>حالت:
                                                    </strong>راتلونکی
                                                </li>
                                            @else
                                                <li class="ml-2 text-dark d-inline-block p-2 rounded"
                                                    style="background: #ffffff !important;"><i
                                                        class="fa fa-lock text-info"></i>
                                                    <strong>حالت:
                                                    </strong>ختم
                                                </li>
                                            @endif
                                            <li class="mb-2 ml-3 text-dark p-2 rounded"
                                                style="background: #345aff !important; color:#FFFFff !important"><i
                                                    class="fa fa-user-o text-success"></i> <strong>
                                                    رول: </strong>تسهیلونکی</li>
                                        </ul>
                                    </div>
                                </a>
                            </div> --}}
                        {{-- @endif --}}
                    @endforeach
                    {{-- {{ $enrolledPrograms->links() }} --}}
                </div>
                <div class="row tab-pane fade show " id="nav-unenroll" role="tabpanel" aria-labelledby="nav-unenroll-tab">
                    @foreach ($notEnrolledPrograms as $program)
                        <div class="col-md-12">
                            <a class="job-list  border border-info" href="/user/programs/{{ $program->id }}">
                                <div class="job-list-det">
                                    <div class="job-list-desc">
                                        <h3 class="job-list-title">{{ $program->name }}</h3>
                                        <br>
                                        <h4 class="job-department"><strong>د پروګرام ډول:
                                            </strong>{{ $program->type }}</h4>
                                        <br !important>
                                        <p class="text-muted"><strong>د پروګرام معلومات:
                                            </strong>{{ $program->program_description }}</p>
                                    </div>

                                </div>
                                <div class="job-list-footer" style="background:#ddedef;">
                                    <ul>
                                        <li class="mb-2 ml-3"><i class="fa fa-map-signs text-info"></i>
                                            <strong>ادرس: </strong>{{ $program->campus_name }}
                                        </li>
                                        <li class="mb-2 ml-3"><i class="fa fa-money text-info"></i> <strong>د
                                                پروګرام فیس: </strong>{{ $program->fee }} {{ $program->fee_type }}
                                        </li>
                                        <li class="mb-2 ml-3"><i class="fa fa-calendar text-info"></i><strong>د جوړېدو
                                                نېټه:
                                            </strong>{{ date('d - m - Y ', strtotime($program->start_date)) }} </li>
                                        <li class="mb-2 ml-3"><i class="fa fa-clock-o text-info"></i> <strong>د
                                                پروګرام دوام: </strong>{{ $program->days_duration }} ورځي</li>
                                        @if ($program->start_date <= Carbon\Carbon::today() && $program->end_date >= Carbon\Carbon::today())
                                            <li class="ml-2 text-dark d-inline-block"><i class="fa fa-unlock text-info"></i>
                                                <strong>حالت:
                                                </strong> جاري
                                            </li>
                                        @elseif(Carbon\Carbon::today() < $program->start_date)
                                            <li class="ml-2 text-dark d-inline-block"><i class="fa fa-lock text-info"></i>
                                                <strong>حالت:
                                                </strong>راتلونکی
                                            </li>
                                        @else
                                            <li class="ml-2 text-dark d-inline-block"><i class="fa fa-lock text-info"></i>
                                                <strong>حالت:
                                                </strong>ختم
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    {{ $notEnrolledPrograms->links() }}

                </div>
            </div>
        </div>
        <!-- /Account Logo -->
    </div>



@endsection

@section('custom-js')
    <script>
        function tabChanger() {
            if ($('#nav-enroll-tab').hasClass('active')) {
                $('#nav-unenroll-tab').addClass('bg-white');
                $('#nav-enroll-tab').removeClass('bg-white');
            } else {
                $('#nav-enroll-tab').addClass('bg-white');
                $('#nav-unenroll-tab').removeClass('bg-white');
            }
        }
    </script>

@endsection
