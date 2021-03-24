@extends('layout')

@section('title', 'Shopping Cart')

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
                <span>{{ __('shop.shopping_cart') }}</span>
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
                                        <button type="submit" class="cart-options"><i class="fas fa-trash-alt fa-fw"></i>{{ __('shop.remove') }}</button>
                                    </form>

                                    <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="post">
                                        @csrf
                                        <button type="submit" class="cart-options"><i class="fas fa-plus-square fa-fw"></i>{{ __('shop.save_for_later') }}</button>
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
                                        <button type="submit" class="cart-options"><i class="fas fa-trash-alt fa-fw"></i>{{ __('shop.remove') }}</button>
                                    </form>

                                    <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="post">
                                        @csrf
                                        <button type="submit" class="cart-options"><i class="fas fa-minus-square fa-fw"></i>{{ __('shop.move_to_cart') }}</button>
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
    <!-- Include AlgoliaSearch JS Client v3 and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
