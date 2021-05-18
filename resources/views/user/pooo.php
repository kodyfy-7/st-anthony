@extends('layouts.panel')

@section('title')
  Dashboard
@endsection

@section('page_title')
  Dashboard 
@endsection

@section('content')

    @if (auth()->user()->profile->profile_status > 0)

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                            <div class="profile_img">

                                <!-- end of image cropping -->
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="avatar-view" title="Change the avatar">
                                        <img src="{{auth()->user()->profile->profile_photo_path}}" alt="Avatar">
                                    </div>
                                </div>
                                <!-- end of image cropping -->

                            </div>
                            <h3 style="text-transform: capitalize">{{auth()->user()->profile->first_name}} {{auth()->user()->profile->last_name}}</h3>

                            <ul class="list-unstyled user_data">
                                <li style="text-transform: capitalize"><i class="fa fa-map-marker user-profile-icon"></i> {{auth()->user()->profile->home_address}}
                                </li>

                                <li style="text-transform: capitalize">
                                    <i class="fa fa-briefcase user-profile-icon"></i> {{auth()->user()->profile->gender}}
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-envelope user-profile-icon"></i>
                                    {{auth()->user()->email}}
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-phone user-profile-icon"></i>
                                    {{auth()->user()->profile->mobile_number}}
                                </li>
                            </ul>

                            <a href="{{route('profile')}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br />

                            <!-- start skills -->
                            <h4>Groups Belonged </h4>
                            <ul class="list-unstyled user_data">
                              {{$profile->mobile_number}}
                                <li>
                                    <p>Web Applications</p>
                                    <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>Website Design</p>
                                    <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>Automation & Testing</p>
                                    <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>UI / UX</p>
                                    <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                    </div>
                                </li>
                            </ul>
                            <!-- end of skills -->

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="baptism-tab" role="tab" data-toggle="tab" aria-expanded="true">Baptism info</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="communion-tab" data-toggle="tab" aria-expanded="false">Communion info</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="confirmation-tab" data-toggle="tab" aria-expanded="false">Confirmation info</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="marriage-tab" data-toggle="tab" aria-expanded="false">Marriage info</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="baptism-tab">

                                        <ul class="list-unstyled timeline">
                                            <li>
                                              <div class="block">
                                                <div class="tags">
                                                  <a href="" class="tag">
                                                    <span>Name</span>
                                                  </a>
                                                </div>
                                                <div class="block_content">
                                                    <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->baptism_name == null)
                                                            Null
                                                          @else
                                                            {{auth()->user()->profile->baptism_name}}
                                                        @endif
                                                    </h2>
                                                </div>
                                              </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Date</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                          @if (auth()->user()->profile->baptism_date == null)
                                                              Null
                                                          @else
                                                            {{auth()->user()->profile->baptism_date}}
                                                          @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Place</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->baptism_place == null)
                                                            Null
                                                        @else
                                                            {{auth()->user()->profile->baptism_place}}
                                                        @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Minister</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->baptism_minister == null)
                                                            Null
                                                        @else
                                                            {{auth()->user()->profile->baptism_minister}}
                                                        @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Number</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->baptism_number == null)
                                                            Null
                                                        @else
                                                            {{auth()->user()->profile->baptism_number}}
                                                        @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="communion-tab">

                                        <ul class="list-unstyled timeline">
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Date</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                          @if (auth()->user()->profile->communion_date == null)
                                                              Null
                                                          @else
                                                            {{auth()->user()->profile->communion_date}}
                                                          @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Place</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->communion_place == null)
                                                            Null
                                                        @else
                                                            {{auth()->user()->profile->communion_place}}
                                                        @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Minister</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->communion_minister == null)
                                                            Null
                                                        @else
                                                            {{auth()->user()->profile->communion_minister}}
                                                        @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="confirmation-tab">
                                        <ul class="list-unstyled timeline">
                                            <li>
                                              <div class="block">
                                                <div class="tags">
                                                  <a href="" class="tag">
                                                    <span>Name</span>
                                                  </a>
                                                </div>
                                                <div class="block_content">
                                                    <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->confirmation_name == null)
                                                            Null
                                                          @else
                                                            {{auth()->user()->profile->confirmation_name}}
                                                        @endif
                                                    </h2>
                                                </div>
                                              </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Date</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                          @if (auth()->user()->profile->confirmation_date == null)
                                                              Null
                                                          @else
                                                            {{auth()->user()->profile->confirmation_date}}
                                                          @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Place</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->confirmation_place == null)
                                                            Null
                                                        @else
                                                            {{auth()->user()->profile->confirmation_place}}
                                                        @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Minister</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->confirmation_minister == null)
                                                            Null
                                                        @else
                                                            {{auth()->user()->profile->confirmation_minister}}
                                                        @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="marriage-tab">
                                        <ul class="list-unstyled timeline">
                                            <li>
                                              <div class="block">
                                                <div class="tags">
                                                  <a href="" class="tag">
                                                    <span>Name</span>
                                                  </a>
                                                </div>
                                                <div class="block_content">
                                                    <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->marriage_spouse == null)
                                                            Null
                                                          @else
                                                            {{auth()->user()->profile->marriage_spouse}}
                                                        @endif
                                                    </h2>
                                                </div>
                                              </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Date</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                          @if (auth()->user()->profile->marriage_date == null)
                                                              Null
                                                          @else
                                                            {{auth()->user()->profile->marriage_date}}
                                                          @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Place</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->marriage_place == null)
                                                            Null
                                                        @else
                                                            {{auth()->user()->profile->marriage_place}}
                                                        @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Minister</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->marriage_minister == null)
                                                            Null
                                                        @else
                                                            {{auth()->user()->profile->marriage_minister}}
                                                        @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                  <div class="tags">
                                                    <a href="" class="tag">
                                                      <span>Maiden name</span>
                                                    </a>
                                                  </div>
                                                  <div class="block_content">
                                                      <h2 class="title" style="text-transform: capitalize">
                                                        @if (auth()->user()->profile->maiden_name == null)
                                                            Null
                                                        @else
                                                            {{auth()->user()->profile->maiden_name}}
                                                        @endif
                                                      </h2>
                                                  </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Fill in your profile details</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!! Form::open(['route' => 'save.profile', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                            @include('user.profile_form')
                            <div class="col-md-12">
                                {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                            </div> 
            
                            <div class="clearfix"></div>
                        {!! Form::close() !!}
                        
                        
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('script')
    <!-- form wizard -->
    <script type="text/javascript" src="{{asset('backend/js/wizard/jquery.smartWizard.js')}}"></script>
    <!-- pace -->
    <script src="{{asset('backend/js/pace/pace.min.js')}}"></script>
    <!-- form validation -->
  <script src="{{asset('backend/js/validator/validator.js')}}"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="{{asset('backend/js/moment/moment.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/js/datepicker/daterangepicker.js')}}"></script>
  <script>
    // initialize the validator function
    validator.message['date'] = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
      .on('blur', 'input[required], input.optional, select.required', validator.checkField)
      .on('change', 'select.required', validator.checkField)
      .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required')
      .on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

    // bind the validation to the form submit event
    //$('#send').click('submit');//.prop('disabled', true);

    $('form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }

      if (submit)
        this.submit();
      return false;
    });

    /* FOR DEMO ONLY */
    $('#vfields').change(function() {
      $('form').toggleClass('mode2');
    }).prop('checked', false);

    $('#alerts').change(function() {
      validator.defaults.alerts = (this.checked) ? false : true;
      if (this.checked)
        $('form .alert').remove();
    }).prop('checked', false);
  </script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#single_cal2').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_2"
          }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
          });
          // Smart Wizard
          $('#wizard').smartWizard();

          function onFinishCallback() {
              $('#wizard').smartWizard('showMessage', 'Finish Clicked');
              //alert('Finish Clicked');
          }
        });
    </script>
@endsection