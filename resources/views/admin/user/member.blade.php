@extends('layouts.panel')

@section('title')
  Users
@endsection

@section('page_title')
  Users | <a href="/sysAdmin/users/create"  class="btn btn-default btn-sm"><i class="fa fa-plus"></i></a>
@endsection

@section('breadcrumb')
  Users
@endsection


@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('panel/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('panel/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('panel/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">

@endsection

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            @forelse ($users as $user)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                            <h2 class="lead"><b>{{ $user->profile->full_name }}</b></h2>
                            <p class="text-muted text-sm"><b>Address: </b> {{ $user->profile->address }}</p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email Address: </li>
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{ $user->profile->mobile_number }}</li>
                            </ul>
                            </div>
                            <div class="col-5 text-center">
                            <img src="{{ $user->profile->profile_photo_path }}" alt="" class="img-circle img-fluid">
                            </div>
                        </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal" data-toggle="modal" data-target="#view-profile{{ $user->id }}" title="View Profile">
                                    <i class="fas fa-user"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse

          </div>
        </div>
        <div class="card-footer">
            <!--<nav aria-label="Contacts Page Navigation">
              <ul class="pagination justify-content-center m-0">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item"><a class="page-link" href="#">8</a></li>
              </ul>
            </nav>-->
            <div class="d-flex justify-content-center">
                {!! $users->links() !!}
            </div>
        </div>
        <!-- /.card-footer -->
    </div>
    @foreach ($users as $user)
                      <div class="modal fade" id="view-profile{{ $user->id }}">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">{{$user->profile->full_name}}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-3">
                      
                                  <!-- Profile Image -->
                                  <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                      <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{$user->profile->profile_photo_path}}"
                                             alt="User profile picture">
                                      </div>
                      
                                      <h3 class="profile-username text-center"></h3>
                      
                                      <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                          <b>{{$user->profile->gender}}</b>
                                        </li>
                                        <li class="list-group-item">
                                          <b>{{$user->profile->home_address}}</b>
                                        </li>
                                        <li class="list-group-item">
                                          <b>{{$user->email}}</b>
                                        </li>
                                        <li class="list-group-item">
                                          <b>{{$user->profile->mobile_number}}</b>
                                        </li>
                                      </ul>
                                      
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
                                        @if ($user->profile->station_id == null)
                                          Null
                                        @else
                                          {{$user->profile->station->station_name}}
                                        @endif
                                      </p>
                      
                                      <hr>
                      
                                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Groups</strong>
                                      
                                      
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
                                                              @if ($user->profile->baptism_name != null)
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Baptism Name</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->baptism_name}}
                                                                  </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Baptism Date</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->baptism_date}}
                                                                  </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Baptism Place</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->baptism_place}}
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
                                                              @if ($user->profile->communion_date != null)
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Communion Date</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->communion_date}}
                                                                  </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Communion Place</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->communion_place}}
                                                                  </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Communion Minister</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->communion_minister}}
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
                                                              @if ($user->profile->confirmation_name != null)
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Confirmation Name</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->confirmation_name}}
                                                                  </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Confirmation Date</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->confirmation_date}}
                                                                  </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Confirmation Place</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->confirmation_place}}
                                                                  </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Confirmation Minister</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->confirmation_minister}}
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
                                                              @if ($user->profile->marriage_spouse != null)
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Spouse</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->marriage_spouse}}
                                                                  </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Confirmation Date</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->marriage_date}}
                                                                  </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Marriage Place</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->marriage_place}}
                                                                  </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Marriage Minister</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->marriage_minister}}
                                                                  </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4>Maiden Name</h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <h4 style="text-transform: capitalize">
                                                                    {{$user->profile->maiden_name}}
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
                                      </div>
                                      <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                </div>
                                <!-- /.col -->
                              </div>
                              <!-- /.row -->
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <a href="#" class="btn btn-primary"><i class="fa fa-edit m-right-xs"></i><b>Edit Profile</b></a>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
    @endforeach 
@endsection

@section('script')

    <!-- Toastr -->
    <script src="{{asset('panel/plugins/toastr/toastr.min.js')}}"></script>

    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
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