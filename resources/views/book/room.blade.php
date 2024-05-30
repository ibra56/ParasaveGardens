<div class="booking_ocline">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="book_room">
                    <h1>Book a Room Online</h1>
                    <form class="book_now">
                        <div class="row">
                            <div class="col-md-12">
                                <span>Arrival</span>
                                <img class="date_cua" src="images/date.png">
                                <input class="online_book" placeholder="dd/mm/yyyy" type="date"
                                    name="dd/mm/yyyy">
                            </div>
                            <div class="col-md-12">
                                <span>Departure</span>
                                <img class="date_cua" src="images/date.png">
                                <input class="online_book" placeholder="dd/mm/yyyy" type="date"
                                    name="dd/mm/yyyy">
                            </div>
                            {{-- add room price --}}
                            <div class="col-md-12">
                                <span>Room Price</span>
                                <select class="online_book">
                                    <option class="online_book">Select Room Price</option>
                                    {{-- @foreach ($roomPrices as $roomPrice)
                                        <option value="{{ $roomPrice->id }}">{{ $roomPrice->price }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button class="book_btn">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>