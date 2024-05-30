<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.partials.head')
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        @include('website.partials.header')
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    @include('website.partials.home.main_banner')
    <!-- end banner -->
    <!-- about -->
    @include('website.partials.home.about')
    <!-- end about -->
    <!-- our_room -->
    @include('website.partials.home.our_room')
    <!-- end our_room -->
    <!-- gallery -->
    @include('website.partials.home.gallery')
    <!-- end gallery -->
    <!-- blog -->
    @include('website.partials.home.blog')
    <!-- end blog -->
    <!--  contact -->
    @include('website.partials.contact')
    <!-- end contact -->
    <!--  footer -->
    <footer>
        @include('website.partials.footer')
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    @livewireScripts
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script> --}}

</body>

</html>
