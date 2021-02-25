@extends('layout')

@section('title', 'search')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-container container">
            <div>
                <a href="{{ route('landing-page') }}">Home</a>
                <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <a href="{{ route('shop.index') }}"><span>search</span></a>
            </div>
            <div>
                <form action="{{ route('search') }}" method="GET" class="search-form">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" name="query" id="query" value="{{ request()->input('query') }}" class="search-box" placeholder="Search for product" required>
                </form>
            </div>
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
@endsection
