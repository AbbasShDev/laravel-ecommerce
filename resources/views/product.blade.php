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
                <img src="{{presentImage($product->image) }}" class="active" alt="product" id="currentImage">
            </div>
            <div class="product-section-images">
                <div class="product-section-thumbnails selected">
                    <img src="{{presentImage($product->image) }}" alt="product">
                </div>
                @if($product->images)
                    @foreach(json_decode($product->images, true) as $image)
                        <div class="product-section-thumbnails">
                            <img src="{{presentImage($image) }}" alt="product">
                        </div>
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

@section('extra-js')
    <script>
        (function () {
            const cureentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.product-section-thumbnails');

            images.forEach((el) => el.addEventListener('click', thumbnailClick))

            function thumbnailClick(e) {
                cureentImage.classList.remove('active');

                cureentImage.addEventListener('transitionend', () => {
                    cureentImage.src = this.querySelector('img').src;
                    cureentImage.classList.add('active');
                })

                images.forEach((el) => el.classList.remove('selected'))
                this.classList.add('selected')
            }
        }())
    </script>
@endsection
