<div class="footer">
    <div class="container">
        <div class="row">
            <div class=" col-md-4">
                <h3>Contact US</h3>
                <ul class="conta">
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> Airport Rd, Kitooro, Entebbe, Kampala
                        (U)</li>
                    <li><i class="fa fa-mobile" aria-hidden="true"></i> +256 788 239868</li>
                    <li> <i class="fa fa-envelope" aria-hidden="true"></i><a
                            href="mailto:info@interconnectairportcottages.info">
                            info@interconnectairportcottages.info</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Menu Link</h3>
                <ul class="link_menu">
                    <li class="@if (Route::currentRouteName() == 'homepage') active @endif"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="@if (Route::currentRouteName() == 'about') active @endif"><a href="{{ route('about') }}">About</a></li>
                    <li class="@if (Route::currentRouteName() == 'room') active @endif"><a href="{{ route('room') }}">Our Room</a></li>
                    <li class="@if (Route::currentRouteName() == 'gallery') active @endif"><a href="{{ route('gallery') }}">Gallery</a></li>
                    <li class="@if (Route::currentRouteName() == 'blog') active @endif"><a href="{{ route('blog') }}">Blog</a></li>
                    <li class="@if (Route::currentRouteName() == 'contact-us') active @endif"><a href="{{ route('contact-us') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>News letter</h3>
                <form class="bottom_form">
                    <input class="enter" placeholder="Enter your email" type="text"
                        name="Enter your email">
                    <button class="sub_btn">subscribe</button>
                </form>
                <ul class="social_icon">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">

                    <p>
                        © {{ date('Y') }} All Rights Reserved by <a
                            href="{{ route('homepage') }}">Inter Connect Airport Cottages</a>
                        <br><br>
                        Powered by <a href="https://hollytechsolnz.rf.gd/">Holly Tech Solutions</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>