@extends('layout')

@section('title', 'Shop')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="{{ route('landing-page') }}">{{ __('general.home') }}</a>
            <i class="fa {{ getAppDir() == 'rtl' ? 'fa-chevron-left' : 'fa-chevron-right' }} breadcrumb-separator"></i>
            <span>{{ __('shop.shop') }}</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="products-section container main-container">
        <div class="sidebar">
            <h3>{{ __('shop.categories') }}</h3>
            <ul>
                <li class="{{ !request()->category ? 'active' : '' }}">
                    <a href="{{ route('shop.index') }}">{{ __('shop.featured') }}</a>
                </li>
            @foreach($categories as $category)
                    <li class="{{ request()->category ==  $category->slug ? 'active' : ''}}">
                        <a href="{{ route('shop.index', ['category' =>$category->slug]) }}">
                            {{ $category->getTranslatedAttribute('name') }}
                        </a>
                    </li>
                @endforeach
            </ul>

        </div> <!-- end sidebar -->
        <div>
            <div class="products-header">
                <h1 class="stylish-heading">{{ $categoryName }}</h1>
                <div>
                    <span style="font-weight: bold;">{{ __('shop.price') }}: </span>
                    <a href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'low_high']) }}">{{ __('shop.low_to_high') }}</a>
                    <span style="font-weight: bold;"> | </span>
                    <a href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'high_low']) }}">{{ __('shop.high_to_low') }}</a>
                </div>
            </div>
            <div class="products text-center">
                @forelse($products as $product)
                    <div class="product">
                        <a href="{{ route('shop.show', $product) }}"><img src="{{ presentImage($product->image)}}" alt="product"></a>
                        <a href="{{ route('shop.show', $product) }}"><div class="product-name">{{ $product->getTranslatedAttribute('name') }}</div></a>
                        <div class="product-price">{{ $product->presentPrice() }}</div>
                    </div>
                @empty
                      <div style="text-align: left">No items to show</div>
                @endforelse

            </div> <!-- end products -->
            <div class="spacer"></div>
            {{ $products->appends(request()->input())->links() }}
        </div>
    </div>


@endsection
