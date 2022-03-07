@extends('master.masterCopy')



<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
    hahahaha
@endsection





@section('custom-css')

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
    input, select, label, button{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size:20px !important;


    }
    input{
    background: #f0fcff !important;
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
    select{
    height: 44px !important;
    border-radius: 3px !important;
    outline: none;
    background-color:#f0fcff !important;
    border:1px solid #e3e3e3 !important;
    }
@endsection


@section('content')
    <div class="page-wrapper" style="min-height: 371px;">
        <a href="/admin/pdcProgramInfo/{{ $programID }}" class="btn btn-primary apply-btn mt-5">پروګرامونه ووینی</a>

        <div class="content container-fluid">





            <div class="row justify-content-center">

                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header p-lg-5">
                            <h4 class="card-title mb-0">د اړونده پروګرام د کیفیت لپاره پوښټنلیک رامنځته کړی</h4>
                        </div>
                        <div class="card-body">
                            <form action="/admin/feedbackFormInsertion" method="POST">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <input class="d-none" type="text" name="program_id" id=""
                                    value="{{ $programID }}">
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
                                <div class="row" id="files">
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control " placeholder="پوښتنه ولیکی"
                                            name="feedback_question[0]">
                                    </div>
                                    <div class="input-group mb-5 col-md-12">
                                        <select class="custom-select" id="inputGroupSelect02"
                                            name="feedback_question_category[0]">
                                            <!-- <option selected>د پوښتني کټګوري انتخاب کړی</option> -->
                                            <option selected></option>
                                            <option value="د ورکشاپ/ټرېنینګ مواد">د ورکشاپ/ټرېنینګ مواد</option>
                                            <option value="آسانتیاوي">آسانتیاوي</option>
                                            <option value="ځاي">ځاي</option>
                                            <option value="عمومي نظر">عمومي نظر</option>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="inputGroupSelect02">
                                                د پوښتني کټهګوري
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="form-group m-auto ">
                                        <button type="button" id="file-remover"
                                            class="btn btn-info mx-auto rounded-circle d-none" style="font-size: 20px;"
                                            onclick="removeFile()">&times;</button>
                                        <button type="button" class="btn btn-info mx-auto rounded-circle"
                                            style="font-size: 20px;;" onclick="addFile()">&plus;</button>
                                    </div>
                                </div>

                                <div class="text-right mt-5">
                                    <button type="submit" class="btn btn-primary w-25" onclick="afterText()">پوښتلیک ثبت
                                        کړی</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
@endsection


@section('custom-js')
    <script>
        var count4 = 2;
        index = 1;

        function addFile() {
            var txt1 = `
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control "  placeholder="پوښتنه ولیکی" name="feedback_question[${index}]">
                                        </div>
                                        <div class="input-group mb-5 col-md-12">
                                            <select class="custom-select" id="inputGroupSelect02" name="feedback_question_category[${index}]">
                                                <!-- <option selected>د پوښتني کټګوري انتخاب کړی</option> -->
                                                <option selected></option>
                                                <option value="د ورکشاپ/ټرېنینګ مواد">د ورکشاپ/ټرېنینګ مواد</option>
                                                <option value="آسانتیاوي">آسانتیاوي</option>
                                                <option value="ځاي">ځاي</option>
                                                <option value="عمومي نظر">عمومي نظر</option>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="inputGroupSelect02">
													د پوښتني کټهګوري
												</label>
                                            </div>
                                        </div>
                                    `;

            $("#files").children().last().after(txt1);
            $('#file-remover').removeClass('d-none');
            count4++; // Insert new elements after img
            index++;
        }

        function removeFile() {

            if (count4 != 2) {
                $('#files').children().last().remove();
                $('#files').children().last().remove();
                count4--;
                index--;
            }
            if (count4 == 2) {
                $('#file-remover').addClass('d-none');

            }

        }
    </script>
@endsection
