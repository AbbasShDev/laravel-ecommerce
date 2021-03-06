@extends('layout')
@section('title', 'Reset Password')
@section('content')
    <div class="container main-container">
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
                <h2>{{ __('auth.forgot_password') }}</h2>
                <div class="spacer"></div>
                <form action="{{ route('password.email') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('auth.email') }}" required autofocus>
                    <div class="login-container">
                        <button type="submit" class="auth-button">{{ __('auth.send_password_reset_link') }}</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
