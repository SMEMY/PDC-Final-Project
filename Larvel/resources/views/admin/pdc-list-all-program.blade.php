@extends('master.master')

<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
    hahahaha
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
    nav{
    width: fit-content;
    margin: 0 auto;
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
                        <h3 class="page-title">????????????????????</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">?????????? ????????</a></li>
                            <li class="breadcrumb-item active">????????????????????</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="/admin/addPdcProgram" class="btn add-btn px-4"><i class="fa fa-plus"></i>?????????????? ??????
                            ??????</a>
                        <!-- <div class="view-icons">
                                    <a href="projects.html" class="grid-view btn btn-link active"><i
                                            class="fa fa-th"></i></a>
                                    <a href="project-list.html" class="list-view btn btn-link"><i
                                            class="fa fa-bars"></i></a>
                                </div> -->
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            @if (count($programs) !== 0)
                <!-- Search Filter -->
                <form action="/admin/searchPdcProgram" method="POST">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="mb-5" id="alertMassege">
                            <ul style="list-style-type:none" class="p-0 m-0">
                                @foreach ($errors->all() as $error)
                                    <li class="rounded p-2 m-1 alert alert-danger">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row filter-row mb-5" id="search_parts">
                        <div class="col-sm-6 col-md-5" id="search_input">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name="search_content" disabled
                                    id="searchInput" onclick="audio.play()">
                                <label class="focus-label">?????????????????? ??????????</label>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-5" id="search_content" onclick="audio.play()">
                            <div class="form-group form-focus select-focus" onclick="audio.play()">
                                <select class="custom-select p-2 h-100 searchInput" name="search_type">
                                    <a href="/facilitatorList">
                                        <option selected value="">?? ?????????? ???????? ???????????? ??????!</option>
                                    </a>
                                    <option value="name">??????</option>
                                    <option value="type">?? ?????????????? ??????</option>
                                    <option value="sponsor">?? ?????????????? ?????????? ????????????</option>
                                    <option value="supporter">?? ?????????????? ??????????</option>
                                    <option value="manager">?? ?????????????? ??????????????????</option>
                                    <option value="year">?? ?????????????? ??????</option>
                                    <option value="month">?? ?????????????? ??????????</option>
                                    <!-- <option>Delta Infotech</option> -->
                                </select>
                                <!-- <label class="focus-label">?????????????? ???????????? ??????</label> -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <!-- <a href="#" class="">?????????? </a> -->
                            <button type="submit" class="btn btn-success btn-block h3 p-1"
                                onclick="audio.play()">??????????</button>
                        </div>
                    </div>
                </form>
                <!-- Search Filter -->
                <div class="row p-3">
                    @foreach ($programs as $program)
                        <div class="col-md-6 p-1" onclick="audio.play()">

                            <div class="card col-md-12 p-1" id="program">
                                <div class="dropdown dropdown-action profile-action" id="edit">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right" style="z-index: 100;">
                                        <a class="dropdown-item"
                                            href="/admin/memberRegisterationTwo/{{ $program->id }}"><i
                                                class="fa fa-pencil m-r-5"></i>?????????????? ??????????</a>
                                        <a class="dropdown-item" href="/admin/pdcProgramList/{{ $program->id }}/edit"><i
                                                class="fa fa-pencil m-r-5"></i>?????????????? ?????????? ??????</a>
                                        <a class="dropdown-item" href="/admin/pdcProgramList/{{ $program->id }}"
                                            data-toggle="modal" data-target="#delete_project" id="path"
                                            onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i> ???? ???????? ????
                                            ????????</a>
                                    </div>
                                </div>
                                <div class="card-body p-0" style="border-radius: 5px !important;">
                                    <a href="/admin/pdcProgramInfo/{{ $program->id }}">
                                        <div class="job-list-desc" style="padding: 15px 15px 5px 15px">
                                            <h3 class="job-list-title text-center" style="font-size:18px">
                                                {{ $program->name }} </h3>
                                            <br>
                                            <h4 class="job-department "><strong>?? ?????????????? ??????: </strong>
                                                {{ $program->type }} </h4>

                                            </h4>

                                        </div>

                                        <div class="job-list-footer p-0" id="foot"
                                            style="border-radius:0px 5px 5px 0px !important;">
                                            <ul class="m-0"
                                                style="padding:5px 10px; background: linear-gradient(to left, #88e5ff 0%, #3687ff8c 120%); border-radius: 0 0 4px 4px;">
                                                <li class="ml-1 text-dark d-inline-block"><i
                                                        class="fa fa-map-signs text-danger"></i> <strong>????????:
                                                    </strong>{{ $program->campus_name }}</li>
                                                <!-- <br> -->
                                                <li class="ml-2 text-dark d-inline-block"><i
                                                        class="fa fa-calendar text-danger"></i>
                                                    <strong>????????:</strong>{{ date(' Y - m - d ', strtotime($program->start_date)) }}
                                                </li>
                                                <!-- <br> -->
                                                <li class="ml-2 text-dark d-inline-block"><i
                                                        class="fa fa-money text-danger"></i> <strong>??????:
                                                    </strong>{{ $program->fee }} {{ $program->fee_type }} </li>

                                                @if ($program->start_date <= Carbon\Carbon::today() &&  $program->end_date >= Carbon\Carbon::today())
                                                    <li class="ml-2 text-dark d-inline-block"><i
                                                            class="fa fa-unlock text-danger"></i> <strong>????????:
                                                        </strong> ????????</li>
                                                @elseif(Carbon\Carbon::today() < $program->start_date )
                                                    <li class="ml-2 text-dark d-inline-block"><i
                                                            class="fa fa-lock text-danger"></i> <strong>????????:
                                                        </strong>???????????????? </li>
                                                @else
                                                <li class="ml-2 text-dark d-inline-block"><i
                                                    class="fa fa-lock text-danger"></i> <strong>????????:
                                                </strong>?????? </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $programs->links() }}
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <tr class="p-0">
                            <td colspan="3" class="p-0">
                                <div class="" id="alertMassege">
                                    <ul style="list-style-type:none " class="p-0 mt-5">
                                        <li class="rounded p-5 my-3  success alert-success text-center"
                                            style="font-size: 35px !important;">
                                            ???????? ?????????????? ???? ?????????????? ???????? ?????????????????? ?????????????? ??????????????!
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </div>
                </div>
            @endif
        </div>
        <!-- /Page Content -->

        <!-- create program -->
        <div id="create_program" class="modal custom-modal fade mt-5" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document" style=" max-width: 1100px !important;">
                <div class="modal-content " style=" width: 1100px !important;">
                    <div class="modal-header">
                        <h3 class="account-title mb-5" style="font-size:35px !important; font-weight: bolder;">?? ??????????
                            ?????????????????? ???????? ?????????????? ?????? ????????</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/pdcProgramList" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>?? ?????????????? ??????</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>?? ?????????????? ??????</label>
                                        <select class="custom-select"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                            name="type">
                                            <option></option>

                                            <option value="????????????">????????????</option>
                                            <option value="??????????????">??????????????</option>
                                            <option value="??????????????">??????????????</option>
                                            <option value="??????????????">??????????????</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>?? ?????????????? ????????????</label>
                                        <!-- <div class="cal-icon"> -->
                                        <input class="form-control" type="text" name="sponsor">
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>?? ?????????????? ?????????? ????????????</label>
                                        <!-- <div class="cal-icon"> -->
                                        <input class="form-control" type="text" name="supporter">
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>?? ?????????????? ??????????????????</label>
                                        <input placeholder="" class="form-control" type="text" name="manager">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="">?? ?????????????? ????????????????</label>
                                        <input placeholder="" class="form-control" type="text" name="facilittator">

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="">?? ?????????????? ?? ???????????????? ??????????</label>
                                        <input placeholder="" class="form-control" type="text" name="info_mobile_number">

                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>?? ?????????????? ?? ???????? ???????? ??????</label>
                                        <input placeholder="" class="form-control" type="number"
                                            name="participant_amount">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>?? ?????????????? ????????????</label>
                                        <input placeholder="$" class="form-control" type="number" name="fund">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>?? ?????????????? ???????????? ???????? ????????</label>
                                        <select class="custom-select rankS"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                            name="fund_type">
                                            <option selected></option>
                                            <option value="????????????">????????????</option>
                                            <option value="????????">????????</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <h3 class="col-md-12 m-auto">?? ?????????????? ????????</h3> -->
                            </div>
                            <hr !important>
                            <div class="row">
                                <div class="col-md-12 rankS" id="rank">
                                    <div class="form-group">
                                        <label class="col-form-label">?????? ?????????????? ?? ?????? ?????????????????? ??????<span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select rankS"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                            name="fee_able">
                                            <option selected></option>
                                            <option value="1">????</option>
                                            <option value="0">????</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-12 d-none" id="fee">
                                    <div class="form-group">
                                        <label class="col-form-label">?? ?????????????? ??????<span
                                                class="text-danger">*</span></label>
                                        <input placeholder="$" class="form-control" type="number" name="fee">


                                    </div>
                                </div>
                                <div class="col-md-12 d-none" id="fee_type">
                                    <div class="form-group">
                                        <label class="col-form-label">?? ?????????????? ?? ?????? ???????? ????????<span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select rankS"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                            name="fee_type">
                                            <option selected></option>
                                            <option value="????????????">????????????</option>
                                            <option value="????????">????????</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <hr !important>
                            <div class="row my-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>?? ?????????????? ?? ?????????????? ???????? ????????</label>
                                        <input placeholder="" class="form-control" type="text" name="campus_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>?? ?????????????? ?? ?????????????? ???????? ?????????? ??????</label>
                                        <input placeholder="" class="form-control" type="text" name="block_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>?? ?????????????? ?? ?????????????? ???????? ?????????? ????????</label>
                                        <input placeholder="" class="form-control" type="number" name="block_number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>?? ?????????????? ?? ???????? ????????</label>
                                        <input placeholder="" class="form-control" type="number" name="room_number">
                                    </div>
                                </div>
                            </div>
                            <hr !important>
                            <div class="row my-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>?? ?????? ???????? ??????</label>
                                        <input placeholder="" class="form-control" type="number" name="year">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>?? ?????? ???????? ??????????</label>
                                        <input placeholder="" class="form-control" type="number" name="month">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>?? ?????? ???????? ??????</label>
                                        <input placeholder="" class="form-control" type="number" name="start_day">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>?? ?????? ???????? ??????</label>
                                        <input placeholder="" class="form-control" type="number" name="end_day">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>?? ?????????????? ?? ???????? ????????</label>
                                        <input placeholder="" class="form-control" type="number" name="days_duration">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>?????????? ???????? ????????</label>
                                        <input placeholder="" class="form-control" type="time" name="start_time">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>?? ?????? ???????? ????????</label>
                                        <input placeholder="" class="form-control" type="time" name="end_time">
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">
                                <div class="form-group col-md-12" id="facilities">
                                    <div class="form-group">
                                        <label>?? ?????????????? ????????????????</label>
                                        <input placeholder="1" class="form-control" type="text" name="facility[0]">
                                    </div>

                                </div>
                                <div class="form-group m-auto" id="ad">
                                    <button type="button" id="times" class="btn btn-info mx-auto rounded-circle d-none"
                                        style="font-size: 20px;" onclick="rmv()">&times;</button>
                                    <button type="button" class="btn btn-info mx-auto rounded-circle"
                                        style="font-size: 20px;;" onclick="afterText()">&plus;</button>
                                    <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                                </div>
                            </div>
                            <hr !important>

                            <div class="row mt-5">
                                <div class="form-group col-md-12" id="agendas">
                                    <div class="form-group">
                                        <label>?? ?????????????? ??????????</label>
                                        <input placeholder="1" class="form-control" type="text" name="agenda[0]">
                                    </div>

                                </div>
                                <div class="form-group m-auto">
                                    <button type="button" id="remove-agenda"
                                        class="btn btn-info mx-auto rounded-circle d-none" style="font-size: 20px;"
                                        onclick="removeAgenda()">&times;</button>
                                    <button type="button" class="btn btn-info mx-auto rounded-circle"
                                        style="font-size: 20px;;" onclick="addAgenda()">&plus;</button>
                                    <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                                </div>
                            </div>
                            <hr !important>


                            <!-- <hr !important>
                                            <div class="row " id="files">
                                                <div class=" col-md-6">
                                                    <div class="form-group custom-file ">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            onchange="nameShow(this)" name="filename[0]">
                                                        <label class="custom-file-label" for="customFile">?? ?????????????? ????????????
                                                            ????????
                                                            ???????????? ??????</label>
                                                    </div>
                                                </div>
                                                <div class=" col-md-6 mb-3" id="">
                                                    <div class="form-group">
                                                        <select class="custom-select"
                                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="filetype[0]">
                                                            <option selected></option>
                                                            <option value="????????????????????">????????????????????</option>
                                                            <option value="????????">????????</option>
                                                            <option value="????????">????????</option>
                                                        </select>

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="form-group m-auto ">
                                                    <button type="button" id="file-remover"
                                                        class="btn btn-info mx-auto rounded-circle d-none" style="font-size: 20px;"
                                                        onclick="removeFile()">&times;</button>
                                                    <button type="button" class="btn btn-info mx-auto rounded-circle"
                                                        style="font-size: 20px;;" onclick="addFile(), el()">&plus;</button>
                                                </div>
                                            </div> -->

                            <div class="row mt-5">
                                <div class="input-group col-md-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">?? ?????????????? ???? ?????? ??????????????</span>
                                    </div>
                                    <textarea class="form-control" style="height: 100px;" aria-label="With textarea"
                                        name="program_description"></textarea>
                                </div>
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /create program -->

        <!-- Delete Project Modal -->
        <div class="modal custom-modal fade" id="delete_project" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>?????????????? ???? ???????? ??????!</h3>
                            <p>?????? ???????? ?????????? ???????? ???? ?????? ?????????????? ???? ?????????? ?????? ???? ???????? ??????????</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="post" id="pathGetter">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-primary continue-btn col-md-12">???? ???????? ????
                                            ????????</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal"
                                        class="btn btn-primary cancel-btn">???????? ???? ??????</a>
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
    @if (Session::has('success_search'))
        <script>
            swal('?????? ????!', "{!! Session::get('success_search') !!}", "success", {
                button: "????????",
            });
        </script>
    @endif
    @if (Session::has('warn_search'))
        <script>
            swal('??????????', "{!! Session::get('warn_search') !!}", "warning", {
                button: "????????",
            });
        </script>
    @endif
    @if (Session::has('program_edited'))
        <script>
            swal('?????? ????!', "{!! Session::get('program_edited') !!}", "success", {
                button: "????????",
            });
        </script>
    @endif

    @if (Session::has('member_added'))
        <script>
            swal('?????? ????!', "{!! Session::get('member_added') !!}", "success", {
                button: "????????",
            });
        </script>
    @endif
    <script>
        function pathFinder(num) {
            // console.log(num.href.split('/'));
            // var fileArr = num.href.split('/');
            // var fileArrlen = fileArr.length;
            // var fileName = fileArr[fileArrlen - 1];
            // // document.getElementById('file_name').value = fileName;
            // console.log(fileName);
            document.getElementById("pathGetter").action = num.href;

        }

        $('#addProgram').addClass('active');
        var count = 2;
        var index = 1;

        function afterText() {
            var txt1 =
                `
				<div class="form-group">

										<input placeholder="${count}" class="form-control" type="text" name="facility[${index}]">
									</div>`;

            $("#facilities").children().last().after(txt1);
            $('#times').removeClass('d-none');
            count++;
            index++; // Insert new elements after img
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
        var indexAgenda = 1;

        function addAgenda() {
            var txt1 =
                `
				<div class="form-group">

										<input placeholder="${count1}" class="form-control" type="text" name="agenda[${indexAgenda}]">
									</div>`;

            $("#agendas").children().last().after(txt1);
            $('#remove-agenda').removeClass('d-none');
            count1++; // Insert new elements after img
            indexAgenda++;
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
        $("select.rankS").change(function() {
            var state = $(this).children("option:selected").val();
            // alert("You have selected the country - " + state);
            if (state === "1" && s === true) {
                console.log("hi");
                $("#fee").removeClass('d-none');
                $("#fee_type").removeClass('d-none');

                // $("#rank").after(txt1);
                s = false;
            } else if (state === "0" && s === false) {
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
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        }

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        var count4 = 2;
        var indexFile = 1;

        function addFile() {
            var txt1 =
                `	<div class=" col-md-6" >
												<div class="form-group custom-file ">
													<input type="file" class="custom-file-input" id="customFile"
														name="filename[${indexFile}]">
													<label class="custom-file-label" for="customFile">?? ?????????????? ????????????
														????????
														???????????? ??????</label>
												</div>
											</div>
											<div class=" col-md-6 mb-3" id="">
												<div class="form-group">
													<select class="custom-select"
														style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="filetype[${indexFile}]">
                                                        <option selected></option>
                                    <option value="????????????????????">????????????????????</option>
                                    <option value="????????">????????</option>
                                    <option value="????????">????????</option>
													</select>

												</div>
											</div>`;

            $("#files").children().last().after(txt1);
            $('#file-remover').removeClass('d-none');
            count4++; // Insert new elements after img
            indexFile++;
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


        $("#toggle_btn").click(function() {
            if ($('#for').css('width') === '1100px' && $('#for').css('margin-right') === '140px') {
                console.log("alkfjlakfd");
                $("#for").css("width", "1200px");
                $("#for").css("margin-right", "0px");
            } else {
                $("#for").css("width", "1100px");
                $("#for").css("margin-right", "140px");
            }
        });




        $("select.searchInput").change(function() {
            var state = $(this).children("option:selected").val();
            // alert("You have selected the country - " + state);
            console.log(state);
            // console.log($('#search_parts').children().first().remove());


            if (state === 'name') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="text" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="?????????????? ??????????">
				</div>
				</div>
				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);
            }
            if (state === 'type') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
                <select class="custom-select p-2 h-100" name="search_content">
                                            <option selected value="">?? ?????????????? ?????? ???????????? ??????</option>
                                            <option value="????????????">????????????</option>
                                            <option value="??????????????">??????????????</option>
                                            <option value="??????????????">??????????????</option>
                                            <option value="??????????????">??????????????</option>
                                        </select>
				</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'sponsor') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="text" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="?? ?????????????? ???????????? ??????????">
				</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'manager') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="text" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="?? ?????????????? ???????????????? ??????????">
				</div>
				</div>
				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'supporter') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="text" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="?? ?????????????? ?????????? ??????????">
				</div>
				</div>
				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'year') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="number" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="?? ?????????????? ?????? ??????????">
				</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'month') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="number" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label"> ?? ?????????????? ?????????? ??????????</label>
				</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === '') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
					<div class="form-group form-focus">
						<input type="text" class="form-control floating disable" name="search_content" disabled id="searchInput">
						<label class="focus-label">?????????????????? ??????????</label>
					</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
        });
    </script>

@endsection
