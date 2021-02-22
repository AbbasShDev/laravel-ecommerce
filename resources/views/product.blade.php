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

        <div>
            <div class="product-section-image">
                <img src="{{presentImage($product->image) }}" alt="product">
            </div>
            <div>
                @if($product->images)
                    @foreach(json_decode($product->images, true) as $image)
                        <img src="{{presentImage($image) }}" alt="product">
                    @endforeach
                @endif
            </div>
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">{{ $product->getTranslatedAttribute('name') }}</h1>
            <div class="product-section-subtitle">{{ $product->getTranslatedAttribute('details') }}</div>
            <div class="product-section-price">{{ $product->presentPrice() }}</div>
            <p>{{ $product->getTranslatedAttribute('details') }}</p>

{{--            <a href="#" class="button">Add to Cart</a>--}}
            <form action="{{ route('cart.store', $product->slug) }}" method="post">
                @csrf
                <button type="submit" class="button button-plain">Add to Cart</button>
            </form>
        </div>
    </div> <!-- end product-section -->

    @include('partials.might-like')


@endsection
