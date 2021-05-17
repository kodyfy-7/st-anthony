

@extends('layouts.front')

@section('title')
    Contact Us
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Donations</h2>
            <ol>
                <li><a href="{{route('welcome')}}">Home</a></li>
                <li>Donations</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact">
            <div class="container" data-aos="fade-up">
                <div class="row">
  
    
    
                <div class="col-lg-12 col-md-12">
                    <div class="form">
                    
                      <h3>We accept donation</h3>
<h3>Buy Movie Tickets N500.00</h3>
<form method="POST" action="{{ route('pay') }}" id="paymentForm">
    {{ csrf_field() }}

    <input name="name" placeholder="Name" />
    <input name="email" type="email" placeholder="Your Email" />
    <input name="phone" type="tel" placeholder="Phone number" />

    <input name="amount" type="number" placeholder="Amount" />

    <input type="submit" value="Buy" class="btn btn-success" />
</form>

                    
                    </div>
                </div>
    
                </div>
    
            </div>
            </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
