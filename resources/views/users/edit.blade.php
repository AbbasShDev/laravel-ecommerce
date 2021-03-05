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
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name" required>
                                    </div>
                                    <div class="form-control">
                                        <label for="email">Email</label>
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
                            <span class="uppercase font-bold">Change Password</span>
                        </div>
                        <div>
                            <div class="profile-form">
                                <form action="{{ route('users.updatePassword') }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-control">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-control">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
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
                            <span class="uppercase font-bold">Shipping Address</span>
                        </div>
                        <div>
                            <div class="profile-form">
                                <form action="{{ route('users.updateAddress') }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-control">
                                        <label for="shipping_address">Address</label>
                                        <input id="shipping_address" type="text" name="shipping_address" value="{{ old('shipping_address', $user->shipping_address) }}" placeholder="Address" required>
                                    </div>
                                    <div class="form-control">
                                        <label for="shipping_city">City</label>
                                        <input id="shipping_city" type="text" name="shipping_city" value="{{ old('shipping_city', $user->shipping_city) }}" placeholder="City" required>
                                    </div>
                                    <div class="form-control">
                                        <label for="shipping_province">Province</label>
                                        <input id="shipping_province" type="text" name="shipping_province" value="{{ old('shipping_province', $user->shipping_province) }}" placeholder="Province" required>
                                    </div>
                                    <div class="form-control">
                                        <label for="shipping_postalcode">Postal Code</label>
                                        <input id="shipping_postalcode" type="text" name="shipping_postalcode" value="{{ old('shipping_postalcode', $user->shipping_postalcode) }}" placeholder="Postal Code" required>
                                    </div>
                                    <div class="form-control">
                                        <label for="shipping_phone">Phone</label>
                                        <input id="shipping_phone" type="text" name="shipping_phone" value="{{ old('shipping_phone', $user->shipping_phone) }}" placeholder="Phone" >
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

