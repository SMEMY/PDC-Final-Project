<!-- here we add the head.blade.php file for css links and more -->
@include('mastercommon.masterContent.head')

<!-- here we just define the generall div with main-wrapper class -->
<div class="main-wrapper">

<!-- here we the header.blade.php file -->
@include('mastercommon.masterContent.header')

<!-- here we add the sidebar.blade.php file -->
@include('mastercommon.masterContent.sidebar')

<!-- here we leave the area for cutom HTML Elements -->
@yield('content')
</div>

<!-- here we add the footer.blade.php for js links and more -->
@include('mastercommon.masterContent.footer')