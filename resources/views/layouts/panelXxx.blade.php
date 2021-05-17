<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'St. Anthony') }}</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Bootstrap core CSS -->

    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('backend/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{asset('backend/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/icheck/flat/green.css')}}" rel="stylesheet">

    @yield('style')

    <script src="{{asset('backend/js/jquery.min.js')}}"></script>

    <!--[if lt IE 9]>
          <script src="../assets/js/ie8-responsive-file-warning.js')}}"></script>
          <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
          <![endif]-->

  </head>


  <body class="nav-md">

    <div class="container body">


      <div class="main_container">

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><i class="fa fa-bolt"></i> <span>{{ config('app.name', 'St. Anthony') }}</span></a>
            </div>
            <div class="clearfix"></div>


            <!-- menu prile quick info -->
            <div class="profile">
              <div class="profile_pic">
                @if (Auth::guard('admin')->check())
                  <img src="{{asset('backend/images/user.png')}}" alt="..." class="img-circle profile_img">
                @else
                  @if (empty(auth()->user()->profile->profile_photo_path))
                    <img src="{{asset('backend/images/user.png')}}" alt="..." class="img-circle profile_img">
                  @else
                    <img src="{{auth()->user()->profile->profile_photo_path}}" alt="..." class="img-circle profile_img">
                  @endif
                @endif
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>
                  @if (Auth::guard('admin')->check())
                    {{auth()->user()->name}}
                  @else
                    {{auth()->user()->username}}
                  @endif
                </h2>
              </div>
            </div>
            <!-- /menu prile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  @if (Auth::guard('admin')->check())
                    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li><a href="{{route('groups.index')}}"><i class="fa fa-anchor"></i> Groups</a></li>
                    <li><a href="{{route('priests.index')}}"><i class="fa fa-user"></i> Priests</a></li>
                    <li><a href="{{route('councils.index')}}"><i class="fa fa-sitemap"></i> Laity Council</a></li>
                    <li><a href="{{route('profiles.index')}}"><i class="fa fa-group"></i> Members</a></li>
                  @else
                    <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard</a></li>
                  @endif
                  
                </ul>
              </div>
              <div class="menu_section">
                
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    @if (Auth::guard('admin')->check())
                      <img src="{{asset('backend/images/user.png')}}" alt="">{{auth()->user()->name}}
                    @else
                      @if (empty(auth()->user()->profile->profile_photo_path))
                        <img src="{{asset('backend/images/user.png')}}" alt="">{{auth()->user()->username}}
                      @else
                        <img src="{{auth()->user()->profile->profile_photo_path}}" alt="">{{auth()->user()->username}}
                      @endif
                      
                    @endif
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="{{ route('settings.index') }}"><i class="fa fa-cog pull-right"></i>Church Settings</a></li>
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i>{{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </li>
                  </ul>
                </li>

                <!--<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                    <li>
                      <a>
                        <span class="image">
                                          <img src="{{asset('backend/images/img.jpg')}}" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="{{asset('backend/images/img.jpg')}}" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="{{asset('backend/images/img.jpg')}}" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="{{asset('backend/images/img.jpg')}}" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>-->

              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>@yield('page_title')</h3>
              </div>
        
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 pull-right">
                  @include('inc.messages')
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
        
            
            @yield('content')
          </div>

          <!-- footer content -->
          <footer>
              <div class="copyright-info">
                <p class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>    
                </p>
              </div>
              <div class="clearfix"></div>
          </footer>
          <!-- /footer content -->

        </div>
        <!-- /page content -->
      </div>


    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
      <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
      </ul>
      <div class="clearfix"></div>
      <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/nicescroll/jquery.nicescroll.min.js')}}"></script>

    <!-- bootstrap progress js -->
    <script src="{{asset('backend/js/progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- icheck -->
    <script src="{{asset('backend/js/icheck/icheck.min.js')}}"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="{{asset('backend/js/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/datepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('backend/js/custom.js')}}"></script>

    @yield('script')
  </body>

</html>
