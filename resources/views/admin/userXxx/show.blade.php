@extends('layouts.panel')

@section('content')
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
                                    <img src="{{$profile->profile_photo_path}}" alt="Avatar">
                                </div>
                            </div>
                            <!-- end of image cropping -->

                        </div>
                        <h3 style="text-transform: capitalize">{{$profile->first_name}} {{$profile->last_name}}</h3>

                        <ul class="list-unstyled user_data">
                            <li style="text-transform: capitalize"><i class="fa fa-map-marker user-profile-icon"></i> {{$profile->home_address}}
                            </li>

                            <li style="text-transform: capitalize">
                                <i class="fa fa-briefcase user-profile-icon"></i> {{$profile->gender}}
                            </li>

                            <li class="m-top-xs">
                                <i class="fa fa-envelope user-profile-icon"></i>
                                {{$profile->user->email}}
                            </li>

                            <li class="m-top-xs">
                                <i class="fa fa-phone user-profile-icon"></i>
                                {{$profile->mobile_number}}
                            </li>
                        </ul>

                        <a href="{{route('profile')}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                        <br />

                        <!-- start skills -->
                        <h4>Groups Belonged </h4>
                        <ul class="list-unstyled user_data">
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
                                                    @if ($profile->baptism_name == null)
                                                        Null
                                                    @else
                                                        {{$profile->baptism_name}}
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
                                                    @if ($profile->baptism_date == null)
                                                        Null
                                                    @else
                                                        {{$profile->baptism_date}}
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
                                                    @if ($profile->baptism_place == null)
                                                        Null
                                                    @else
                                                        {{$profile->baptism_place}}
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
                                                    @if ($profile->baptism_minister == null)
                                                        Null
                                                    @else
                                                        {{$profile->baptism_minister}}
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
                                                    @if ($profile->baptism_number == null)
                                                        Null
                                                    @else
                                                        {{$profile->baptism_number}}
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
                                                    @if ($profile->communion_date == null)
                                                        Null
                                                    @else
                                                        {{$profile->communion_date}}
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
                                                    @if ($profile->communion_place == null)
                                                        Null
                                                    @else
                                                        {{$profile->communion_place}}
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
                                                    @if ($profile->communion_minister == null)
                                                        Null
                                                    @else
                                                        {{$profile->communion_minister}}
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
                                                    @if ($profile->confirmation_name == null)
                                                        Null
                                                    @else
                                                        {{$profile->confirmation_name}}
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
                                                    @if ($profile->confirmation_date == null)
                                                        Null
                                                    @else
                                                        {{$profile->confirmation_date}}
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
                                                    @if ($profile->confirmation_place == null)
                                                        Null
                                                    @else
                                                        {{$profile->confirmation_place}}
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
                                                    @if ($profile->confirmation_minister == null)
                                                        Null
                                                    @else
                                                        {{$profile->confirmation_minister}}
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
                                                    @if ($profile->marriage_spouse == null)
                                                        Null
                                                    @else
                                                        {{$profile->marriage_spouse}}
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
                                                    @if ($profile->marriage_date == null)
                                                        Null
                                                    @else
                                                        {{$profile->marriage_date}}
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
                                                    @if ($profile->marriage_place == null)
                                                        Null
                                                    @else
                                                        {{$profile->marriage_place}}
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
                                                    @if ($profile->marriage_minister == null)
                                                        Null
                                                    @else
                                                        {{$profile->marriage_minister}}
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
                                                    @if ($profile->maiden_name == null)
                                                        Null
                                                    @else
                                                        {{$profile->maiden_name}}
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
@endsection

@section('script')
@endsection