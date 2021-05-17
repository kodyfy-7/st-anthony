@extends('layouts.panel')

@section('title')
  Dashboard
@endsection

@section('page_title')
  Dashboard 
@endsection

@section('style')
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('panel/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('panel/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">
@endsection

@section('content')
    @if ($profile->profile_status > 0)

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{$profile->profile_photo_path}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$profile->full_name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>{{$profile->gender}}</b>
                  </li>
                  <li class="list-group-item">
                    <b>{{$profile->home_address}}</b>
                  </li>
                  <li class="list-group-item">
                    <b>{{$profile->user->email}}</b>
                  </li>
                  <li class="list-group-item">
                    <b>{{$profile->mobile_number}}</b>
                  </li>
                </ul>
                

                <a href="{{route('profile')}}" class="btn btn-primary btn-block"><i class="fa fa-edit m-right-xs"></i><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Church Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Station</strong>

                <p class="text-muted" style="text-transform: capitalize">
                  @if ($profile->station_id == null)
                                    Null
                                  @else
                                    {{$profile->station->station_name}}
                  @endif
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Groups</strong>
                
                @if (count($mem) > 0)
                  @foreach ($mem as $mem)
                    <p class="text-muted" style="text-transform: capitalize">{{$mem->group->group_title}}</p>
                  @endforeach
                @else
                  <p class="text-muted">Null</p>
                @endif
                <hr>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Sacrements</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    
                              <!-- start accordion -->
                              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                  <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">Baptism</h4>
                                  </a>
                                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      <div class="row">
                                        @if ($profile->baptism_name != null)
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Baptism Name</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->baptism_name}}
                                            </h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Baptism Date</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->baptism_date}}
                                            </h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Baptism Place</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->baptism_place}}
                                            </h4>
                                          </div>
                                        @else 
                                          <p>Status: <button type="button" class="btn btn-warning btn-xs">Not recieved</button></p>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title">Communion</h4>
                                  </a>
                                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                      <div class="row">
                                        @if ($profile->communion_date != null)
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Communion Date</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->communion_date}}
                                            </h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Communion Place</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->communion_place}}
                                            </h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Communion Minister</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->communion_minister}}
                                            </h4>
                                          </div>
                                        @else 
                                          <p>Status: <button type="button" class="btn btn-warning btn-xs">Not recieved</button></p>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title">Confirmation</h4>
                                  </a>
                                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        @if ($profile->confirmation_name != null)
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Confirmation Name</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->confirmation_name}}
                                            </h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Confirmation Date</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->confirmation_date}}
                                            </h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Confirmation Place</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->confirmation_place}}
                                            </h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Confirmation Minister</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->confirmation_minister}}
                                            </h4>
                                          </div>
                                        @else 
                                          <p>Status: <button type="button" class="btn btn-warning btn-xs">Not recieved</button></p>
                                        @endif
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <h4 class="panel-title">Marriage</h4>
                                  </a>
                                  <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        @if ($profile->marriage_spouse != null)
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Spouse</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->marriage_spouse}}
                                            </h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Confirmation Date</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->marriage_date}}
                                            </h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Marriage Place</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->marriage_place}}
                                            </h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Marriage Minister</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->marriage_minister}}
                                            </h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Maiden Name</h4>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4 style="text-transform: capitalize">
                                              {{$profile->maiden_name}}
                                            </h4>
                                          </div>
                                        @else 
                                          <p>Status: <button type="button" class="btn btn-warning btn-xs">Not recieved</button></p>
                                        @endif
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- end of accordion -->
                         
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    @else
     <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Fill your profile details</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        
        {!! Form::open(['route' => 'save.profile', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="card-body">
                @include('user.profile_form3')
            </div>
            <!-- /.card-body -->                       
            
            <div class="card-footer">
                <div class="col-md-12">
                    {{Form::button('<i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-info btn-block'])}}
                  </div> 
            </div>
            <!-- /.card-footer-->
        {!! Form::close() !!}
      </div>
      <!-- /.card -->
    @endif

@endsection

@section('script')

<!-- Select2 -->
<script src="{{asset('panel/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('panel/plugins/toastr/toastr.min.js')}}"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>


<script>
  @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>

@endsection