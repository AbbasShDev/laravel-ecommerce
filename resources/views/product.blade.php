@extends('layout')

@section('title', $product->name)

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
                <a href="{{ route('shop.index') }}"><span>{{ __('shop.shop') }}</span></a>
                <i class="fa {{ getAppDir() == 'rtl' ? 'fa-chevron-left' : 'fa-chevron-right' }} breadcrumb-separator"></i>
                <a href="{{ route('shop.index', ['category' => $product->category->slug]) }}">{{ $product->category->getTranslatedAttribute('name') }}</a>
                <i class="fa {{ getAppDir() == 'rtl' ? 'fa-chevron-left' : 'fa-chevron-right' }} breadcrumb-separator"></i>
                <span>{{ $product->getTranslatedAttribute('name') }}</span>
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
            <div class="stock-info">{!! $stockLevel !!}</div>
            <div class="product-section-subtitle">{{ $product->getTranslatedAttribute('details') }}</div>
            <div class="product-section-price">{{ $product->presentPrice() }}</div>
            <p>{{ $product->getTranslatedAttribute('details') }}</p>

            @if($product->quantity)
                <form action="{{ route('cart.store', $product->slug) }}" method="post">
                    @csrf
                    <button type="submit" class="button button-plain">{{ __('shop.add_to_cart') }}<i class="fas fa-cart-plus fa-fw align-icon"></i></button>
                </form>
            @endif

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
    <!-- Include AlgoliaSearch JS Client v3 and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
