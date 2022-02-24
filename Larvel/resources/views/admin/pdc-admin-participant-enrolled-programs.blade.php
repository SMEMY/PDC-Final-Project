@extends('master.master')

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
    h3{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 25px !important;
        }
        p{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
        }
        a{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
        }
        h4{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
        }
        p {
     max-width: 80%;
     white-space: nowrap;
     overflow: hidden;
     text-overflow: ellipsis;
}

@endsection

<!-- here we add dynamic content -->
@section('content')
<div class="page-wrapper">
    <div class="content container">
        <!-- Account Logo -->

        <!-- Page Header -->
        <div class="page-header mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">هغه پروګرامونه چي تاسو داخله پکښي کړېده</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">پروګرامونه</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            {{-- <nav class="col-md-12">
                <div class="nav nav-tabs " id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active col-md-12 text-center p-3 text-lg" id="nav-enroll-tab" data-toggle="tab"
                        href="#" role="tab" aria-controls="nav-enroll" aria-selected="true"
                        onclick="">هغه پروګرامونه چي تاسو داخله پکښي کړېده</a>
                    <a class="nav-item nav-link col-md-6 text-center p-2 text-lg" id="nav-unenroll-tab" data-toggle="tab"
                        href="#nav-unenroll" role="tab" aria-controls="nav-unenroll" aria-selected="false"
                        onclick="tabChanger()">هغه پروګرامونه چي تاسو غواړی داخله پکښي وکړی</a>
                </div>
            </nav> --}}
            <div class="tab-content col-md-12" id="nav-tabContent">

                <div class="row tab-pane fade  show active" id="nav-enroll" role="tabpanel"
                    aria-labelledby="nav-enroll-tab">
                @foreach($enrolledPrograms as $program)
                <div class="col-md-12">
                     <a class="job-list  border border-info" href="/admin/pdcProgramInfo/{{$program->id}}">
                        <div class="job-list-det">
                            <div class="job-list-desc">
                                <h3 class="job-list-title">{{$program->name}}</h3>
                                <br>
                                <h4 class="job-department"><strong>د پروګرام ډول: </strong>{{ $program->type }}</h4>
                                <br !important>
                                <p class="text-muted"><strong>د پروګرام معلومات: </strong>{{$program->program_description}}</p>
                            </div>

                        </div>
                        <div class="job-list-footer" style="background:#bde3fdc7;">
                            <ul>
                                <li class="mb-2 ml-3"><i class="fa fa-map-signs text-info"></i> <strong>ادرس: </strong>{{ $program->campus_name }}</li>
                                <li class="mb-2 ml-3"><i class="fa fa-money text-info"></i> <strong>د پروګرام فیس: </strong>{{ $program->fee }} {{ $program->fee_type }}</li>
                                <li class="mb-2 ml-3"><i class="fa fa-clock-o text-info"></i> <strong>د پروګرام دوام: </strong>{{ $program->days_duration }} ورځي</li>
                            </ul>
                        </div>
                    </a>
                </div>
                @endforeach
                </div>
                <div class="row tab-pane fade show " id="nav-unenroll" role="tabpanel"
                    aria-labelledby="nav-unenroll-tab">


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
                }
                else {
                    $('#nav-enroll-tab').addClass('bg-white');
                    $('#nav-unenroll-tab').removeClass('bg-white');
                }
            }
        </script>
  @endsection
