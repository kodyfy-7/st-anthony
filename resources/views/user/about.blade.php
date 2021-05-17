@extends('layouts.front')

@section('title')
    About Us
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                <h2>About Us</h2>
                <ol>
                    <li><a href="{{route('welcome')}}">Home</a></li>
                    <li>About Us</li>
                </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->
  
      <!-- ======= Featuress Section ======= -->
      <section id="features">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
  
            <div class="col-lg-8 offset-lg-2">
              <div class="section-header">
                <h3 class="section-title">Parish Information</h3>
                <span class="section-divider"></span>
              </div>
            </div>

            <div class="col-lg-12 col-md-12 ">
  
              <div class="row">
  
                <div class="col-lg-6 col-md-6 box" data-aos="fade-up">
                  <div class="icon"><i class="bi bi-briefcase"></i></div>
                  <h4 class="title"><a href="">St. Anthony Mass Schedule</a></h4>
                  <p class="description">
                      Sunday - 8:30am <br>
                      Monday - 6:30am <br>
                      Tuesday - 5:30pm <br>
                      Wednesday - 6:30am <br>
                      Thursday - 5:30pm <br>
                      Friday - 5:30pm <br>
                      Saturday - 6:30am

                  </p>
                </div>
                <div class="col-lg-6 col-md-6 box" data-aos="fade-up">
                  <div class="icon"><i class="bi bi-card-checklist"></i></div>
                  <h4 class="title"><a href="">St. Bernadette Mass Schedule</a></h4>
                  <p class="description">
                    Sunday - 6:30am <br>
                    Monday - 5:30pm <br>
                  </p>
                </div>
                <div class="col-lg-6 col-md-6 box" data-aos="fade-up" dat-aos-delay="100">
                  <div class="icon"><i class="bi bi-binoculars"></i></div>
                  <h4 class="title"><a href="">Infant Baptism</a></h4>
                  <p class="description">Every Saturday</p>
                </div>
                <div class="col-lg-6 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon"><i class="bi bi-brightness-high"></i></div>
                  <h4 class="title"><a href="">Benediction</a></h4>
                  <p class="description">Sunday - 6:00pm</p>
                </div>
                <div class="col-lg-6 col-md-6 box" data-aos="fade-up" dat-aos-delay="100">
                    <div class="icon"><i class="bi bi-binoculars"></i></div>
                    <h4 class="title"><a href="">Confession</a></h4>
                    <p class="description">Every Saturday</p>
                  </div>
                  <div class="col-lg-6 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bi bi-brightness-high"></i></div>
                    <h4 class="title"><a href="">Catechism</a></h4>
                    <p class="description">Saturday - Baptism and First Communion - 4:00pm <br> Sunday - Baptism and First Communion & Confirmation - 4:00pm </p>
                  </div>
              </div>
  
            </div>
  
          </div>
  
        </div>
  
      </section><!-- End Featuress Section -->

        
    </main><!-- End #main -->
@endsection
