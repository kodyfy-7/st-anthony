@extends('layouts.auth-app')

@section('content')
    <div id="login" class="animate form">
        <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>{{ __('Login') }}</h1>
                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-default submit">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                                    <a class="reset_pass" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                    @endif
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <p class="change_link">New to site?
                        <a href="{{route('register')}}" class="to_register"> Create Account </a>
                    </p>
                    <div class="clearfix"></div>
                    <br />
                    @include('layouts.auth-footer')
                </div>
            </form>
            <!-- form -->
        </section>
        <!-- content -->
    </div>
@endsection
