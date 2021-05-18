@extends('layouts.frontal')

@section('pageTitle')
Donations
@endsection

@section('breadCrumb')
Donations
@endsection

@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <p>Please fill the form below to proceed with your donation.</p>
        </div>
      </div>
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 mt-lg-0">
            @include('inc.messages')
            <form action="{{ route('pay') }}" method="POST" role="form" class="form-data" id="paymentForm">
              {{ csrf_field() }}

              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your phone number" required>
                </div>
              </div>
              
              <div class="form-group mt-3">
                <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount you wish to donate" required>
              </div>
              
              <div class="text-center"><button type="submit">Donate</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    
@endsection