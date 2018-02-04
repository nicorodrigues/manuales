@extends('layouts.main')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            <h1>Register</h1>
            {{ csrf_field() }}

            <div class="form-input{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class=" control-label">Name</label>

                <div class="">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-input{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class=" control-label">E-Mail Address</label>

                <div class="">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>

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
                <label for="password-confirm" class=" control-label">Confirm Password</label>

                <div class="">
                    <input id="password-confirm" type="password" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-input">
                <div class="">
                    <button type="submit" class="button-login">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
