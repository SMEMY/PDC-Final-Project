<body>
<!-- Header -->
<div class="header">

<!-- Logo -->
<div class="header-left">
    <a href="/admin/dashboard" class="logo">
        <img src="{{asset('assets/img/logo.png')}}" width="40" height="40" alt="">
    </a>
</div>
<!-- /Logo -->

<a id="toggle_btn" href="javascript:void(0);">
    <span class="bar-icon">
        <span></span>
        <span></span>
        <span></span>
    </span>
</a>

<!-- Header Title -->
<div class="page-title-box">
    <h3 style="font-size:25px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;">مسلکي پرمختائي مرکز</h3>
</div>
<!-- /Header Title -->
<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

<!-- Header Menu -->
<ul class="nav user-menu">
      <li class="nav-item dropdown has-arrow main-drop">
        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
            <span class="user-img"><img src="{{asset('assets/img/profiles/avatar-21.jpg')}}" alt="">
                <span class="status online"></span></span>
            <span>Admin</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="settings.html">Settings</a>
            <a class="dropdown-item" href="login.html">Logout</a>
        </div>
    </li>
</ul>
<!-- /Header Menu -->

<!-- Mobile Menu -->
<div class="dropdown mobile-user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
            class="fa fa-ellipsis-v"></i></a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="profile.html">My Profile</a>
        <a class="dropdown-item" href="settings.html">Settings</a>
        <a class="dropdown-item" href="login.html">Logout</a>
    </div>
</div>
<!-- /Mobile Menu -->

</div>
<!-- /Header -->