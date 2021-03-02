@extends('layout')

@section('title', 'My profile')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="{{ route('landing-page') }}">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Profile</span>
        </div>
    </div> <!-- end breadcrumbs -->
    <div class="main-container">
        <div class="spacer"></div>
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="products-section container">

            <div class="sidebar">
                <ul>
                    <li class="active"><a href="{{ route('users.edit') }}">Profile</a></li>
                    <li><a href="{{ route('orders.index') }}">Orders</a></li>
                </ul>
            </div> <!-- end sidebar -->
            <div class="my-profile">
                <div class="products-header">
                    <h1 class="stylish-heading">Profile</h1>
                </div>

                <div style="position: relative">

                    <div class="profile-container">
                        <div class="profile-header">
                            <span class="uppercase font-bold">General Information</span>
                        </div>
                        <div>
                            <div class="profile-form">
                                <form action="{{ route('users.update') }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-control">
                                        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name" required>
                                    </div>
                                    <div class="form-control">
                                        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                                    </div>
                                    <div>
                                        <button type="submit" class="my-profile-button">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="profile-container">
                        <div class="profile-header">
                            <span class="uppercase font-bold">Change password</span>
                        </div>
                        <div>
                            <div class="profile-form">
                                <form action="{{ route('users.updatePassword') }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-control">
                                        <input id="password" type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-control">
                                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                    <div>
                                        <button type="submit" class="my-profile-button">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="spacer"></div>
            </div>
        </div>
    </div>

@endsection

