@extends('master.master')
@section('custom-css')
    li{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 20px !important;
    }
    h3{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
    font-size: 30px !important;
    }
@endsection



@section('content')
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">پېږندپاڼه</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">د آدمېن معرفت</li>
                                <li class="breadcrumb-item active">پېږندپاڼه</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view p-5">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="#"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic ">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="profile-info-left">
                                                    <ul class="personal-info">
                                                        <li>
                                                            <div class="title">نوم: </div>
                                                            <div class="text"><a
                                                                    href="">{{ $user_info[0]->name }}</a></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">تخلص: </div>
                                                            <div class="text"><a
                                                                    href="">{{ $user_info[0]->last_name }}</a></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">جنسیت: </div>
                                                            <div class="text"><a
                                                                    href="">{{ $user_info[0]->last_name }}</a></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Phone:</div>
                                                            <div class="text"><a
                                                                    href="">{{ $user_info[0]->phone_number }}</a></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">برېښنالیک:</div>
                                                            <div class="text"><a
                                                                    href="">{{ $user_info[0]->email }}</a></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">کاري دفتر:</div>
                                                            <div class="text"><a
                                                                    href="">{{ $user_info[0]->email }}</a></div>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="personal-info">


                                                    <li>
                                                        <div class="title">کاري بلاک:</div>
                                                        <div class="text text-center"><a
                                                                href="">{{ $user_info[0]->email }}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title " style="white-space: nowrap;">کاري
                                                            دیپارټمنټ:</div>
                                                        <div class="text text-center"><a
                                                                href="">{{ $user_info[0]->email }}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">کاري منصب:</div>
                                                        <div class="text text-center"><a
                                                                href="">{{ $user_info[0]->email }}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title" style="white-space: nowrap;">کاري منصب
                                                            برخه:</div>
                                                        <div class="text text-center"><a
                                                                href="">{{ $user_info[0]->email }}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title" style="white-space: nowrap;"> علمي درجه:
                                                        </div>
                                                        <div class="text text-center"><a
                                                                href="">{{ $user_info[0]->email }}</a></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-edit"><a class="edit-icon"
                                            href="/admin/profile/{{ auth()->user()->id }}/edit"><i
                                                class="fa fa-pencil"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 p-3 pl-4" style="text-align: center">
                            <i class="fa fa-key text-danger"></i>
                            <a href="/admin/passwordChange/{{ auth()->user()->id }}" class="text-danger"
                                style="font-weight:bold">د اډمېن پاسورډ تغیرول</a>
                        </div>
                    </div>
                </div>




            </div>

        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection



@section('custom-js')
    @if (Session::has('profile_edited'))
        <script>
            swal('مبارک', "{!! Session::get('profile_edited') !!}", "success", {
                button: "مننه",
            });
        </script>
        @endif @if (Session::has('password_changed'))
            <script>
                swal('مبارک', "{!! Session::get('password_changed') !!}", "success", {
                    button: "مننه",
                });
            </script>
        @endif
    @endsection
