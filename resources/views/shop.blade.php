@extends('layout')

@section('title', 'Shop')

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
                <span>{{ __('shop.shop') }}</span>
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

    <div class="products-section container main-container">
        <div class="sidebar">
            <h2 class="prima">{{ __('shop.categories') }}</h2>
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

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client v3 and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
