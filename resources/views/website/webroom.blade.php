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
                            <h2>Our Rooms</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- our_room -->
        <div class="our_room">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <p class="margin_0">
                                Experience unparalleled comfort and convenience at Interconnect Airport Cottages. Each
                                of our
                                rooms is designed to provide a restful retreat, perfect for travelers seeking a seamless
                                stay.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($rooms as $room)
                        <div class="col-md-4 col-sm-6">
                            <div id="serv_hover" class="room">
                                <div class="room_img">
                                    <figure><img src="images/room{{ $room->id }}.jpg" alt="#" /></figure>
                                </div>
                                <div class="bed_room">
                                    <h3>{{ $room->name }}</h3>
                                    <p>{{ $room->description }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-4 col-sm-6">
                            <div id="serv_hover" class="room">
                                <div class="room_img">
                                    <figure><img src="images/room1.jpg" alt="#" /></figure>
                                </div>
                                <div class="bed_room">
                                    <h3>Bed Room</h3>
                                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
        <!-- end our_room -->

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
