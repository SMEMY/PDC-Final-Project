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

    height: 44px !important;
    border-radius: 3px !important;
    outline: none;
    background-color:#f0fcff !important;
    border:1px solid #e3e3e3 !important;

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

                {{-- <a href="#" class="btn btn-primary apply-btn mt-5" onclick="history.back()">See Programs</a> --}}
                <div class="account-box" style="width: 1100px; margin-top: 100px; margin-right:140px;" id="for">
                    <div class="account-wrapper mt-3" style="">
                        <h3 class="account-title mb-5" style="font-size:35px !important; font-weight: bolder;">?? ??????????
                            ?????????????????? ???????? ?????????????? ?????????????????? ?????? ??????</h3>
                        <!-- <p class="account-subtitle"></p> -->
                        <hr !important>
                        <!-- Account Form -->
                        <form action="/admin/specificeProgramParticipants/{{ $member[0]->user_id }}" method="POST">
                            {{ method_field('PUT') }}
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
                            @if ($path === 'facilitatorProfileForProgram')
                                <input class="d-none" type="number" name="program_id" id=""
                                    value="{{ $member[0]->program_id }}">
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">?????? <span class="text-danger">*</span></label>
                                        <input class="form-control " type="text" name="member_name"
                                            value="{{ $member[0]->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">????????</label>
                                        <input class="form-control " type="text" name="last_name"
                                            value="{{ $member[0]->last_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">???????????? ??????????<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="tel" pattern="[0-9]+" name="phone_number"
                                            value="{{ $member[0]->phone_number }}">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">??????????????????<span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $member[0]->email }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">??????????<span class="text-danger">*</span></label>
                                        <select class="custom-select" name="gender">
                                            <!-- <option selected="">??????????</option> -->
                                            <option></option>
                                            @if ($member[0]->gender === '????????????')
                                                <option selected value="????????????">????????????</option>
                                                <option value="??????????">??????????</option>
                                            @else
                                                <option value="????????????">????????????</option>
                                                <option selected value="??????????">??????????</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <hr !important>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">???????? ???????? ??????<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control " type="text" name="office_campus"
                                            value="{{ $member[0]->office_campus }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">???????? ????????<span class="text-danger">*</span></label>
                                        <input class="form-control " type="text" name="office_building"
                                            value="{{ $member[0]->office_building }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">???????? ????????</label>
                                        <input class="form-control" type="text" name="office_department"
                                            value="{{ $member[0]->office_department }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">???????? ????????<span class="text-danger">*</span></label>
                                        <select class="custom-select" name="office_position">
                                            <!-- <option selected="">??????????</option> -->
                                            <option></option>
                                            @if ($member[0]->office_position === '????????')
                                                <option selected value="????????">????????</option>
                                                <option value="??????????????">??????????????</option>
                                                <option value="????????????">????????????</option>
                                                <option value="?????????? ????????????">?????????? ????????????</option>
                                            @elseif($member[0]->office_position === '??????????????')
                                                <option value="????????">????????</option>
                                                <option selected value="??????????????">??????????????</option>
                                                <option value="????????????">????????????</option>
                                                <option value="?????????? ????????????">?????????? ????????????</option>
                                            @elseif($member[0]->office_position === '????????????')
                                                <option value="????????">????????</option>
                                                <option value="??????????????">??????????????</option>
                                                <option selected value="????????????">????????????</option>
                                                <option value="?????????? ????????????">?????????? ????????????</option>
                                            @else
                                                <option value="????????">????????</option>
                                                <option value="??????????????">??????????????</option>
                                                <option value="????????????">????????????</option>
                                                <option selected value="?????????? ????????????">?????????? ????????????</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="rank">
                                    <div class="form-group">
                                        <label class="col-form-label"> ???????? ????????<span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select rankS" name="office_position_category">
                                            <option></option>
                                            @if ($member[0]->office_position_category === '??????????')
                                                <option selected value="??????????">??????????</option>
                                                <option value="????????????">????????????</option>
                                                <option value="?????????? ???? ????????????">?????????? ???? ????????????</option>
                                            @elseif($member[0]->office_position_category === '????????????')
                                                <option value="??????????">??????????</option>
                                                <option selected value="????????????">????????????</option>
                                                <option value="?????????? ???? ????????????">?????????? ???? ????????????</option>
                                            @else
                                                <option value="??????????">??????????</option>
                                                <option value="????????????">????????????</option>
                                                <option selected value="?????????? ???? ????????????">?????????? ???? ????????????</option>
                                            @endif
                                            <!-- <option value="3">?????????? ????????????</option> -->
                                        </select>
                                    </div>
                                </div>
                                @if ($member[0]->educational_rank != null)
                                    <div class="col-md-12" id="temp1">
                                        <div class="form-group">
                                            <label class="col-form-label">???????? ????????<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" name="educational_rank">
                                                <option></option>
                                                @if ($member[0]->educational_rank === '????????????????')
                                                    <option selected value="????????????????">????????????????</option>
                                                    <option value="??????????????">??????????????</option>
                                                    <option value="????????????">????????????</option>
                                                    <option value="????????????">????????????</option>
                                                @elseif($member[0]->educational_rank === '??????????????')
                                                    <option value="????????????????">????????????????</option>
                                                    <option selected value="??????????????">??????????????</option>
                                                    <option value="????????????">????????????</option>
                                                    <option value="????????????">????????????</option>
                                                @elseif($member[0]->educational_rank === '????????????')
                                                    <option value="????????????????">????????????????</option>
                                                    <option value="??????????????">??????????????</option>
                                                    <option selected value="????????????">????????????</option>
                                                    <option value="????????????">????????????</option>
                                                @else
                                                    <option value="????????????????">????????????????</option>
                                                    <option value="??????????????">??????????????</option>
                                                    <option value="????????????">????????????</option>
                                                    <option selected value="????????????">????????????</option>
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- <hr !important>	 -->
                            <!-- this part has been hidden just for DB member role -->

                            <!-- <div class="row">
                     <div class="col-md-6">
                      <div class="form-group">
                       <label class="col-form-label">????????????<span
                         class="text-danger">*</span></label>
                       <input class="form-control" type="password" name="password" value="{{ $member[0]->password }}">
                      </div>
                     </div>
                     <div class="col-md-6">
                      <div class="form-group">
                       <label class="col-form-label">???????????? ?????????? ??????<span
                         class="text-danger">*</span></label>
                       <input class="form-control input-sm" type="password" name="password_confirmation" value="{{ $member[0]->password }}">
                      </div>
                     </div>
                    </div> -->
                            <hr !important> <!-- this part has been hidden just for DB member role -->

                            <div class="form-group text-center col-md-12">
                                <button class="btn btn-primary submit-btn" type="submit">?????????????????? ??????
                                    ??????</button>
                            </div>
                            {{-- <div class="account-footer my-5">
								<p>?????? ???? ?????? ???? ???????? ?????? ?????? <a href="login.html">?????? ????</a></p>
							</div> --}}
                        </form>
                        <!-- /Account Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection




@section('custom-js')
    @if (Session::has('member_edited'))
        <script>
            swal('?????? ????!', "{!! Session::get('member_edited') !!}", "success", {
                button: "????????",
            });
        </script>
    @endif
    <script>
        $("button.swal-button").click(function() {
            // console.log("aklsdjf");
            history.go(-2);
            // location.reload();location.reload();
        });
        var s = true;
        $("select.rankS").change(function() {
            var state = $(this).children("option:selected").val();
            // alert("You have selected the country - " + state);
            console.log(typeof state);
            if ((state === "????????????" || state === "?????????? ???? ????????????") && s === true) {
                var txt1 =
                    `<div class="col-md-12" id="temp">
						<div class="form-group">
							<label class="col-form-label">???????? ????????<span class="text-danger">*</span></label>
								<select class="form-control" name="educational_rank">
								<!-- <option selected="">??????????</option> -->
								<option value="????????????????">????????????????</option>
								<option value="??????????????">??????????????</option>
								<option value="????????????">????????????</option>
								<option value="????????????">????????????</option>
								<!-- <option value="3">?????????? ????????????</option> -->
							</select>

						</div>
					</div>`;

                $("#rank").after(txt1);
                $("#temp1").remove();

                s = false;
            } else if (state === "??????????" && s === false) {
                $("#temp").remove();
                $("#temp1").remove();

                s = true
            } else {
                $("#temp1").remove();

            }

        });


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
    </script>
@endsection
