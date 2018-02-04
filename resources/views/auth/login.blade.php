@extends('layouts.main')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            <h1>Login</h1>
            {{ csrf_field() }}

            <div class="form-input{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class=" control-label">E-Mail Address</label>

                <div class="">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-input{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class=" control-label">Password</label>

                <div class="">
                    <input id="password" type="password" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-input">
                <div class="">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-input">
                <div class="">
                    <button type="submit" class="button-login">
                        Login
                    </button>

                    {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a> --}}
                </div>
            </div>
        </form>
    </div>
@endsection
