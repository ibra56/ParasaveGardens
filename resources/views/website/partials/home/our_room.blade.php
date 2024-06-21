{{-- <div class="our_room">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Discover Our Rooms</h2>
                    <p>Experience unparalleled comfort and convenience at Interconnect Airport Cottages. Each of our
                        rooms is designed to provide a restful retreat, perfect for travelers seeking a seamless stay.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($rooms as $room)
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img style="height: 300px" src="{{ asset('storage/'.$room->image_path) }}" alt="interconnect airport cottages" /></figure>
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
                            <h3>Dummy Bedroom</h3>
                            <p>Appologies! We dont have any rooms available</p>
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
                    <h2>Discover Our Room</h2>
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
