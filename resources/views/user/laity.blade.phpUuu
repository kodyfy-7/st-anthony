@extends('layouts.frontal')

@section('pageTitle')
  {{$groupName}}
@endsection

@section('breadCrumb')
  {{$groupName}}
@endsection


@section('content')
    <!-- ======= groups Section ======= -->
    <section id="groups" class="groups">
      <div class="container" data-aos="fade-up">

        <div class="row">
          @foreach ($groups as $group)
            <div class="col-lg-4 col-md-6">
              <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="{{$group->group_profile_photo_path}}" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                  <h4>{{$group->group_title}}</h4>
                  <span>{{$group->group_motto}}</span>
                </div>
                  <div class="social">
                  <a href="/group/{{$group->group_slug}}"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End groups Section -->
    
@endsection