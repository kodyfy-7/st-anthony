<div id="logo">
    <!-- <h1><a href="{{route('welcome')}}">Saint</a></h1>
    Uncomment below if you prefer to use an image logo -->
   <a href="index.html"><img src="{{asset('frontend/assets/img/logo.png')}}" alt=""></a> 
</div>

<nav id="navbar" class="navbar">
    <ul>
    <li><a class="nav-link" href="{{route('welcome')}}">Home</a></li>
    <li><a class="nav-link" href="{{route('about')}}">About</a></li>
    <li><a class="nav-link" href="{{route('laity')}}">Laity Council</a></li>
    <li class="dropdown"><a href="#"><span>Church Groups</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
            <li><a href="{{route('organization')}}">Organizations</a></li>
            <li><a href="{{route('liturgical')}}">Liturgical Societies</a></li>
            <li><a href="{{route('society')}}">Societies</a></li>
            <li><a href="{{route('community')}}">Basic Christian Communities</a></li>
        </ul>
    </li>
    <li><a class="nav-link" href="/daily_readings">Daily Readings</a></li>
    <li><a class="nav-link" href="{{route('gallery')}}">Gallery</a></li>
    <!-- Authentication Links -->
    @guest
        <li class="dropdown"><a href="#"><span>Account</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                @if (Route::has('login'))
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @endif
                
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @endif
            </ul>
        </li>
    @else
        <li class="dropdown"><a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->username }} <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="/home">Profile</a></li>
                <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    @endguest
    <li><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->