@extends('layout')

@section('title', 'Reset Password')

@section('content')
    <div class="container">
        <div class="auth-pages" style="margin: 100px 10% ;display: block; !important;">
            <div class="auth-left">
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                @endif @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>{{ __('auth.reset_password') }}</h2>
                <div class="spacer"></div>
                <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="{{ __('auth.email') }}" required autofocus>

                    <input id="password" type="password" class="form-control" name="password" placeholder="{{ __('auth.password_') }}" required>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('auth.password_confirm') }}" required>

                    <div class="login-container">
                        <button type="submit" class="auth-button">{{ __('auth.reset_password') }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection


