
@extends('layout')

@section('title', 'Home')

@section('extra-css')
    <!-- swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <!-- algolia CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.3.1/themes/reset-min.css" integrity="sha256-t2ATOGCtAIZNnzER679jwcFcKYfLlw01gli6F6oszk8=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.4.5/themes/satellite-min.css" integrity="sha256-TehzF/2QvNKhGQrrNpoOb2Ck4iGZ1J/DI4pkd2oUsBc=" crossorigin="anonymous">
    <link href="{{ asset('css/algolia.css') }}" rel=stylesheet />
@endsection

@section('content')
    <div class="hero-section ">
        <!-- Swiper -->
        <div class="swiper-container swiper-1">
            <div class="swiper-wrapper">
                @foreach($banners as $banner)
                    <div class="swiper-slide">
                        <img src="{{ presentImage($banner->image) }}" alt="">
                        <div class="banner-product-name" style="color: {{ $banner->text_color }}">{{ $banner->getTranslatedAttribute('product_name') }}</div>
                        <div class="banner-product-price-desc" style="color: {{ $banner->text_color }}">{{ $banner->getTranslatedAttribute('product_price_description') }}</div>
                        <div class="banner-product-stock-status" style="color: {{ $banner->text_color }}">{{ $banner->getTranslatedAttribute('product_stock_status') }}</div>
                        <div class="banner-product-btn">
                            <a href=" {{ route('shop.show', $banner->product ) }}" style="color: black">{{ __('general.shop_now') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev" style="color: #a29f9f;"></div>
            <div class="swiper-button-next" style="color: #a29f9f;"></div>
        </div>
    </div> <!-- end hero -->

    <div class="featured-section">

        <div class="container">
            <h1 class="text-center">{{ __('general.laramerce') }}</h1>

            <p class="section-description text-center">{{ __('general.laramerce_description') }}</p>

            <div class="text-center button-container taps">
                <a class="button button-active" data-type="featured" style="cursor: pointer">{{ __('shop.featured') }}</a>
                <a class="button" data-type="latest" style="cursor: pointer">{{ __('shop.latest') }}</a>
            </div>

            <div class="products text-center featured">
                @foreach($featuredProducts as $product)
                    <div class="product">
                        <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ presentImage($product->image) }}"
                                                                                alt="product"></a>
                        <a href="{{ route('shop.show', $product->slug) }}">
                            <div class="product-name">{{ $product->getTranslatedAttribute('name') }}</div>
                        </a>
                        <div class="product-price">{{ $product->presentPrice() }}</div>
                    </div>
                @endforeach
            </div> <!-- end products -->

            <div class="products text-center latest" style="display: none">
                @foreach($latestProducts as $product)
                    <div class="product">
                        <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ presentImage($product->image) }}"
                                                                                alt="product"></a>
                        <a href="{{ route('shop.show', $product->slug) }}">
                            <div class="product-name">{{ $product->getTranslatedAttribute('name') }}</div>
                        </a>
                        <div class="product-price">{{ $product->presentPrice() }}</div>
                    </div>
                @endforeach
            </div> <!-- end products -->

            <div class="text-center button-container">
                <a href="{{ route('shop.index') }}" class="button">{{ __('shop.view_more_products') }}</a>
            </div>

        </div> <!-- end container -->

    </div> <!-- end featured-section -->

    <div class="blog-section">
        <div class="main-container">
            <h1 class="text-center">{{ __('general.customer_reviews') }}</h1>
            <div class="spacer"></div>
            <!-- Slider main container -->
            <div class="swiper-container swiper-2">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div>
                            <img class="review-avatar" src="{{ asset('img/review-avatar-1.jpeg') }}" alt="review-avatar-">
                            <h4 class="review-name">John Doe</h4>
                            <p class="review-details">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci aliquam cumque delectus deleniti dicta, eligendi eum, facere, fuga hic impedit itaque iure</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div>
                            <img class="review-avatar" src="{{ asset('img/review-avatar-2.jpeg') }}" alt="review-avatar-">
                            <h4 class="review-name">احمد حسن</h4>
                            <p class="review-details">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div>
                            <img class="review-avatar" src="{{ asset('img/review-avatar-3.jpeg') }}" alt="review-avatar-">
                            <h4 class="review-name">Beatrice Darcie</h4>
                            <p class="review-details">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci aliquam cumque delectus deleniti dicta, eligendi eum, facere, fuga hic impedit itaque iure</p>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div> <!-- end container -->
    </div> <!-- end blog-section -->

@endsection
@section('extra-js')
    <script>
        (function () {
            const taps = document.querySelectorAll('.featured-section .taps .button');
            const featuredProducts = document.querySelector('.featured-section .featured');
            const latestProducts = document.querySelector('.featured-section .latest');
            taps.forEach((el) => {
                el.addEventListener('click', function (event) {
                    event.preventDefault()

                    taps.forEach(ele => {
                        ele.classList.remove('button-active')
                    });

                    el.classList.add('button-active')

                    if (el.dataset.type === 'featured') {
                        latestProducts.style.display = 'none';
                        featuredProducts.style.display = 'grid';
                    } else if (el.dataset.type === 'latest') {
                        featuredProducts.style.display = 'none';
                        latestProducts.style.display = 'grid';
                    }
                });
            })
        }())
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    </script>

    <!-- swiper JS  -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>

    <script>
        let swiper1 = new Swiper('.swiper-1', {
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 2500,
            },
        });
    </script>

    <script>
        let swiper2 = new Swiper('.swiper-2', {
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
            },
        });
    </script>
    <!-- Include AlgoliaSearch JS Client v3 and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
