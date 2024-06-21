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
        {{-- <div class="our_room">
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
        </div> --}}
        <div class="our_room">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <p>Experience unparalleled comfort and convenience at Interconnect Airport Cottages. Each of our
                                rooms is designed to provide a restful retreat, perfect for travelers seeking a seamless stay.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="room_img">
                            <figure>
                                <img style="width: 100%; height: auto;" src="images/room1.jpg"
                                    alt="Interconnect Airport Cottages" />
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bed_room">
                            {{-- <h3>{{ $rooms->first()->name }}</h3> --}}
                            {{-- <p>{{ $rooms->first()->description }}</p> --}}
                            <h4>Amenities</h4>
                            <ul class="amenities-list">
                                <li>Free Wi-Fi</li>
                                <li>Flat Screen TV</li>
                                <li>Room Service</li>
                                <li>Mini Bar</li>
                                <li>Air Conditioning</li>
                                <li>Complimentary Breakfast</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <style>
            .our_room {
                padding: 3rem 0;
            }
        
            .titlepage {
                text-align: center;
                margin-bottom: 2rem;
            }
        
            .room_img img {
                border-radius: 0.5rem;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        
            .bed_room {
                padding: 1rem;
                background-color: #f9f9f9;
                border-radius: 0.5rem;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        
            .bed_room h3 {
                font-size: 2rem;
                margin-bottom: 1rem;
            }
        
            .bed_room h4 {
                font-size: 1.5rem;
                margin-top: 1.5rem;
            }
        
            .amenities-list {
                list-style-type: none;
                padding: 0;
            }
        
            .amenities-list li {
                margin-bottom: 0.5rem;
                font-size: 1.1rem;
            }
        
            @media (max-width: 768px) {
        
                .room_img,
                .bed_room {
                    text-align: center;
                }
        
                .room_img img {
                    max-width: 80%;
                    margin: 0 auto;
                }
        
                .bed_room h3,
                .bed_room p,
                .bed_room h4 {
                    text-align: center;
                }
            }
        </style>
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
