@extends('master.master')

<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
    hahahahaaa
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

@endsection

<!-- here we add dynamic content -->
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title"> ?????????????? ????????????????</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">?????????? ????????</a></li>
                            <li class="breadcrumb-item active">????????????????</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <div class="">
                            <input class="form-control " type="month">
                        </div>
                        <label class="focus-label"> </label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="btn btn-success btn-block"> Search </a>
                </div>
            </div>
            <!-- /Search Filter -->
            <h3>?? ?????????? ????????????????????: ?????????? ???????? ??????????</h3>
            <h3>?? ?????????? ????????????????????: ???????????? ???????????? ?????? ???????? ????????????</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>?? ???????????? ???????????? ??????</th>
                                    <th>?? ???????????? ??????????</th>
                                    <th> ???? ???????? ????????????</th>
                                    <th> ???????? ??????</th>
                                    <th>???????? </th>
                                    <th>??????</th>
                                    <th> ???????? </th>
                                    <th> ???????? ???????? ????????</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>1</strong>
                                    </td>
                                    <td>

                                        <strong>????????????</strong>
                                    </td>
                                    <td>?? ?????????????????? ????????????</td>
                                    <td>?? ???????? ?????? ?????? ??????????</td>
                                    <td>???????????? ????????</td>
                                    <td> 1400/3/29-30</td>
                                    <td> 8:00-10:00</td>
                                    <td> ?????? ????????</td>
                                    <td class="text-center"> 27</td>
                                    <td>
                                        <!-- <a href="profile.html" class="avatar avatar-xs">
                 <img src="assets/img/profiles/avatar-04.jpg" alt="">
                </a>
                <h2><a href="profile.html">Loren Gatlin</a></h2>
               </td>
               <td>$ 1215</td>
               <td>Cash</td> -->
                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-dot-circle-o text-danger"></i> Pending
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                        class="fa fa-dot-circle-o text-danger"></i> Pending</a>
                                                <a class="dropdown-item" href="#"><i
                                                        class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>2</strong>
                                    </td>
                                    <td>

                                        <strong>????????????</strong>
                                    </td>
                                    <td>?? ?????????????????? ????????????</td>
                                    <td>?? ???????? ?????? ?????? ??????????</td>
                                    <td>???????????? ????????</td>
                                    <td> 1400/8/19-28</td>
                                    <td> 10:00-12:00</td>
                                    <td> ?????? ????????</td>
                                    <td class="text-center"> 35</td>
                                    <td>
                                        <!-- <a href="profile.html" class="avatar avatar-xs">
                 <img src="assets/img/profiles/avatar-04.jpg" alt="">
                </a>
                <h2><a href="profile.html">Loren Gatlin</a></h2>
               </td>
               <td>$ 1215</td>
               <td>Cash</td> -->
                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-dot-circle-o text-danger"></i> Pending
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                        class="fa fa-dot-circle-o text-danger"></i> Pending</a>
                                                <a class="dropdown-item" href="#"><i
                                                        class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->



@endsection
