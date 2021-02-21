@extends('layout')

@section('title', 'Shopping Cart')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="{{ route('landing-page') }}">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Shopping Cart</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="cart-section container">
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
                <h2>{{ Cart::count() }} item(s) in Shopping Cart</h2>
                <div class="cart-table">
                    @foreach(Cart::content() as $item)
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{ route('shop.show', $item->model->slug) }}"><img
                                        src="{{ asset('img/products/'.$item->model->slug.'.jpg') }}" alt="item"
                                        class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a
                                            href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                    </div>
                                    <div class="cart-table-description">{{ $item->model->details }}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">

                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cart-options">Remove</button>
                                    </form>

                                    <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="post">
                                        @csrf
                                        <button type="submit" class="cart-options">Save for Later</button>
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
                    <h3>No items in cart!</h3>
                    <div class="spacer"></div>
                    <a href="{{ route('shop.index') }}" class="button">Continue shopping</a>
                    <div class="spacer"></div>
                </div>
            @endif

            <div class="cart-totals">
                <div class="cart-totals-left">
                    Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel
                    like figuring out :).
                </div>

                <div class="cart-totals-right">
                    <div>
                        Subtotal <br>
                        Tax <br>
                        <span class="cart-totals-total">Total</span>
                    </div>
                    <div class="cart-totals-subtotal">
                        {{ presentPrice(Cart::subtotal()) }} <br>
                        {{ presentPrice(Cart::tax()) }} <br>
                        <span class="cart-totals-total">{{ presentPrice(Cart::total()) }}</span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="#" class="button">Continue Shopping</a>
                <a href="{{ route('checkout.index') }}" class="button-primary">Proceed to Checkout</a>
            </div>

            @if(Cart::instance('saveForLater')->count() > 0)
                <h2>{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h2>

                <div class="saved-for-later cart-table">
                    @foreach(Cart::instance('saveForLater')->content() as $item)
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{ route('shop.show', $item->model->slug) }}"><img
                                        src="{{ asset('img/products/'.$item->model->slug.'.png') }}" alt="item"
                                        class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a
                                            href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                    </div>
                                    <div class="cart-table-description">{{ $item->model->details }}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">
                                    <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cart-options">Remove</button>
                                    </form>

                                    <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="post">
                                        @csrf
                                        <button type="submit" class="cart-options">Move to cart</button>
                                    </form>
                                    s
                                </div>
                                {{-- <div>
                                    <select class="quantity">
                                        <option selected="">1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div> --}}
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

            cartItemQuantity.forEach((el)=>{

                el.addEventListener('change', () => {

                    axios.patch(`/{{app()->getLocale()}}/cart/${el.dataset.itemid}`,{
                        quantity: el.value
                    }).then(function (response){
                        window.location.href = '';
                    }).catch(function (error){
                        window.location.href = '';
                    })


                });
            })
        }())
    </script>
@endsection
