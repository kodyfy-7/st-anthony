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
        <div class="section-title">
          <p>{{$group->group_title}}</p>
          <span><small>{{$group->group_motto}}</small></span>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="member">
              <div class="pic"><img src="{{$group->group_profile_photo_path}}" alt="kmlk">
              </div>
              <h4>{{$group->group_description}}</h4>
              <span>{{$group->group_time_meeting}}</span>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div>
              <h4>Meeting Summary</h4>
              <p>
                @if($meetingSummary)
                  {{$meetingSummary->summary}}
                @endif
              </p>
            </div>
            <div>
                      <h4>Meeting Summary</h4>
                      <p>Lorem Impusm why</p>
            </div>
            
            @auth
              @if(auth()->user()->id == $group->user_id)
                <div class="social">
            <form action="{{ route('group.summary.save') }}" method="post" role="form">
                @csrf
                <div class="row">
                  <input type="hidden" name="group_id" value="{{$group->id}}">
                  <textarea class="form-control" name="summary" rows="5" placeholder="Meeting Summary" required></textarea>
                </div>
                              
                <div class="text-center"><button type="submit" title="Save">Send Message</button></div>
              </form>
            </div>
              @endif
            @endauth
                    
          <div>
        </div>
      </div>
    </section><!-- End groups Section -->
    
@endsection