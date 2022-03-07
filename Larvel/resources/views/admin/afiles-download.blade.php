<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>feedback</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" /> -->

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">

    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Tagsinput CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->
    <style>
        input {
            border-radius: 4px !important;
        }

        h6 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 17px !important;
        }

        h4 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 22px !important;
            font-weight: bolder;
            background: #98d9ff6e !important;
            text-align: center !important;
        }

        #title {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            font-size: 30px !important;
            font-weight: bold !important;

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

    </style>
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <a href="/admin/pdcProgramInfo/{{ $program_id }}" class="btn btn-primary apply-btn">پروګرام ووینی</a>



        <!-- Page Wrapper -->
        <div style="position: relative; top:40px">

            <!-- Page Content -->
            <div class="content container-fluid">

                <div class="row p-5">
                    <div class="col-md-12 ">
                        <div class="file-wrap file-sidebar-toggle">

                            <div class="file-cont-wrap w-100">
                                <div class="file-cont-inner">
                                    <div class="file-cont-header bg-info rounded">
                                        <div class="file-options">
                                        </div>
                                        <span class="text-center mx-auto d-block " id="title">
                                            {{ $programMaterials->name }} پروګرام اړونده فایلونه </span>
                                    </div>
                                    <div class="file-content">

                                        <div class="file-body">
                                            <div class="file-scroll">
                                                <div class="file-content-inner">
                                                    <h4 class="p-4 rounded">لکچرونه</h4>
                                                    <div class="row">

                                                        @foreach ($programMaterials->getMaterials as $material)
                                                            @if ($material->type === 'لکچر')
                                                                <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                                    <div class="card card-file">
                                                                        <div class="dropdown-file">
                                                                            <a href="" class="dropdown-link"
                                                                                data-toggle="dropdown"><i
                                                                                    class="fa fa-ellipsis-v"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-right">
                                                                                <a href="/admin/downloadMaterial/{{ $material->path }}"
                                                                                    class="dropdown-item"><i
                                                                                        class="fa fa-download m-r-5"></i>را کښته کړی</a>
                                                                                <a class="dropdown-item"
                                                                                    href="/admin/deleteMaterial/{{ $material->path }}"
                                                                                    data-toggle="modal"
                                                                                    data-target="#delete_client"
                                                                                    id="path"
                                                                                    onclick="pathFinder(this)"><i
                                                                                        class="fa fa-trash-o m-r-5"></i>
                                                                                    له منځه یې اوسی</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-file-thumb">
                                                                            @if ($material->extension === 'docx')
                                                                                <i class="fa fa-file-word-o"
                                                                                    style="color: rgb(81, 182, 255);"></i>
                                                                            @elseif($material->extension === 'pdf')
                                                                                <i class="fa fa-file-pdf-o"
                                                                                    style="color: rgb(81, 182, 255);"></i>
                                                                            @elseif($material->extension === 'xlsx')
                                                                                <i class="fa fa-file-excel-o"
                                                                                    style="color: rgb(81, 182, 255);"></i>
                                                                            @elseif($material->extension === 'ppt' || $material->extension === 'pptx')
                                                                                <i class="fa fa-file-powerpoint-o"
                                                                                    style="color: rgb(81, 182, 255);"></i>
                                                                            @else
                                                                            @endif
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <h6>{{ $material->name }}</h6>
                                                                            <span class="float-right d-block"
                                                                                dir="ltr">{{ $material->size }}
                                                                                MB</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach




                                                    </div>


                                                    <h4 class="p-4 rounded">کتابونه</h4>
                                                    <div class="row">

                                                        @foreach ($programMaterials->getMaterials as $material)
                                                            @if ($material->type === 'کتاب')
                                                                <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                                    <div class="card card-file">
                                                                        <div class="dropdown-file">
                                                                            <a href="" class="dropdown-link"
                                                                                data-toggle="dropdown"><i
                                                                                    class="fa fa-ellipsis-v"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-right">
                                                                                <a href="/admin/downloadMaterial/{{ $material->path }}"
                                                                                    class="dropdown-item"><i
                                                                                        class="fa fa-download m-r-5"></i>Download</a>
                                                                                <a class="dropdown-item"
                                                                                    href="/admin/deleteMaterial/{{ $material->path }}"
                                                                                    data-toggle="modal"
                                                                                    data-target="#delete_client"
                                                                                    id="path"
                                                                                    onclick="pathFinder(this)"><i
                                                                                        class="fa fa-trash-o m-r-5"></i>
                                                                                    له منځه یې اوسی</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-file-thumb">
                                                                            @if ($material->extension === 'pdf' || $material->extension === 'docx')
                                                                                <i class="fa fa-book"
                                                                                    style="color: rgb(81, 182, 255);"></i>
                                                                            @else
                                                                            @endif
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <h6>{{ $material->name }}</h6>
                                                                            <span class="float-right d-block"
                                                                                dir="ltr">{{ $material->size }}
                                                                                MB</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>



                                                    <h4 class="p-4 rounded">انځورونه</h4>
                                                    <div class="row">

                                                        @foreach ($programMaterials->getMaterials as $material)
                                                            @if ($material->type === 'انځور')
                                                                <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                                    <div class="card card-file">
                                                                        <div class="dropdown-file">
                                                                            <a href="" class="dropdown-link"
                                                                                data-toggle="dropdown"><i
                                                                                    class="fa fa-ellipsis-v"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-right">
                                                                                <a href="/admin/downloadMaterial/{{ $material->path }}"
                                                                                    class="dropdown-item"><i
                                                                                        class="fa fa-download m-r-5"></i>Download</a>
                                                                                <a class="dropdown-item"
                                                                                    href="/admin/deleteMaterial/{{ $material->path }}"
                                                                                    data-toggle="modal"
                                                                                    data-target="#delete_client"
                                                                                    id="path"
                                                                                    onclick="pathFinder(this)"><i
                                                                                        class="fa fa-trash-o m-r-5"></i>
                                                                                    له منځه یې اوسی</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-file-thumb">
                                                                            @if ($material->extension === 'jpeg' || $material->extension === 'png' || $material->extension === 'jpg' || $material->extension === 'gif' || $material->extension === 'svg')
                                                                                <i class="fa fa-file-image-o"
                                                                                    style="color: rgb(81, 182, 255);"></i>
                                                                            @else
                                                                            @endif
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <h6>{{ $material->name }}</h6>
                                                                            <span class="float-right d-block"
                                                                                dir="ltr">{{ $material->size }} MB
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>



                                                    <h4 class="p-4 rounded">وډیوکاني</h4>
                                                    <div class="row">

                                                        @foreach ($programMaterials->getMaterials as $material)
                                                            @if ($material->type === 'وډیو')
                                                                <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                                    <div class="card card-file">
                                                                        <div class="dropdown-file">
                                                                            <a href="" class="dropdown-link"
                                                                                data-toggle="dropdown"><i
                                                                                    class="fa fa-ellipsis-v"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-right">
                                                                                <a href="/admin/downloadMaterial/{{ $material->path }}"
                                                                                    class="dropdown-item"><i
                                                                                        class="fa fa-download m-r-5"></i>Download</a>
                                                                                <a href="/admin/viewMaterial/{{ $material->path }}"
                                                                                    class="dropdown-item"><i
                                                                                        class="fa fa-download m-r-5"></i>view</a>
                                                                                <a class="dropdown-item"
                                                                                    href="/admin/deleteMaterial/{{ $material->path }}"
                                                                                    data-toggle="modal"
                                                                                    data-target="#delete_client"
                                                                                    id="path"
                                                                                    onclick="pathFinder(this)"><i
                                                                                        class="fa fa-trash-o m-r-5"></i>
                                                                                    له منځه یې اوسی</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-file-thumb">
                                                                            @if ($material->extension === 'mp4')
                                                                                <i class="fa fa-file-movie-o"
                                                                                    style="color: rgb(81, 182, 255);"></i>
                                                                            @else
                                                                            @endif
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <h6>{{ $material->name }}</h6>
                                                                            {{-- <video src="{{ asset('storage/programFiles/'.$material->path) }}" controls height="200" width="200"></video> --}}
                                                                            <span class="float-right d-block"
                                                                                dir="ltr">{{ $material->size }} MB
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <h4 class="p-4 rounded">آډیو ګاني</h4>
                                                    <div class="row">

                                                        @foreach ($programMaterials->getMaterials as $material)
                                                            @if ($material->type === 'آډیو')
                                                                <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                                    <div class="card card-file">
                                                                        <div class="dropdown-file">
                                                                            <a href="" class="dropdown-link"
                                                                                data-toggle="dropdown"><i
                                                                                    class="fa fa-ellipsis-v"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-right">
                                                                                <a href="/admin/downloadMaterial/{{ $material->path }}"
                                                                                    class="dropdown-item"><i
                                                                                        class="fa fa-download m-r-5"></i>Download</a>
                                                                                <a class="dropdown-item"
                                                                                    href="/admin/deleteMaterial/{{ $material->path }}"
                                                                                    data-toggle="modal"
                                                                                    data-target="#delete_client"
                                                                                    id="path"
                                                                                    onclick="pathFinder(this)"><i
                                                                                        class="fa fa-trash-o m-r-5"></i>
                                                                                    له منځه یې اوسی</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-file-thumb">
                                                                            @if ($material->extension === 'mp3' || $material->extension === 'wav' || $material->extension === 'm4a')
                                                                                <i class="fa fa-file-audio-o"
                                                                                    style="color: rgb(81, 182, 255);"></i>
                                                                            @else
                                                                            @endif
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <h6>{{ $material->name }}</h6>
                                                                            <span class="float-right d-block"
                                                                                dir="ltr">{{ $material->size }} MB
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Content -->
            <!-- Delete Client Modal -->
            <div class="modal custom-modal fade" id="delete_client" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>ښاغلی/آغلې له منځه وړل</h3>
                                <p>آیا تاسي باوري یاست چي یاد کس له سیسټم څخه له منځه یوسي؟</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="" method="post" id="pathGetter">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <input class="d-none" type="number" name="program_id"
                                                id="file_name" value="{{ $program_id }}">
                                            <button type="submit" class="btn btn-primary continue-btn col-md-12">له
                                                منځه یې اوسی</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal"
                                            class="btn btn-primary cancel-btn">قطعه یې کړی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Client Modal -->

        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- Datetimepicker JS -->
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Select2 JS -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <!-- Tagsinput JS -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <!-- sweet alert -->
    <script src="{{ asset('assets/sweet-alert/sweetalert.min.js') }}"></script>
    @if (Session::has('success'))
        <script>
            swal('ډېر ښه!', "{!! Session::get('success') !!}", "success", {
                button: "سمده",
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
    </script>
</body>

</html>
