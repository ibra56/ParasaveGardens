<div class="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="titlepage">
                    <h2>About Us</h2>
                    <p>At <span style="color: #eb7134">Interconnect Airport Cottages</span>, we understand the struggles
                        of travel. We're not just offering
                        rooms, we're offering a stress-free experience. Our cottages are designed to make your stay as
                        comfortable and convenient as possible, helping you focus on your journey, not your worries.
                    </p>
                    <p>Located in Entebbe, Plot 57, Kiwafu Close, 1.5km from Entebbe International Airport, 50m from United Nations MONUSCO Airbase.
                        <span class="text-green"><a style="color: #eb7134" href="#map_main">View on Map</a></span>
                    </p>
                    <p>With prime location and top-notch variety of amenities, we've got your back every step
                        of the way.</p>
                    @if (Route::currentRouteName() != 'about')
                        <a class="read_more" href="{{ route('about') }}"> Read More</a>
                    @endif
                </div>
            </div>
            <div class="col-md-7">
                <div class="about_img">
                    <figure><img src="images/8G5A3328.JPG" alt="#" /></figure>
                </div>
            </div>
        </div>
    </div>
</div>
