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
                        <h2>gallery</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery -->
    <div class="gallery">
        <div class="container">

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="gallery_img">
                        <figure><img src="images/gallery1.jpg" alt="#" /></figure>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="gallery_img">
                        <figure><img src="images/gallery2.jpg" alt="#" /></figure>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="gallery_img">
                        <figure><img src="images/gallery3.jpg" alt="#" /></figure>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="gallery_img">
                        <figure><img src="images/gallery4.jpg" alt="#" /></figure>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="gallery_img">
                        <figure><img src="images/gallery5.jpg" alt="#" /></figure>
                    </div>
                </div>
                @forelse ($galleryItems as $item)
                    <div class="col-md-3 col-sm-6">
                        <div class="gallery_img">
                            @if ($item->type == 'image')
                                <figure><img src="{{ asset('storage/' . $item->path) }}"
                                        alt="{{ $item->title ?? 'Interconnect Airport Cottages' }}" class="img-fluid">
                                </figure>
                            @elseif ($item->type == 'video')
                                <video controls class="img-fluid">
                                    <source src="{{ asset('storage/' . $item->path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <!-- end gallery -->

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
