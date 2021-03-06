@extends('layout')

@section('title', 'Shopping Cart')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="{{ route('landing-page') }}">{{ __('general.home') }}</a>
            <i class="fa {{ getAppDir() == 'rtl' ? 'fa-chevron-left' : 'fa-chevron-right' }} breadcrumb-separator"></i>
            <span>{{ __('shop.shopping_cart') }}</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="cart-section main-container">
        <div>
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
            @if(Cart::count() > 0)
                <h2>{{ Cart::count() }} {{ __('shop.items_in_shopping_cart') }}</h2>
                <div class="cart-table">
                    @foreach(Cart::content() as $item)
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{ route('shop.show', $item->model->slug) }}"><img
                                        src="{{ presentImage($item->model->image) }}" alt="item"
                                        class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a
                                            href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->getTranslatedAttribute('name') }}</a>
                                    </div>
                                    <div
                                        class="cart-table-description">{{ $item->model->getTranslatedAttribute('details') }}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">

                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cart-options">{{ __('shop.remove') }}</button>
                                    </form>

                                    <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="post">
                                        @csrf
                                        <button type="submit" class="cart-options">{{ __('shop.save_for_later') }}</button>
                                    </form>
                                </div>
                                <div>
                                    <select class="quantity" data-itemid="{{ $item->rowId }}">
                                        @for($i =1; $i <= 10; $i++)
                                            <option {{  $item->qty == $i ? 'selected': '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div>{{ $item->model->presentPrice() }}</div>
                            </div>
                        </div> <!-- end cart-table-row -->
                    @endforeach


                </div> <!-- end cart-table -->

            @else
                <div class="have-code-container">
                    <h3>{{ __('shop.no_items_in_cart') }}</h3>
                    <div class="spacer"></div>
                    <a href="{{ route('shop.index') }}" class="button">{{ __('shop.continue_shopping') }}</a>
                    <div class="spacer"></div>
                </div>
            @endif

            @if (! session()->has('coupon'))

                <h4 class="have-code">{{ __('shop.have_a_code') }}</h4>

                <div class="have-code-container">
                    <form action="{{ route('coupon.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="coupon_code" id="coupon_code">
                        <button type="submit" class="button button-plain">{{ __('shop.apply') }}</button>
                    </form>
                </div> <!-- end have-code-container -->
            @endif

            <div class="cart-totals">
                <div class="cart-totals-left">
                    {{ __('shop.shipping_is_free') }}
                </div>

                <div class="cart-totals-right">
                    <div>
                        {{ __('shop.subtotal') }} <br>
                        @if (session()->has('coupon'))
                            {{__('shop.code')}} ({{ session()->get('coupon')['name'] }})
                            <form action="{{ route('coupon.destroy') }}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="remove-coupon"><i class="fa fa-times-circle"></i></button>
                            </form>
                            <hr>
                            {{__('shop.new_subtotal')}} <br>
                        @endif
                        {{__('shop.tax')}} ({{config('cart.tax')}}%)<br>
                        <span class="cart-totals-total">{{__('shop.total')}}</span>
                    </div>
                    <div class="cart-totals-subtotal">
                        {{ presentPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                            -{{ presentPrice($discount) }} <br>
                            <hr>
                            {{ presentPrice($newSubtotal) }} <br>
                        @endif
                        {{ presentPrice($newTax) }} <br>
                        <span class="cart-totals-total">{{ presentPrice($newTotal) }}</span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="{{ route('shop.index') }}" class="button">{{ __('shop.continue_shopping') }}</a>
                <a href="{{ route('checkout.index') }}" class="button-primary">{{ __('shop.proceed_to_checkout') }}</a>
            </div>

            @if(Cart::instance('saveForLater')->count() > 0)
                <h2>{{ Cart::instance('saveForLater')->count() }} {{ __('shop.items_in_saved_for_later') }}</h2>

                <div class="saved-for-later cart-table">
                    @foreach(Cart::instance('saveForLater')->content() as $item)
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{ route('shop.show', $item->model->slug) }}"><img
                                        src="{{ presentImage($item->model->image) }}" alt="item"
                                        class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a
                                            href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->getTranslatedAttribute('name') }}</a>
                                    </div>
                                    <div class="cart-table-description">{{ $item->model->getTranslatedAttribute('details') }}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">
                                    <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cart-options">{{ __('shop.remove') }}</button>
                                    </form>

                                    <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="post">
                                        @csrf
                                        <button type="submit" class="cart-options">{{ __('shop.move_to_cart') }}</button>
                                    </form>
                                </div>
                                <div>{{ $item->model->presentPrice() }}</div>
                            </div>
                        </div> <!-- end cart-table-row -->
                    @endforeach

                </div> <!-- end saved-for-later -->

            @endif

        </div>

    </div> <!-- end cart-section -->

    @include('partials.might-like')

@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function () {
            let cartItemQuantity = document.querySelectorAll('.quantity');

            cartItemQuantity.forEach((el) => {

                el.addEventListener('change', () => {

                    axios.patch(`/{{app()->getLocale()}}/cart/${el.dataset.itemid}`, {
                        quantity: el.value
                    }).then(function (response) {
                        window.location.href = '';
                    }).catch(function (error) {
                        window.location.href = '';
                    })


                });
            })
        }())
    </script>
@endsection
