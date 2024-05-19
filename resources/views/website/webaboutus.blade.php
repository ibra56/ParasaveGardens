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
        <div class="back_re">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>About Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about -->
        <div class="about">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <div class="titlepage">

                            <p class="margin_0">At <span style="color: #eb7134">Interconnect Airport Cottages</span>, we understand the struggles of travel.
                                We're not just offering rooms, we're offering a stress-free experience. Our cottages are
                                designed to make your stay as comfortable and convenient as possible, helping you focus
                                on your journey, not your worries.

                                With prime location and top-notch amenities, we've got your back every step of the way.
                            </p>
                            <a class="read_more" href="Javascript:void(0)"> Read More</a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="about_img">
                            <figure><img src="images/about.png" alt="#" /></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end about -->

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
    </body>

</html>
