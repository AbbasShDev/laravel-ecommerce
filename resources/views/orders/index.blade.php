@extends('layout')

@section('title', 'Orders')

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
                <span>{{ __('profile.orders') }}</span>
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

    <div class="container">
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
    </div>

    <div class="products-section my-orders container main-container">
        <div class="sidebar">

            <ul>
                <li><a href="{{ route('users.edit') }}"><i class="fas fa-user-alt fa-fw align-icon"></i>{{ __('profile.profile') }}</a></li>
                <li class="active"><a href="{{ route('orders.index') }}"><i class="fas fa-clipboard fa-fw"></i>{{ __('profile.orders') }}</a></li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading">{{ __('profile.orders') }}</h1>
            </div>

            <div style="position: relative">
                @foreach ($orders as $order)
                    <div class="order-container">
                        <a href="{{ route('orders.show', $order) }}">
                            <div class="order-header">
                                <div class="order-header-items">
                                    <div class="order-header-items-left">
                                        <span class="uppercase font-bold order-id">{{ __('profile.order') }} #{{ $order->id }}</span>
                                        <span class="order-date">{{ __('profile.placed') }} {{ presentDateString($order->created_at)  }}</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="order-header-items">
                                        <div><i class="fa {{ getAppDir() == 'rtl' ? 'fa-chevron-left' : 'fa-chevron-right' }}"></i></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div>
                            <div class="order-products">
                                @foreach ($order->products as $product)
                                    <div class="order-product-item">
                                        <div><img src="{{ asset($product->image) }}" alt="Product Image"></div>
                                        <div class="order-product-info">
                                            <div>
                                                <a href="{{ route('shop.show', $product->slug) }}">{{ $product->getTranslatedAttribute('name') }}</a>
                                            </div>
                                            <div>{{ presentPrice($product->price) }}</div>
                                            <div>{{ __('profile.quantity') }}: {{ $product->pivot->quantity }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div> <!-- end order-container -->
                @endforeach
            </div>

            <div class="spacer"></div>
        </div>
    </div>

@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client v3 and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
