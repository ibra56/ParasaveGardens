<div class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>gallery</h2>
                </div>
            </div>
        </div>
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
                                    alt="{{ $item->title ?? 'Interconnect Airport Cottages' }}"></figure>
                        @elseif ($item->type == 'video')
                            <video controls>
                                <source src="{{ asset('storage/' . $item->path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </div>
                </div>
            @empty
            @endforelse
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h5 class="card-title">View More</h5>
                        <p class="card-text">Explore more gallery items</p>
                        <a href="{{ route('gallery') }}" class="btn gallery_btn">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
