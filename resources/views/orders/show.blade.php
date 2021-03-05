@extends('layout')

@section('title', 'Orders')

@section('extra-css')
@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="{{ route('landing-page') }}">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="{{ route('orders.index') }}">Orders</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Order #{{ $order->id }}</span>
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
        <div class="my-orders">
            <div style="position: relative">
                    <div class="single-order-container">
                            <div class="order-header">
                                <div class="order-header-items">
                                    <div class="order-header-items-left">
                                        <span class="order-details-heading">Order #{{ $order->id }}</span>
                                        <span class="order-date">Placed {{ presentDateString($order->created_at)  }}</span>
                                    </div>
                                </div>
                            </div>
                                <div class="order-body">
                                    <div class="order-details-heading">SHIPPING ADDRESS</div>
                                    <div class="order-details">
                                        <p>{{ $order->shipping_address }}</p>
                                        <p>
                                            {{ $order->shipping_city }} ,
                                            {{ $order->shipping_province }}
                                            {{ $order->shipping_postalcode }}
                                        </p>
                                    </div>
                                    <div class="order-details-heading">MOBILE NUMBER</div>
                                    <div class="order-details">
                                        <p>{{ auth()->user()->shipping_phone }}</p>
                                    </div>
                                </div>
                    </div> <!-- end single-order-container -->

                    <div class="single-order-container">
                        <div class="order-header">
                            <div class="order-header-items">
                                <div class="order-header-items-left">
                                    <span class="order-details-heading">Order items</span>
                                    <span class="order-date">#{{ $order->id }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="order-body">
                            @foreach ($products as $product)
                                <div class="order-product-item">
                                    <div><img src="{{ asset($product->image) }}" alt="Product Image"></div>
                                    <div>
                                        <div>
                                            <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                        </div>
                                        <div>{{ presentPrice($product->price) }}</div>
                                        <div>Quantity: {{ $product->pivot->quantity }}</div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div> <!-- end single-order-container -->
                    <div class="single-order-container">
                        <div class="order-header">
                            <div class="order-header-items">
                                <div class="order-header-items-left">
                                    <span class="order-details-heading">PAYMENT METHOD</span>
                                </div>
                            </div>
                        </div>
                        <div class="order-body">
                            <h4>{{ $order->payment_gateway }}</h4>
                        </div>
                    </div> <!-- end single-order-container -->
                    <div class="single-order-container">
                        <div class="order-header">
                            <div class="order-header-items">
                                <div class="order-header-items-left">
                                    <span class="order-details-heading">ORDER SUMMARY</span>
                                </div>
                            </div>
                        </div>
                        <div class="order-body">
                                <div class="order-summary">
                                    <div>Subtotal</div>
                                    <div>{{ presentPrice($order->billing_subtotal) }}</div>
                                </div>
                                <div class="order-summary">
                                    <div>Discount</div>
                                    <div><span class="discount">{{ presentPrice($order->billing_discount) }}</span></div>
                                </div>
                                <div class="divider"></div>
                                <div class="order-summary">
                                    <div>Tax</div>
                                    <div>{{ presentPrice($order->billing_tax) }}</div>
                                </div>
                                <div class="order-summary">
                                    <div><span class="total">Total</span></div>
                                    <div><span class="total">{{ presentPrice($order->billing_total) }}</span></div>
                                </div>
                        </div>
                    </div> <!-- end single-order-container -->
            </div>

            <div class="spacer"></div>
        </div>
    </div>

@endsection

@section('extra-js')
@endsection
