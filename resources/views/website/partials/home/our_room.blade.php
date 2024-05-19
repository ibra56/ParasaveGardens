<div class="our_room">
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
                            <h3>Dummy Bedroom</h3>
                            <p>Appologies! We dont have any rooms available</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
