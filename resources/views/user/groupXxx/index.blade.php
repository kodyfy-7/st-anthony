@extends('layouts.front')

@section('title')
    {{$groupName}}
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>{{$groupName}}</h2>
            <ol>
                <li><a href="{{route('welcome')}}">Home</a></li>
                <li>{{$groupName}}</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h3 class="section-title">{{$groupName}}</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>
                <div class="row">
                    @foreach ($groups as $group)
                        <div class="col-lg-3 col-md-6">
                            <div class="member">
                                <div class="pic"><img src="{{$group->group_profile_photo_path}}" alt="kmlk"></div>
                                <h4>{{$group->group_title}}</h4>
                                <span>{{$group->group_motto}}</span>
                                <div class="social">
                                    <a href="/group/{{$group->group_slug}}"><i class="bi bi-link"></i>View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
@endsection
