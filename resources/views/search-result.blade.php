@extends('layout')

@section('title', 'search')

@section('extra-css')
    <link href="{{ asset('css/algolia.css') }}" rel=stylesheet />
@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-container container">
            <div>
                <a href="{{ route('landing-page') }}">Home</a>
                <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <a href="{{ route('shop.index') }}"><span>search</span></a>
            </div>
                <!-- HTML Markup -->
                <div class="aa-input-container" id="aa-input-container">
                    <input type="search" id="aa-search-input" class="aa-input-search"
                           placeholder="Search for players or teams..." name="search" autocomplete="off" />

                    <svg class="aa-input-icon" viewBox="654 -372 1664 1664">
                        <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
                    </svg>
                </div>
{{--                <form action="{{ route('search') }}" method="GET" class="search-form">--}}
{{--                    <i class="fa fa-search search-icon"></i>--}}
{{--                    <input type="text" name="query" id="query" value="{{ request()->input('query') }}" class="search-box" placeholder="Search for product" required>--}}
{{--                </form>--}}
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="container">

        <div>
            <div class="search-header">
                <h3>Search result for ( {{ request()->input('query') }} )</h3>
                <p>{{ $products->count() }} results found</p>
            </div>
            <div class="products-search text-center">
                @forelse($products as $product)
                    <div class="product">
                        <a href="{{ route('shop.show', $product) }}"><img src="{{ presentImage($product->image)}}" alt="product"></a>
                        <div class="product-info">
                            <a href="{{ route('shop.show', $product) }}"><div class="product-name">{{ $product->getTranslatedAttribute('name') }}</div></a>
                            <div class="product-details">{{ $product->getTranslatedAttribute('details') }}</div>
                            <div class="product-price">{{ $product->presentPrice() }}</div>
                        </div>
                    </div>
                @empty
                    <div style="text-align: left">No items to show</div>
                @endforelse

            </div> <!-- end products -->
            <div class="spacer"></div>
            {{ $products->appends(request()->input())->links() }}
        </div>
    </div> <!-- end product-section -->


@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client v3 and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
