@extends('layouts.front')

@section('title')
    Gallery
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Gallery</h2>
            <ol>
                <li><a href="{{route('welcome')}}">Home</a></li>
                <li>Gallery</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="mb-5">
            <div class="container-fluid" data-aos="fade-up">
                <div class="section-header">
                <h3 class="section-title">Gallery</h3>
                <span class="section-divider"></span>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>
    
                <div class="row no-gutters">
    
                    @foreach ($photos as $photo)
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <a href="{{$photo->photo_path}}" data-gall="portfolioGallery" class="gallery-lightbox">
                                    <img src="{{$photo->photo_path}}" alt="">
                                </a>
                            </div>
                        </div>
                    @endforeach
    
                </div>
    
            </div>
        </section><!-- End Gallery Section -->

    </main><!-- End #main -->
@endsection