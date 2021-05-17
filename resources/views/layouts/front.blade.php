<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Saint') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" sizes="32x32" href="https://res.cloudinary.com/kodyfy/image/upload/v1617713338/mbvronbt1bj3an0rrrfg.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://res.cloudinary.com/kodyfy/image/upload/v1617713311/jcxrl3s95ybtdubfykt7.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">

  @yield('readings')

  <!-- =======================================================
  * Template Name: Avilon - v4.0.1
  * Template URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  

    
    @hasSection ('pageTitle')
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center header-transparent">
            <div class="container d-flex justify-content-between align-items-center">
                @include('inc.links')
            </div>
        </header><!-- End Header -->  
    @else
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex justify-content-between align-items-center">
                @include('inc.links')
            </div>
        </header><!-- End Header -->
    @endif

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
        <div class="row">
            <div class="col-lg-6 text-lg-start text-center">
            <div class="copyright">
                &copy; Copyright <strong>{{ config('app.name', 'Saint') }}</strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
            -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> |
                Developed by <a href="https://ucheofunne.herokuapp.com/">Kodyfy</a>
            </div>
            </div>
            <div class="col-lg-6">
            <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                <!--<a href="{{route('welcome')}}" class="scrollto">Home</a>
                <a href="{{route('about')}}" class="scrollto">About</a>
                <a href="{{route('history')}}">History</a>
                <a href="{{route('contact')}}">Contact us</a>-->
            </nav>
            </div>
        </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-chevron-up"></i></a>

    <!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
    <script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>

</body>

</html>