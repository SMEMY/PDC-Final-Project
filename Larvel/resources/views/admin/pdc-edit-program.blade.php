@extends('master.master')
@section('custom-css')
    label {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 25px !important;
    <!-- font-weight: bold !important; -->

    }
    span{
    font-size: 20px !important;
    font-weight: bold !important;

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
    hieght: 400px;
    background: #f0fcff !important;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 20px !important;
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

                <div class="account-box" style="width: 1100px; margin-top: 75px; margin-right:140px;" id="for">
                    <div class="account-wrapper mt-3" style="">
                        <h3 class="account-title mb-5" style="font-size:35px !important; font-weight: bolder;">د مسلکي
                            پرمختیائي مرکز پروګرام ثبت پاڼه</h3>
                        <!-- <p class="account-subtitle"></p> -->
                        <hr !important>
                        <!-- Account Form -->
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
                        <form action="/admin/pdcProgramList/{{ $editProgram->id }}" method="POST"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د پروګرام نوم</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $editProgram->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د پروګرام ډول</label>
                                        <select class="custom-select"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                            name="type">
                                            @if ($editProgram->type === 'ورکشاپ')
                                                <option></option>
                                                <option selected value="ورکشاپ">ورکشاپ</option>
                                                <option value="سیمینار">سیمینار</option>
                                                <option value="سمفوزیم">سمفوزیم</option>
                                                <option value="کنفرانس">کنفرانس</option>
                                            @elseif($editProgram->type === 'سیمینار')
                                                <option></option>
                                                <option value="ورکشاپ">ورکشاپ</option>
                                                <option selected value="سیمینار">سیمینار</option>
                                                <option value="سمفوزیم">سمفوزیم</option>
                                                <option value="کنفرانس">کنفرانس</option>
                                            @elseif($editProgram->type === 'سمفوزیم')
                                                <option></option>
                                                <option value="ورکشاپ">ورکشاپ</option>
                                                <option value="سیمینار">سیمینار</option>
                                                <option selected value="سمفوزیم">سمفوزیم</option>
                                                <option value="کنفرانس">کنفرانس</option>
                                            @else
                                                <option></option>
                                                <option value="ورکشاپ">ورکشاپ</option>
                                                <option value="سیمینار">سیمینار</option>
                                                <option value="سمفوزیم">سمفوزیم</option>
                                                <option selected value="کنفرانس">کنفرانس</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د پروګرام سپانسر</label>
                                        <!-- <div class="cal-icon"> -->
                                        <input class="form-control" type="text" name="sponsor"
                                            value="{{ $editProgram->sponsor }}">
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د پروګرام حمایه کوونکی</label>
                                        <!-- <div class="cal-icon"> -->
                                        <input class="form-control" type="text" name="supporter"
                                            value="{{ $editProgram->supporter }}">
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>د پروګرام تنظیمونکی</label>
                                        <input placeholder="" class="form-control" type="text" name="manager"
                                            value="{{ $editProgram->manager }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="">د پروګرام تسهیلونک</label>
                                        <input placeholder="" class="form-control" type="text" name="facilittator"
                                            value="{{ $editProgram->facilittator }}">

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="">د پروګرام د معلوماتو شمېره</label>
                                        <input placeholder="" class="form-control" type="text" name="info_mobile_number"
                                            value="{{ $editProgram->info_mobile_number }}">
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>د پروګرام د ګډون والو کچه</label>
                                        <input placeholder="" class="form-control" type="number" name="participant_amount"
                                            value="{{ $editProgram->participant_amount }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>د پروګرام یودیجه</label>
                                        <input placeholder="$" class="form-control" type="number" name="fund"
                                            value="{{ $editProgram->fund }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>د پروګرام یودیجه پولي واحد</label>
                                        <select class="custom-select rankS"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                            name="fund_type">
                                            @if ($editProgram->fund_type === 'افغانۍ')
                                                <option></option>
                                                <option selected value="افغانۍ">افغانۍ</option>
                                                <option value="ډالر">ډالر</option>
                                            @else
                                                <option></option>
                                                <option value="افغانۍ">افغانۍ</option>
                                                <option selected value="ډالر">ډالر</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <!-- <h3 class="col-md-12 m-auto">د پروګرام ادرس</h3> -->
                            </div>
                            <hr !important>
                            <div class="row">
                                <div class="col-md-12 rankS" id="rank">
                                    <div class="form-group">
                                        <label class="col-form-label">آیا پروګرام د فیس درلودونکی دی؟<span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select rankS"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                            name="fee_able">
                                            @if ($editProgram->fee_able === 1)
                                                <option></option>
                                                <option selected value="1">هو</option>
                                                <option value="0">یا</option>
                                            @else
                                                <option></option>
                                                <option value="1">هو</option>
                                                <option selected value="0">یا</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                                @if ($editProgram->fee_able === 1)
                                    <div class="col-md-12" id="fee">
                                        <div class="form-group">
                                            <label class="col-form-label">د پروګرام فیس<span
                                                    class="text-danger">*</span></label>
                                            <input placeholder="$" class="form-control" type="number" name="fee"
                                                value="{{ $editProgram->fee }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 " id="fee_type">
                                        <div class="form-group">
                                            <label class="col-form-label">د پروګرام د فیس پولي واحد<span
                                                    class="text-danger">*</span></label>
                                            <select class="custom-select rankS"
                                                style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                                name="fee_type">
                                                @if ($editProgram->fee_type === 'افغانۍ')
                                                    <option></option>
                                                    <option selected value="افغانۍ">افغانۍ</option>
                                                    <option value="ډالر">ډالر</option>
                                                @else
                                                    <option selected></option>
                                                    <option value="افغانۍ">افغانۍ</option>
                                                    <option selected value="ډالر">ډالر</option>
                                                @endif
                                            </select>

                                        </div>
                                @endif
                            </div>
                    </div>
                    <hr !important>
                    <div class="row my-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو ساحه</label>
                                <input placeholder="" class="form-control" type="text" name="campus_name"
                                    value="{{ $editProgram->campus_name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو تعمیر نوم</label>
                                <input placeholder="" class="form-control" type="text" name="block_name"
                                    value="{{ $editProgram->block_name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د رامنځته کولو تعمیر نمبر</label>
                                <input placeholder="" class="form-control" type="number" name="block_number"
                                    value="{{ $editProgram->block_number }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پروګرام د اطاق نمبر</label>
                                <input placeholder="" class="form-control" type="number" name="room_number"
                                    value="{{ $editProgram->room_number }}">
                            </div>
                        </div>
                    </div>
                    <hr !important>
                    <div class="row my-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د پېل کېدو نېټه</label>
                                <input placeholder="" class="form-control" type="datetime-local" name="start_date"
                                    value="{{ $editProgram->start_date }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>د ختمېدو نېټه</label>
                                <input placeholder="" class="form-control" type="datetime-local" name="end_date"
                                    value="{{ $editProgram->end_date }}">
                            </div>
                        </div>

                    </div>
                    @if (count($editProgram->getFacilities) != 0)
                        <hr !important>

                        <div class="row">
                            <label class="col-md-12">د پروګرام سهولتونه</label>
                            <div class="form-group col-md-12" id="facilities">
                                @foreach ($editProgram->getFacilities as $facility)
                                    <div class="form-group">
                                        <input placeholder="د پروګرام سهولت" class="form-control" type="text"
                                            name="facility[{{ $loop->index }}]" value="{{ $facility->facility }}">
                                    </div>
                                @endforeach
                                <!-- <div class="form-group">
                                            <input placeholder="د پروګرام سهولت" class="form-control" type="text" name="facility[0]" value="">
                                        </div> -->
                            </div>
                            <div class="form-group m-auto" id="ad">
                                <button type="button" id="times" class="btn btn-info mx-auto rounded-circle"
                                    style="font-size: 20px;" onclick="rmv()">&times;</button>
                                <button type="button" class="btn btn-info mx-auto rounded-circle" style="font-size: 20px;;"
                                    onclick="afterText()">&plus;</button>
                                <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                            </div>
                        </div>
                    @endif
                    @if (count($editProgram->getAgendas) != 0)
                        <hr !important>
                        <div class="row mt-5">
                            <label class="col-md-12">د پروګرام اجنډا</label>
                            <div class="form-group col-md-12" id="agendas">
                                @foreach ($editProgram->getAgendas as $agenda)
                                    <div class="form-group">
                                        <input placeholder="د پروګرام اجنډا" class="form-control" type="text"
                                            name="agenda[{{ $loop->index }}]" value="{{ $agenda->agenda }}">
                                    </div>
                                @endforeach
                                <!-- <div class="form-group">
                                            <input placeholder="د پروګرام اجنډا" class="form-control" type="text" name="agenda[0]" value="">
                                        </div> -->
                            </div>
                            <div class="form-group m-auto">
                                <button type="button" id="remove-agenda" class="btn btn-info mx-auto rounded-circle"
                                    style="font-size: 20px; display:none;" onclick="removeAgenda()">&times;</button>

                                <button type="button" id="remove-agenda" class="btn btn-info mx-auto rounded-circle"
                                    style="font-size: 20px;" onclick="removeAgenda()">&times;</button>
                                <button type="button" class="btn btn-info mx-auto rounded-circle" style="font-size: 20px;;"
                                    onclick="addAgenda()">&plus;</button>
                                <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                            </div>
                        </div>
                    @endif
                    @if (count($editProgram->getResults) != 0)
                        <hr !important>
                        <div class="row mt-5">
                            <label class="col-md-12">د پروګرام پایلي</label>
                            <div class="form-group col-md-12" id="results">
                                @foreach ($editProgram->getResults as $result)
                                    <div class="form-group">
                                        <input placeholder="د پروګرام پایله" class="form-control" type="text"
                                            name="result[0]" value="{{ $result->result }}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group m-auto">
                                <button type="button" id="remove-result" class="btn btn-info mx-auto rounded-circle"
                                    style="font-size: 20px;" onclick="removeResult()">&times;</button>
                                <button type="button" class="btn btn-info mx-auto rounded-circle" style="font-size: 20px;;"
                                    onclick="addResult()">&plus;</button>
                                <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                            </div>
                        </div>
                    @endif

                    {{-- @if (count($editProgram->getEvaluations) != 0)
                        <hr !important>
                        <div class="row mt-5">
                            <label class="col-md-12">د پروګرام ارزوني</label>
                            <div class="form-group col-md-12" id="evaluations">
                                @foreach ($editProgram->getEvaluations as $evaluation)
                                    <div class="form-group">
                                        <input placeholder="د پروګرام ارزونه" class="form-control" type="text"
                                            name="evaluation[0]" value="{{ $evaluation->evaluation }}">
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <input placeholder="د پروګرام ارزونه" class="form-control" type="text"
                                        name="evaluation[0]" value="">
                                </div>
                            </div>
                            <div class="form-group m-auto">
                                <button type="button" id="remove-evaluation" class="btn btn-info mx-auto rounded-circle"
                                    style="font-size: 20px;" onclick="removeEvaluation()">&times;</button>
                                <button type="button" class="btn btn-info mx-auto rounded-circle" style="font-size: 20px;;"
                                    onclick="addEvaluation()">&plus;</button>
                                <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                            </div>
                        </div>
                    @endif --}}


                    <div class="row mt-5">
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text">د پروګرام په اړه معلومات</span>
                            </div>
                            <textarea class="form-control" style="min-height: 145px;" aria-label="With textarea"
                                name="program_description" value="">{{ $editProgram->program_description }}</textarea>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
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
    <script>
        $('#addProgram').addClass('active');
        var count = 1 + ($("#facilities").children().length);
        var index = $("#facilities").children().length;

        function afterText() {
            console.log(count);
            console.log(index);
            var txt1 =
                `
				<div class="form-group">

										<input placeholder="د پروګرام سهولت" class="form-control" type="text" name="facility[${index}]">
									</div>`;

            $("#facilities").children().last().after(txt1);
            $('#times').removeClass('d-none');
            count++;
            index++; // Insert new elements after img
        }

        function rmv() {

            if ($("#facilities").children().length > 1) {
                $('#facilities').children().last().remove();
                index--;

            }
            if ($("#facilities").children().length == 1) {
                $('#times').addClass('d-none');
            }

        }
        var count1 = 2;
        var indexAgenda = $("#agendas").children().length;

        function addAgenda() {
            var txt1 =
                `
				<div class="form-group">

										<input placeholder="${indexAgenda}" class="form-control" type="text" name="agenda[${indexAgenda}]">
									</div>`;

            $("#agendas").children().last().after(txt1);
            $('#remove-agenda').removeClass('d-none');
            count1++; // Insert new elements after img
            indexAgenda++;
        }

        function removeAgenda() {

            if ($("#agendas").children().length > 1) {
                $('#agendas').children().last().remove();
                indexAgenda = indexAgenda - 1;;
            }
            if ($("#agendas").children().length == 1) {
                $('#remove-agenda').addClass('d-none');

            }

        }




        var indexResult = $("#results").children().length;

        function addResult() {
            var txt1 =
                `
				<div class="form-group">

										<input placeholder="${indexResult}" class="form-control" type="text" name="result[${indexResult}]">
									</div>`;

            $("#results").children().last().after(txt1);
            $('#remove-result').removeClass('d-none');
            // Insert new elements after img
            indexResult++;
        }

        function removeResult() {
            console.log($("#results").children().length);
            if ($("#results").children().length > 1) {
                $('#results').children().last().remove();
                indexResult = indexResult - 1;;
            }
            if ($("#results").children().length == 1) {
                $('#remove-result').addClass('d-none');

            }

        }




        var indexEvaluation = $("#evaluations").children().length;

        function addEvaluation() {
            var txt1 =
                `
				<div class="form-group">

										<input placeholder="${indexEvaluation}" class="form-control" type="text" name="evaluation[${indexEvaluation}]">
									</div>`;

            $("#evaluations").children().last().after(txt1);
            $('#remove-evaluation').removeClass('d-none');
            // Insert new elements after img
            indexEvaluation++;
        }

        function removeEvaluation() {
            console.log($("#evaluations").children().length);
            if ($("#evaluations").children().length > 1) {
                $('#evaluations').children().last().remove();
                indexEvaluation = indexEvaluation - 1;;
            }
            if ($("#evaluations").children().length == 1) {
                $('#remove-evaluation').addClass('d-none');

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
