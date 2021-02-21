@extends('layout')

@section('title', $product->name)

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="{{ route('landing-page') }}">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="{{ route('shop.index') }}"><span>Shop</span></a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="{{ route('shop.index', ['category' => $product->category->slug]) }}">{{ $product->category->getTranslatedAttribute('name') }}</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>{{ $product->name }}</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="product-section container">

        <div class="product-section-image">
            <img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" alt="product">
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">{{ $product->name }}</h1>
            <div class="product-section-subtitle">{{ $product->details }}</div>
            <div class="product-section-price">{{ $product->presentPrice() }}</div>
            <p>{{ $product->description }}</p>

{{--            <a href="#" class="button">Add to Cart</a>--}}
            <form action="{{ route('cart.store', $product->slug) }}" method="post">
                @csrf
                <button type="submit" class="button button-plain">Add to Cart</button>
            </form>
        </div>
    </div> <!-- end product-section -->

    @include('partials.might-like')


@endsection
