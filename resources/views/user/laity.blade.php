@extends('layouts.frontal')

@section('pageTitle')
  Parish Council
@endsection


@section('content')

    <!-- ======= groups Section ======= -->
    <section id="groups" class="groups">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>Parish Council</p>
        </div>

        <div class="row">
          @foreach($councils as $council)
          
            <div class="col-lg-4 col-md-6">
              <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="{{ $council->user->profile->profile_photo_path }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{ $council->user->profile->full_name }}</h4>
                  <span>{{ $council->council_role }}</span>
                </div>
              </div>
            </div>
            </div>
          @endforeach
        </div>

      </div>
    </section><!-- End groups Section -->

@endsection