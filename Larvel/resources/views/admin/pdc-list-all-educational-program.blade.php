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
    input{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 20px !important;
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
                        <a href="/admin/addEduProgram" class="btn add-btn px-4"><i class="fa fa-plus"></i>?????????????? ??????
                            ??????</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            @if (count($programs) !== 0)
                <form action="/admin/searchEducationalProgram" method="POST">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="row">
                            <div class="mb-3 col-md-12" id="alertMassege">
                                <ul style="list-style-type:none" class="p-0 m-0">
                                    @foreach ($errors->all() as $error)
                                        <li class="rounded p-2 m-1 alert alert-danger">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="row filter-row mb-5" id="search_parts">
                        <div class="col-sm-6 col-md-5" id="search_input">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating disable" name="search_content" disabled
                                    id="searchInput">
                                <label class="focus-label">???????? ?????????????? ??????????</label>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-5" id="search_content">
                            <div class="form-group form-focus select-focus">
                                <select class="custom-select p-2 h-100 searchInput" name="search_type">
                                    <option selected value="">?? ?????????? ???????? ???????????? ??????!</option>
                                    <option value="topic">?? ?????????????? ??????????</option>
                                    <option value="type">?? ?????????????? ??????</option>
                                    <option value="teacher_name">?? ?????????? ??????</option>
                                    <option value="teacher_last_name">?? ?????????? ????????</option>
                                    <option value="university">?? ?????????? ??????????????</option>
                                    <option value="faculty">?? ?????????? ????????????</option>
                                    <option value="department">?? ?????????? ???????? ??????????????????</option>
                                    <option value="year">?? ???????? ?????????????? ??????</option>
                                    <!-- <option>Delta Infotech</option> -->
                                </select>
                                <!-- <label class="focus-label">?????????????? ???????????? ??????</label> -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <!-- <a href="#" class="">?????????? </a> -->
                            <button type="submit" class="btn btn-success btn-block h3 p-1">??????????</button>
                        </div>
                    </div>
                </form>
                <!-- Search Filter -->
                <div class="row">
                    @foreach ($programs as $program)
                        <div class="col-md-6" onclick="audio.play()">
                            <div class="card p-0" id="program">
                                <div class="card-body p-1">
                                    <div class="dropdown dropdown-action profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="/admin/educationalProgramList/{{ $program->id }}/edit"><i
                                                    class="fa fa-pencil m-r-5"></i>?????????????? ?????????? ??????</a>
                                            <a class="dropdown-item"
                                                href="/admin/educationalProgramList/{{ $program->id }}"
                                                data-toggle="modal" data-target="#delete_project" id="path"
                                                onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i> ???? ???????? ????
                                                ????????</a>
                                        </div>
                                    </div>
                                    <a href="/admin/educationalPrograminfo/{{ $program->id }}">
                                        <div class="job-list-desc" style="padding: 15px 15px 5px 15px">
                                            <h3 class="job-list-title text-center pb-2"> {{ $program->topic }} </h3>
                                            <!-- <br> -->
                                            <h4 class="job-department "><strong>???????? ??????: </strong>
                                                {{ $program->teacher_name }} {{ $program->teacher_last_name }}</h4>
                                            <h4 class="job-department "><strong>?? ?????????????? ??????: </strong>
                                                {{ $program->type }} </h4>

                                            <!-- <p class="text-muted mt-4 col-md-12"><strong>??????????????: </strong> {{ $program->university }}
                <p class="text-muted mt-4 col-md-12"><strong>????????????: </strong> {{ $program->faculty }} -->
                                            <!-- </p> -->
                                        </div>
                                        <div class="job-list-footer p-0" id="foot">
                                            <ul class="m-0"
                                                style="padding:5px 10px; background: linear-gradient(to left, #88e5ff 0%, #3687ff8c 120%); border-radius: 0 0 4px 4px;">
                                                <li class="ml-1 d-inline-block"><i class="fa fa-map-signs text-danger"></i>
                                                    <strong>????????: </strong>
                                                    {{ $program->campus_name }}
                                                </li>
                                                <!-- <br>-->
                                                <li class="ml-1 d-inline-block" dir="rtl"><i
                                                        class="fa fa-calendar text-danger"></i> <strong> ????????:
                                                    </strong> {{ date('Y - m - d ', strtotime($program->date)) }}</li>

                                                <li class="ml-1 d-inline-block" dir="rtl"><i
                                                        class="fa fa fa-clock-o text-danger" aria-hidden="true"></i>
                                                    <strong>??????: </strong>
                                                    {{ date('A H:i', strtotime($program->date)) }}
                                                </li>
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
                                            ???????? ?????????????? ???? ?????????????? ???????? ?????????????? ?????????????????? ?????????????? ??????????????!
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




        <!-- Delete Project Modal -->
        <div class="modal custom-modal fade" id="delete_project" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>???????? ?????????????? ???? ???????? ??????</h3>
                            <p>?????? ???????? ?????????? ???????? ???? ?????? ?????????????? ?????????????? ???? ?????????? ?????? ???? ???????? ????????</p>
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
    @if (Session::has('success'))
        <script>
            swal('??????????', "{!! Session::get('success') !!}", "success", {
                button: "????????",
            });
        </script>
    @endif
    <script>
        $("select.searchInput").change(function() {
            var state = $(this).children("option:selected").val();
            if (state === 'topic') {
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
            if (state === 'type') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
                <select class="custom-select p-2 h-100" name="search_content">
				<option selected value="">?? ???????????????? ?????? ??????????</option>
                                            <option  value="???????? ??????????">???????? ??????????</option>
                                            <option  value="????????????">????????????</option>
                                            <option  value="????????">????????</option>
                                        </select>
				</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'teacher_name') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="text" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="?? ?????????? ?????? ??????????">
				</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'father_name') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="text" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="?? ?????????? ?? ???????? ?????? ??????????">
				</div>
				</div>
				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'teacher_last_name') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
					<input type="text" class="form-control floating p-4" name="search_content" id="searchInput" placeholder="?? ?????????? ?? ???????? ??????????">
				</div>
				</div>
				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'university') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group">
				<select class="custom-select h-100"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="search_content">
                                            <option value="">?? ?????????? ?????????????? ??????????</option>
                                            <option selected value="???????????? ??????????????">???????????? ??????????????</option>
                                        </select>
				</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'faculty') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
				<select class="custom-select"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;" name="search_content">


                                            <option selected value=""></option>
                                            <option  value="????">????</option>
                                            <option  value="??????????????">??????????????</option>
                                            <option  value="?????????????? ??????????">?????????????? ??????????</option>
                                            <option  value="????????">????????</option>
                                            <option  value="?????????? ???? ????????">?????????? ???? ????????</option>
                                            <option  value="??????????????????">??????????????????</option>
                                            <option  value="????????????">????????????</option>
                                            <option  value="??????????">??????????</option>
                                            <option  value="????????????">????????????</option>
                                            <option  value="????????????">????????????</option>
                                            <option  value="??????????">??????????</option>
				</select>
				</div>
				</div>
				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'department') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="number" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label"> ?? ?????????? ???????? ?????????????????? ??????????</label>
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
				<div class="form-group form-focus">
					<input type="number" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label"> ?? ???????? ?????????????? ?????? ??????????</label>
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
						<input type="text" class="form-control floating " name="search_content" disabled id="searchInput">
						<label class="focus-label">???????? ?????????????? ??????????</label>
					</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
        });

        function pathFinder(num) {
            document.getElementById("pathGetter").action = num.href;
        }
    </script>

@endsection
