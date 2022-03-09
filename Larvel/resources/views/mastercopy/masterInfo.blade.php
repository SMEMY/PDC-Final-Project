<!-- here we add the head.blade.php file for css links and more -->
@include('master.masterContent.head')

<!-- here we just define the generall div with main-wrapper class -->

<div class="main-wrapper">

    <!-- here we the header.blade.php file -->
    @include('master.masterContent.header')

    <!-- here we add the sidebar.blade.php file -->
    @include('master.masterContent.sidebarTwo')

    <!-- here we leave the area for cutom HTML Elements -->
    @yield('content')
</div>

<!-- here we add the footer.blade.php for js links and more -->
@include('master.masterContent.footer')
