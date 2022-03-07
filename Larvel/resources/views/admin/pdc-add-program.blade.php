@extends('master.master')
@section('custom-css')
    label {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 23px !important;

    }
    #info span{
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
    }
    strong{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 15px !important;

    }
    button{
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
    background: #f0fcff !important;
    max-height: 200px; !important;
    min-height: 44px; !important;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 20px !important;
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
@endsection



@section('content')

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="account-content">
            <!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
            <div class="container ">
                <div class="account-box" style="width: 1100px; margin-top: 75px; margin-right:140px;" id="for">
                    <div class="account-wrapper mt-3" style="">
                        <h3 class="account-title mb-5" style="font-size:35px !important; font-weight: bolder;">د مسلکي
                            پرمختیائي مرکز پروګرام ثبت پاڼه</h3>
                        <!-- <p class="account-subtitle"></p> -->
                        <hr !important>
                        <!-- Account Form -->


                        <form action="/admin/pdcProgramList" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="mb-2" id="alertMassege">
                                    <ul style="list-style-type:none" class="p-0 m-0">
                                        @foreach ($errors->all() as $error)
                                            <li class="rounded p-2 m-1 alert alert-danger">
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پروګرام نوم</label>
                                        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام ډول</label>
                                        <select class="custom-select"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                            name="type">

                                            @if (old('type') === 'ورکشاپ')
                                                <option></option>
                                                <option selected value="ورکشاپ">ورکشاپ</option>
                                                <option value="سیمینار">سیمینار</option>
                                                <option value="سمفوزیم">سمفوزیم</option>
                                                <option value="کنفرانس">کنفرانس</option>
                                            @elseif(old('type') === 'سیمینار')
                                                <option></option>
                                                <option value="ورکشاپ">ورکشاپ</option>
                                                <option selected value="سیمینار">سیمینار</option>
                                                <option value="سمفوزیم">سمفوزیم</option>
                                                <option value="کنفرانس">کنفرانس</option>
                                            @elseif(old('type') === 'سمفوزیم')
                                                <option></option>
                                                <option value="ورکشاپ">ورکشاپ</option>
                                                <option value="سیمینار">سیمینار</option>
                                                <option selected value="سمفوزیم">سمفوزیم</option>
                                                <option value="کنفرانس">کنفرانس</option>
                                            @elseif(old('type') === 'کنفرانس')
                                                <option></option>
                                                <option value="ورکشاپ">ورکشاپ</option>
                                                <option value="سیمینار">سیمینار</option>
                                                <option value="سمفوزیم">سمفوزیم</option>
                                                <option selected value="کنفرانس">کنفرانس</option>
                                            @else
                                                <option></option>
                                                <option value="ورکشاپ">ورکشاپ</option>
                                                <option value="سیمینار">سیمینار</option>
                                                <option value="سمفوزیم">سمفوزیم</option>
                                                <option value="کنفرانس">کنفرانس</option>
                                            @endif
                                        </select>
                                        @error('type')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پروګرام سپانسر</label>
                                        <!-- <div class="cal-icon"> -->
                                        <input class="form-control" type="text" name="sponsor"
                                            value="{{ old('sponsor') }}">
                                        @error('sponsor')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام حمایه کوونکی</label>
                                        <!-- <div class="cal-icon"> -->
                                        <input class="form-control" type="text" name="supporter"
                                            value="{{ old('supporter') }}">
                                        @error('supporter')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام تنظیمونکی</label>
                                        <input placeholder="" class="form-control" type="text" name="manager"
                                            value="{{ old('manager') }}">
                                        @error('manager')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام تسهیلونکی</label>
                                        <input placeholder="" class="form-control" type="text" name="facilitator"
                                            value="{{ old('facilitator') }}">
                                        @error('facilitator')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!--  -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class=""><span class="text-danger">*</span> د پروګرام د
                                            معلوماتو شمېره</label>
                                        <input placeholder="" class="form-control" type="text" name="info_mobile_number"
                                            value="{{ old('info_mobile_number') }}">
                                        @error('info_mobile_number')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام ګډونکونکي ډلي</label>
                                        <input placeholder="" class="form-control" type="text" name="for"
                                            value="{{ old('for') }}">
                                        @error('for')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پروګرام د ګډون والو کچه</label>
                                        <input placeholder="" class="form-control" type="number" name="participant_amount"
                                            value="{{ old('participant_amount') }}">
                                        @error('participant_amount')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span>د پروګرام یودیجه</label>
                                        <input placeholder="$" class="form-control" type="number" name="fund"
                                            value="{{ old('fund') }}">
                                        @error('fund')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام یودیجه پولي واحد</label>
                                        <select class="custom-select rankS"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                            name="fund_type">
                                            @if (old('fund_type') === 'افغانۍ')
                                                <option></option>
                                                <option selected value="افغانۍ">افغانۍ</option>
                                                <option value="ډالر">ډالر</option>
                                            @elseif(old('fund_type') === 'ډالر')
                                                <option></option>
                                                <option value="افغانۍ">افغانۍ</option>
                                                <option selected value="ډالر">ډالر</option>
                                            @else
                                                <option></option>
                                                <option value="افغانۍ">افغانۍ</option>
                                                <option value="ډالر">ډالر</option>
                                            @endif
                                        </select>
                                        @error('fund_type')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- <h3 class="col-md-12 m-auto">د پروګرام ادرس</h3> -->
                            </div>
                            <hr !important>
                            <div class="row">
                                <div class="col-md-12 rankS">
                                    <div class="form-group">
                                        <label class="col-form-label"> <span class="text-danger">*</span> آیا پروګرام د
                                            فیس درلودونکی دی؟<span class="text-danger">*</span></label>
                                        <select class="custom-select rankS"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                            name="fee_able" id="rank">
                                            @if (old('fee_able') === '1')
                                                <option></option>
                                                <option selected value="1">هو</option>
                                                <option value="0">یا</option>
                                            @elseif(old('fee_able') === '0')
                                                <option></option>
                                                <option value="1">هو</option>
                                                <option selected value="0">یا</option>
                                            @else
                                                <option></option>
                                                <option value="1">هو</option>
                                                <option value="0">یا</option>
                                            @endif
                                        </select>
                                        @error('fee_able')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6 d-none" id="fee">
                                    <div class="form-group">
                                        <label class="col-form-label"><span class="text-danger">*</span> د پروګرام
                                            فیس</label>
                                        <input placeholder="$" class="form-control" type="number" name="fee"
                                            value="{{ old('fee') }}">
                                        @error('fee')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 d-none" id="fee_type">
                                    <div class="form-group">
                                        <label class="col-form-label"> <span class="text-danger">*</span> د پروګرام د فیس
                                            پولي واحد</label>
                                        <select class="custom-select rankS"
                                            style="height: 44px; border-radius: 3px; outline: none;background-color:#f0fcff; border:1px solid #e3e3e3;"
                                            name="fee_unit">
                                            @if (old('fee_type') === 'افغانۍ')
                                                <option></option>
                                                <option selected value="افغانۍ">افغانۍ</option>
                                                <option value="ډالر">ډالر</option>
                                            @elseif(old('fee_type') === 'ډالر')
                                                <option></option>
                                                <option value="افغانۍ">افغانۍ</option>
                                                <option selected value="ډالر">ډالر</option>
                                            @else
                                                <option selected></option>
                                                <option value="افغانۍ">افغانۍ</option>
                                                <option value="ډالر">ډالر</option>
                                            @endif
                                        </select>
                                        @error('fee_unit')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <hr !important>
                            <div class="row my-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پروګرام د رامنځته کولو ساحه</label>
                                        <input placeholder="" class="form-control" type="text" name="campus_name"
                                            value="{{ old('campus_name') }}">
                                        @error('campus_name')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام د رامنځته کولو تعمیر
                                            نوم</label>
                                        <input placeholder="" class="form-control" type="text" name="block_name"
                                            value="{{ old('block_name') }}">
                                        @error('block_name')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> <span class="text-danger">*</span> د پروګرام د رامنځته کولو تعمیر
                                            نمبر</label>
                                        <input placeholder="" class="form-control" type="number" name="block_number"
                                            value="{{ old('block_number') }}">
                                        @error('block_number')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پروګرام د اطاق نمبر</label>
                                        <input placeholder="" class="form-control" type="number" name="room_number"
                                            value="{{ old('room_number') }}">
                                        @error('room_number')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr !important>
                            <div class="row my-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د پېل کېدو تاریخ</label>
                                        <input placeholder="" class="form-control" type="datetime-local"
                                            name="start_date" value="{{ old('start_date') }}">
                                        @error('start_date')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span> د ختمېدو تاریخ</label>
                                        <input placeholder="" class="form-control" type="datetime-local" name="end_date"
                                            value="{{ old('end_date') }}">
                                        @error('end_date')
                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr !important>

                            <div class="row">
                                <label class="col-md-12">د پروګرام سهولتونه</label>
                                <div class="form-group col-md-12" id="facilities">
                                    <div class="form-group">
                                        <input placeholder="د پروګرام سهولت" class="form-control" type="text"
                                            name="facility[0]" value="">
                                    </div>
                                </div>
                                <div class="form-group m-auto" id="ad">
                                    <button type="button" id="remove_facility"
                                        class="btn btn-info mx-auto rounded-circle d-none" style="font-size: 20px;"
                                        onclick="removeFacility()">&times;</button>
                                    <button type="button" class="btn btn-info mx-auto rounded-circle"
                                        style="font-size: 20px;;" onclick="addFacility()">&plus;</button>
                                    <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                                </div>
                            </div>
                            <hr !important>
                            {{-- <hr !important> --}}

                            <div class="row">
                                <label class="col-md-12">د پروګرام اجنډاوي</label>
                                <div class="form-group col-md-12" id="agendas">
                                    <div class="form-group">
                                        <input placeholder="د پروګرام اجنډا" class="form-control" type="text"
                                            name="agenda[0]" value="">
                                    </div>
                                </div>
                                <div class="form-group m-auto" id="ad">
                                    <button type="button" id="remove_agenda"
                                        class="btn btn-info mx-auto rounded-circle d-none" style="font-size: 20px;"
                                        onclick="removeAgenda()">&times;</button>
                                    <button type="button" class="btn btn-info mx-auto rounded-circle"
                                        style="font-size: 20px;;" onclick="addAgenda()">&plus;</button>
                                    <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                                </div>
                            </div>

                            <hr !important>
                            {{-- <hr !important> --}}

                            <div class="row">
                                <label class="col-md-12">د پروګرام پایلي</label>
                                <div class="form-group col-md-12" id="results">
                                    <div class="form-group">
                                        <input placeholder="د پروګرام پایله" class="form-control" type="text"
                                            name="result[0]" value="">
                                    </div>
                                </div>
                                <div class="form-group m-auto" id="ad">
                                    <button type="button" id="remove_result"
                                        class="btn btn-info mx-auto rounded-circle d-none" style="font-size: 20px;"
                                        onclick="removeResult()">&times;</button>
                                    <button type="button" class="btn btn-info mx-auto rounded-circle"
                                        style="font-size: 20px;;" onclick="addResult()">&plus;</button>
                                    <!-- <label class="ml-5 col-form-label col-lg-2" style="display: block;">add more questions!</label> -->
                                </div>
                            </div>
                            <hr !important>

                            <div class="row mt-5">
                                <div class="input-group col-md-12">
                                    <div class="input-group-prepend" id="info">
                                        <span class="input-group-text"><span class="text-danger">*</span> د پروګرام په
                                            اړه معلومات</span>
                                    </div>
                                    <textarea class="form-control" style="height: 100px;" aria-label="With textarea"
                                        name="program_description">{{ old('program_description') }}</textarea>
                                    @error('program_description')
                                        <span class="invalid-feedback" role="alert" style="display:block">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">پروګرام ثبت کړی</button>
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
    @if (Session::has('program_added'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('program_added') !!}", "success", {
                button: "مننه",
            });
        </script>
    @endif

    <script>
        function bootstrapAlert() {
            $('.bootstrap-growl').remove();

            $.bootstrapGrowl("this is success!", {
                type: "danger",
                offset: {
                    from: "top",
                    amount: 100
                },
                align: "center",
                width: 600,
                delay: 3000,
                allow_dismiss: true,
                stackup_spacing: 20
            });
        }
        $('#addProgram').addClass('active');


        var s = true;
        $("select.rankS").change(function() {
            var state = $(this).children("option:selected").val();
            // alert("You have selected the country - " + state);
            if (state === "1") {
                $("#fee").removeClass('d-none');
                $("#fee_type").removeClass('d-none');
            } else if (state === "0") {
                $("#fee").addClass('d-none');
                $("#fee_type").addClass('d-none');
            }

        });
        // console.log();
        // if ($('#rank').children("option:selected").val() === "1") {
        //     $("#fee").removeClass('d-none');
        //     $("#fee_type").removeClass('d-none');
        // }

        // function el() {
        //     $(".custom-file-input").on("change", function() {
        //         var fileName = $(this).val().split("\\").pop();
        //         $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        //     });
        // }

        // $(".custom-file-input").on("change", function() {
        //     var fileName = $(this).val().split("\\").pop();
        //     $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        // });

        // var count4 = 2;
        // var indexFile = 1;


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

        var count4 = 2;
        var count5 = 2;
        var count6 = 2;
        var indexFacility = 1;
        var indexAgenda = 1;
        var indexResult = 1;

        function addFacility() {
            var txt1 =
                `<div class="form-group" id="facilities">
                                    <div class="form-group">
                                        <input placeholder="د پروګرام سهولت" class="form-control" type="text"
                                            name="facility[${indexFacility}]" value="">
                                    </div>
                                </div>`;
            $("#facilities").children().last().after(txt1);
            $('#remove_facility').removeClass('d-none');
            count4++;
            indexFacility++; // Insert new elements after img
        }

        function removeFacility() {
            if ($("#facilities").children().length > 1) {
                $('#facilities').children().last().remove();
                indexFacility--;
            }
            if ($("#facilities").children().length == 1) {
                $('#remove_facility').addClass('d-none');
            }
        }

        function addAgenda() {
            var txt1 =
                `<div class="form-group" id="facilities">
                                <div class="form-group">
                                    <input placeholder="د پروګرام سهولت" class="form-control" type="text"
                                        name="agenda[${indexAgenda}]" value="">
                                </div>
                            </div>`;

            $("#agendas").children().last().after(txt1);
            $('#remove_agenda').removeClass('d-none');
            count5++;
            indexAgenda++; // Insert new elements after img
        }

        function removeAgenda() {

            if ($("#agendas").children().length > 1) {
                $('#agendas').children().last().remove();
                indexAgenda--;

            }
            if ($("#agendas").children().length == 1) {
                $('#remove_agenda').addClass('d-none');
            }

        }

        function addResult() {
            var txt1 =
                `<div class="form-group" id="result">
                                <div class="form-group">
                                    <input placeholder="د پروګرام پایله" class="form-control" type="text"
                                        name="result[${indexResult}]" value="">
                                </div>
                            </div>`;

            $("#results").children().last().after(txt1);
            $('#remove_result').removeClass('d-none');
            count5++;
            indexResult++; // Insert new elements after img
        }

        function removeResult() {

            if ($("#results").children().length > 1) {
                $('#results').children().last().remove();
                indexResult--;

            }
            if ($("#results").children().length == 1) {
                $('#remove_result').addClass('d-none');
            }

        }
    </script>
@endsection
