@extends('layout')

@section('title', 'Sign Up for an Account')

@section('content')
    <div class="container main-container">
        <div class="auth-pages">
            <div>
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
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
                <h2>{{ __('auth.create_account') }}</h2>
                <div class="spacer"></div>

                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ __('auth.name') }}" required autofocus>

                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ __('auth.email') }}" required>

                    <input id="password" type="password" class="form-control" name="password" placeholder="{{ __('auth.password_') }}" required>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{__('auth.password_confirm') }}" required>

                    <div class="login-container">
                        <button type="submit" class="auth-button">{{ __('auth.create_account') }}</button>
                        <div class="already-have-container">
                            <p><strong>{{ __('auth.already_have_an_account') }}</strong></p>
                            <a href="{{ route('login') }}">{{ __('nav.log_in') }}</a>
                        </div>
                    </div>

                </form>
            </div>

            <div class="auth-right">
                <h2>{{ __('auth.new_customer') }}</h2>
                <div class="spacer"></div>
                <p><strong>{{ __('auth.save_time_now') }}</strong></p>
                <p>{{ __('auth.creating_an_account_will_allow_you') }}</p>

                &nbsp;
                <div class="spacer"></div>
                <p><strong>{{ __('auth.loyalty_program') }}</strong></p>
                <p>{{ __('auth.loyalty_program_description') }}</p>
            </div>
        </div> <!-- end auth-pages -->
    </div>
@endsection
