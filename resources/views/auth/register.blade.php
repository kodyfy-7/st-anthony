@extends('layouts.auth-app')

@section('content')
    
        <section class="login_content">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>{{ __('Register') }}</h1>
                <div>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div>
                    <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Password">

                </div>
                <div>
                    <button type="submit" class="btn btn-default submit">
                        {{ __('Register') }}
                    </button>
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <p class="change_link">Already registered?
                        <a href="{{route('login')}}" class="to_login"> Login </a>
                    </p>
                    <div class="clearfix"></div>
                    <br />
                    @include('layouts.auth-footer')
                </div>
            </form>
            <!-- form -->
        </section>
        <!-- content -->
 
@endsection
