@extends('layouts.frontal')

@section('pageTitle')
  Gallery
@endsection

@section('breadCrumb')
  Gallery
@endsection


@section('content')
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <p>Some photos from our past events</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">
          @foreach ($photos as $photo)
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="{{$photo->photo_path}}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{$photo->photo_path}}" alt="{{$photo->caption}}" class="img-fluid">
              </a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Gallery Section -->
    
@endsection