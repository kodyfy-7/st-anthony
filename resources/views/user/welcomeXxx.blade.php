@extends('layouts.front')

@section('pageTitle')
  Welcome
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <br><br>
        <div class="hero-text" data-aos="zoom-out">
            <h2 style="margin-top: 250px">Welcome to <br> St. Anthony <br> Catholic Church</h2>
            <p>Building The Hope</p>
            <a href="#about" class="btn-get-started scrollto">Learn about our mission, our beliefs, and the hope we have in Jesus.</a>
        </div>

        

    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="section-bg">
        <div class="container-fluid" data-aos="fade-up">
            <div class="section-header">
                <h3 class="section-title">About Us</h3>
                <span class="section-divider"></span>
                <p class="section-description">
                    A church isn't a building—it's the people. We meet in Church everyday for prayers for different occasion. Sunday Mass: 6:30a.m. 9:30a.m. and 6:30p.m.
                </p>
            </div>

            <div class="row">
            <div class="col-lg-6 about-img" data-aos="fade-right" dat-aos-delay="100">
                <img src="{{asset('frontend/assets/img/9.jpg')}}" alt="">
            </div>

            <div class="col-lg-6 content" data-aos="fade-left" dat-aos-delay="100">
                <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elite storium paralate</h2>
                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>

                <ul>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                </ul>

                <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Libero justo laoreet sit amet cursus sit amet dictum sit. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec
                </p>
            </div>
            </div>

        </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->
@endsection