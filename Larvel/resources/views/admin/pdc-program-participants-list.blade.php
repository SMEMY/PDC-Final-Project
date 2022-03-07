@extends('master.masterInfo')

<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
    hahahaha
@endsection
<!-- here we add css custom style -->
@section('custom-css')
    thead tr th{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 20px !important;

    }
    label{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

    }
    h3, p, button{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;

    }
    h3{
    font-size: 25px !important;

    }
    p{
    font-size: 20px !important;

    }
    td{
    border-right: 1px solid #d8d8d8;
    border-bottom:1px solid #d8d8d8;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 20px !important;
    text-align: center;
    }
    tr th{
    border:1px solid gray !important;
    background: #00c5fb;
    font-weight: bold !important;
    }
    select {
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

    input::placeholder {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 17px !important;
    }

    #alertMassege {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 20px !important;
    }

    .swal-modal div {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 20px !important;
    }

    .swal-text {
    text-align: right;

    }

    .swal-modal {
    padding: 20px 24px;
    width: 600px;
    }
@endsection


@section('content')
    <a href="/admin/pdcProgramInfo/{{ $programID }}" class="btn btn-primary apply-btn mt-5" style="z-index: 100;"><i
            class="fa fa-arrow-left" aria-hidden="true"></i> </a>



    <div class="main-wrapper">
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">د پروګرام ګډونوال</h3>
                        </div>
                    </div>
                </div>
                <form action="/admin/searchProgramParticipant" method="POST">
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
                    <input type="hidden" name="program_id" id="" value="{{ $programID }}">
                    <div class="row filter-row mb-5" id="search_parts">
                        <div class="col-sm-6 col-md-5" id="search_input">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating disable" name="search_content" disabled
                                    id="searchInput">
                                <label class="focus-label">تسهیلونکی وپلټی</label>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-5" id="search_content">
                            <div class="form-group form-focus select-focus">
                                <select class="custom-select p-2 h-100 searchInput" name="search_type">
                                    <a href="/facilitatorList">
                                        <option selected value="">د پلټني عنصر انتخاب کړی!</option>
                                    </a>
                                    <option value="name">نوم</option>
                                    <option value="email">برېښنالیک</option>
                                    <option value="phone_number">د موبائیل شمېره</option>
                                    {{-- <option value="educational_rank">علمي رتبه</option>
                                    <option value="gender">جنسیت</option>
                                    <option value="office_building">کاري دفتر</option>
                                    <option value="office_department">کاري شعبه</option>
                                    <option value="office_position">کاري منصب</option>
                                    <option value="office_position_category">کاري برخه</option> --}}
                                    <!-- <option>Delta Infotech</option> -->
                                </select>
                                <!-- <label class="focus-label">پروګرام انتخاب کړی</label> -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <!-- <a href="#" class="">پلټنه </a> -->
                            <button type="submit" class="btn btn-success btn-block h3 p-1">پلټنه</button>
                        </div>
                    </div>
                </form>
                <!-- /Page Header -->

                <!-- Search Filter -->
                {{-- <form action="/admin/programSpecificParticipant/{{$programID}}" method="get">
						{{ method_field('GET') }}
						{{ csrf_field() }}
						<div class="row filter-row">
							<div class="col-sm-6 col-md-5">
								<div class="form-group form-focus">
									<input type="text" class="form-control floating" name="name">
									<label class="focus-label">د ګډونوال نوم</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-5">
								<div class="form-group form-focus">
									<input type="text" class="form-control floating" name="phone_number">
									<label class="focus-label">د ګډونوال د ټلیفون شمېره</label>
								</div>
							</div>

							<div class="col-sm-6 col-md-2">
								<!-- <a href="#" class="btn btn-success btn-block p-0 pt-2" style="font-size: 25px;">پلټنه </a> -->
								<button class="btn btn-success btn-block p-0 pt-2 ">پلټنه</button>

							</div>
						</div>
					</form> --}}
                <!-- /Search Filter -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th class="text text-center">نوم</th>
                                        <th class="text text-center">تخلص</th>
                                        <th class="text text-center">کاري ځاي</th>
                                        <th class="text text-center">کاري دفتر</th>
                                        <th class="text-nowrap text-center">کاري شعبه</th>
                                        <th class="text text-center">ټلیفون شمېره</th>
                                        <th class="text text-center">برېښنالیک</th>
                                        <th class="text text-center" class="text-right no-sort">عملیه</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participants as $participant)
                                        <tr>
                                            <td>{{ $participant->name }}</td>
                                            <td>{{ $participant->last_name }}</td>
                                            <td>{{ $participant->office_campus }}</td>
                                            <td>{{ $participant->office_building }}</td>
                                            <td>{{ $participant->office_department }}</td>
                                            <td>{{ $participant->phone_number }}</td>
                                            <td>{{ $participant->email }}</td>
                                            <td class="text-right" style="border-left: 1px solid #d8d8d8;">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                        aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-left">
                                                        <a class="dropdown-item"
                                                            href="/admin/participantList/{{ $participant->user_id }}/edit"><i
                                                                class="fa fa-pencil m-r-5"></i> اصلاح يې کړی</a>
                                                        <a class="dropdown-item"
                                                            href="/admin/participantList/{{ $participant->user_id }}"
                                                            data-toggle="modal" data-target="#delete_employee"
                                                            onclick="pathFinder(this)"><i class="fa fa-trash-o m-r-5"></i>
                                                            له منځه یې اوسی</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            <!-- Delete Project Modal -->
            <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>ګدونوال له منځه یوسی!</h3>
                                <p>آیا تاسي مطمئین یاست چي یاد ګډونوال له منځه یوسی؟</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="" method="post" id="pathGetter">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <input class="d-none" type="text" name="page" id=""
                                                value="pdc-program-participants-list">
                                            <input class="d-none" type="number" name="program_id" id=""
                                                value="{{ $programID }}">
                                            <input class="d-none" type="number" id="P_ID" name="participant_id"
                                                id="" value="">
                                            <button type="submit" class="btn btn-danger continue-btn col-md-12"
                                                class="">له منځه یوسی</button>
                                        </form>
                                        <!-- <a href="" class="btn btn-primary continue-btn">Delete</a> -->
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal"
                                            class="btn btn-primary cancel-btn"
                                            style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;">فسخه
                                            کړی</a>
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
    </div>


    <!-- /Main Wrapper -->
@endsection

@section('custom-js')
    @if (Session::has('warn'))
        <script>
            swal('وبخښئ!', "{!! Session::get('warn') !!}", "warning", {
                button: "وروسته کوښښ وکړئ",
            });
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('success') !!}", "success", {
                button: "سمده",
            });
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('success') !!}", "success", {
                button: "سمده",
            });
        </script>
    @endif
    @if (Session::has('warn_search'))
        <script>
            swal('وبخښۍ!', "{!! Session::get('warn_search') !!}", "warning", {
                button: "مننه",
            });
        </script>
    @endif
    <script>
        function pathFinder(num) {
            console.log(num.href.split('/'));
            var participantArr = num.href.split('/');
            var participantlen = participantArr.length;
            var participantID = participantArr[participantlen - 1];
            document.getElementById('P_ID').value = participantID;
            console.log(participantID);
            document.getElementById("pathGetter").action = num.href;

        }
    </script>
    <script>
        function pathFinder(num) {
            console.log(num.href.split('/'));
            var participantArr = num.href.split('/');
            var participantlen = participantArr.length;
            var participantID = participantArr[participantlen - 1];
            document.getElementById('P_ID').value = participantID;
            console.log(participantID);
            document.getElementById("pathGetter").action = num.href;

        }
        var s = true;
        $("select.searchInput").change(function() {
            var state = $(this).children("option:selected").val();
            // alert("You have selected the country - " + state);
            console.log(state);
            // console.log($('#search_parts').children().first().remove());


            if (state === 'name') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="text" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label">تسهیلونکی وپلټی</label>
				</div>
				</div>
				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);
            }
            if (state === 'email') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="email" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label">برېښنالیک ولیکی</label>
				</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
            if (state === 'phone_number') {
                var content =
                    `
				<div class="col-sm-6 col-md-5" id="search_input">
				<div class="form-group form-focus">
					<input type="text" class="form-control floating disable" name="search_content" id="searchInput">
					<label class="focus-label">موبائیل شماره ولیکی</label>
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
						<label class="focus-label">تسهیلونکی وپلټی</label>
					</div>
				</div>

				`;
                $('#search_parts').children().first().remove()
                $("#search_content").before(content);

            }
        });
    </script>
@endsection
