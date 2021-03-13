@extends('layout')

@section('title', 'My profile')

@section('extra-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.3.1/themes/reset-min.css" integrity="sha256-t2ATOGCtAIZNnzER679jwcFcKYfLlw01gli6F6oszk8=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.4.5/themes/satellite-min.css" integrity="sha256-TehzF/2QvNKhGQrrNpoOb2Ck4iGZ1J/DI4pkd2oUsBc=" crossorigin="anonymous">
    <link href="{{ asset('css/algolia.css') }}" rel=stylesheet />
@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-container container">
            <div>
                <a href="{{ route('landing-page') }}">{{ __('general.home') }}</a>
                <i class="fa {{ getAppDir() == 'rtl' ? 'fa-chevron-left' : 'fa-chevron-right' }} breadcrumb-separator"></i>
                <span>{{ __('profile.profile') }}</span>
            </div>

            <div class="aa-input-container" id="aa-input-container">
                <input type="search" id="aa-search-input" class="aa-input-search" dir="{{ getAppDir() }}"
                       placeholder="{{ __('shop.search_for_products') }}" name="search" autocomplete="off" />
                <svg class="aa-input-icon" viewBox="654 -372 1664 1664" >
                    <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
                </svg>
            </div>

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
                    <li class="active"><a href="{{ route('users.edit') }}">{{ __('profile.profile') }}</a></li>
                    <li><a href="{{ route('orders.index') }}">{{ __('profile.orders') }}</a></li>
                </ul>
            </div> <!-- end sidebar -->
            <div class="my-profile">
                <div class="products-header">
                    <h1 class="stylish-heading">{{ __('profile.profile') }}</h1>
                </div>

                <div style="position: relative">

                    <div class="profile-container">
                        <div class="profile-header">
                            <span class="uppercase font-bold">{{ __('profile.general_information') }}</span>
                        </div>
                        <div>
                            <div class="profile-form">
                                <form action="{{ route('users.update') }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-control">
                                        <label for="name">{{ __('auth.name') }}</label>
                                        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required>
                                    </div>
                                    <div class="form-control">
                                        <label for="email">{{ __('auth.email') }}</label>
                                        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                    <div>
                                        <button type="submit" class="my-profile-button">{{ __('profile.save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="profile-container">
                        <div class="profile-header">
                            <span class="uppercase font-bold">{{ __('profile.change_password') }}</span>
                        </div>
                        <div>
                            <div class="profile-form">
                                <form action="{{ route('users.updatePassword') }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-control">
                                        <label for="password">{{ __('auth.password_') }}</label>
                                        <input id="password" type="password" name="password" placeholder="{{ __('auth.password_') }}">
                                    </div>
                                    <div class="form-control">
                                        <label for="password-confirm">{{ __('auth.password_confirm') }}</label>
                                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="{{ __('auth.password_confirm') }}">
                                    </div>
                                    <div>
                                        <button type="submit" class="my-profile-button">{{ __('profile.save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="profile-container">
                        <div class="profile-header">
                            <span class="uppercase font-bold">{{ __('profile.shipping_address') }}</span>
                        </div>
                        <div>
                            <div class="profile-form">
                                <form action="{{ route('users.updateAddress') }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-control">
                                        <label for="shipping_address">{{__('checkout.address')}}</label>
                                        <input id="shipping_address" type="text" name="shipping_address" value="{{ old('shipping_address', $user->shipping_address) }}" required>
                                    </div>
                                    <div class="form-control">
                                        <label for="shipping_city">{{ __('checkout.city') }}</label>
                                        <input id="shipping_city" type="text" name="shipping_city" value="{{ old('shipping_city', $user->shipping_city) }}" required>
                                    </div>
                                    <div class="form-control">
                                        <label for="shipping_province">{{ __('checkout.province') }}</label>
                                        <input id="shipping_province" type="text" name="shipping_province" value="{{ old('shipping_province', $user->shipping_province) }}" required>
                                    </div>
                                    <div class="form-control">
                                        <label for="shipping_postalcode">{{ __('checkout.postal_code') }}</label>
                                        <input id="shipping_postalcode" type="text" name="shipping_postalcode" value="{{ old('shipping_postalcode', $user->shipping_postalcode) }}" required>
                                    </div>
                                    <div class="form-control">
                                        <label for="shipping_phone">{{ __('checkout.phone') }}</label>
                                        <input id="shipping_phone" type="text" name="shipping_phone" value="{{ old('shipping_phone', $user->shipping_phone) }}" >
                                    </div>
                                    <div>
                                        <button type="submit" class="my-profile-button">{{ __('profile.save') }}</button>
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

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client v3 and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
