@extends('layout')

@section('title', 'Orders')

@section('extra-css')
@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="{{ route('landing-page') }}">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Orders</span>
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
                <li><a href="{{ route('users.edit') }}">Profile</a></li>
                <li class="active"><a href="{{ route('orders.index') }}">Orders</a></li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading">Orders</h1>
            </div>

            <div style="position: relative">
                @foreach ($orders as $order)
                    <div class="order-container">
                        <a href="{{ route('orders.show', $order) }}">
                            <div class="order-header">
                                <div class="order-header-items">
                                    <div class="order-header-items-left">
                                        <span class="uppercase font-bold order-id">Order #{{ $order->id }}</span>
                                        <span class="order-date">Placed {{ presentDateString($order->created_at)  }}</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="order-header-items">
                                        <div><i class="fa fa-chevron-right"></i></div>
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
                                                <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                            </div>
                                            <div>{{ presentPrice($product->price) }}</div>
                                            <div>Quantity: {{ $product->pivot->quantity }}</div>
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
@endsection
