<!DOCTYPE html>
<html lang="en">

    <head>
        @include('website.partials.head')
    </head>
    <!-- body -->

    <body class="main-layout inner_page">
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
                            <h2>Blog</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog -->
        <div class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">

                            <p class="margin_0">
                                Discover the latest news, travel tips, and local insights from Interconnect Airport
                                Cottages.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="blog_box">
                            <div class="blog_img">
                                <figure><img src="images/now-open-post.jpg" alt="#" /></figure>
                            </div>
                            <div class="blog_room">
                                <h3>Interconnect Airport Cottages is Now Open!</h3>
                                <span>News</span>
                                <p>Hello Travelers,</p>
                                <p>
                                    We are thrilled to announce the grand opening of Interconnect Airport Cottages, your
                                    new
                                    haven for comfort and convenience right next to the airport. Our cottages are now
                                    open and
                                    ready to welcome guests from around the globe.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog_box">
                            <div class="blog_img">
                                <figure><img src="images/blog2.jpg" alt="#" /></figure>
                            </div>
                            <div class="blog_room">
                                <h3>Special Opening Offers at Interconnect Airport Cottages</h3>
                                <span>Offers</span>
                                <p>Hello Savvy Travelers,</p>
                                <p>To celebrate the grand opening of Interconnect Airport Cottages, we are excited to
                                    offer
                                    special discounted rates for a limited time! This is the perfect opportunity to
                                    experience
                                    our luxurious accommodations and top-notch amenities at an unbeatable price.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog_box">
                            <div class="blog_img">
                                <figure><img src="images/manager-2024.jpg" height="100" width="200" alt="#" /></figure>
                            </div>
                            <div class="blog_room">
                                <h3> Meet the Team at Interconnect Airport Cottages</h3>
                                <span>Team</span>
                                <p>Hello Guests,</p>
                                <p>At Interconnect Airport Cottages, we believe that a great stay starts with a great
                                    team. We
                                    are proud to introduce you to the dedicated individuals who are here to ensure your
                                    stay is
                                    as comfortable and enjoyable as possible.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end blog -->

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
