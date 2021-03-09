@extends('layout')

@section('title', 'Checkout')


@section('extra-css')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
@endsection

@section('content')

    <div class="container main-container">
        <div class="spacer"></div>
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
        <h1 class="checkout-heading stylish-heading">{{ __('checkout.checkout') }}</h1>
        <div class="checkout-section">
            <div>
                @if(auth()->user() && !auth()->user()->shipping_address)
                    <form action="{{ route('users.updateAddress') }}" method="post" id="payment-form" >
                        @csrf
                        <h2>{{ __('checkout.add_shipping_address') }}</h2>
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="shipping_address">{{ __('checkout.address') }}</label>
                            <input id="shipping_address" type="text" name="shipping_address" value="{{ old('shipping_address', auth()->user()->shipping_address) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_city">{{ __('checkout.city') }}</label>
                            <input id="shipping_city" type="text" name="shipping_city" value="{{ old('shipping_city', auth()->user()->shipping_city) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_province">{{ __('checkout.province') }}</label>
                            <input id="shipping_province" type="text" name="shipping_province" value="{{ old('shipping_province', auth()->user()->shipping_province) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_postalcode">{{ __('checkout.postal_code') }}</label>
                            <input id="shipping_postalcode" type="text" name="shipping_postalcode" value="{{ old('shipping_postalcode', auth()->user()->shipping_postalcode) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_phone">{{ __('checkout.phone') }}</label>
                            <input id="shipping_phone" type="text" name="shipping_phone" value="{{ old('shipping_phone', auth()->user()->shipping_phone) }}" >
                        </div>
                        <div class="spacer"></div>
                        <button type="submit" class="button-primary full-width" id="complete-order">{{ __('checkout.add_address') }}</button>

                    </form>
                @else

                    @if(auth()->user())
                        <div>
                            <h2>{{ __('checkout.shipping_details') }}</h2>
                            <p>{{ auth()->user()->shipping_address }}</p>
                            <p>
                                {{auth()->user()->shipping_city}} ,
                                {{auth()->user()->shipping_province}}
                                {{auth()->user()->shipping_postalcode}}
                            </p>
                            <p>{{ auth()->user()->shipping_phone }}</p>
                        </div>
                    @endif

                    <div class="spacer"></div>

                    @if(request()->payment == 'credit-debit')
                        <form action="{{ route('checkout.store') }}" method="post" id="payment-form" >
                            @csrf
                            <h2>{{ __('checkout.billing details') }}</h2>

                            <div class="form-group">
                                <label for="email">{{ __('auth.email') }}</label>
                                @auth
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{ auth()->user()->email }}" readonly>
                                @else
                                    <input type="email" class="form-control @error('email') border-error @enderror" id="email"
                                           name="email" value="{{ old('billing_email')  }}">
                                @endauth
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('auth.name') }}</label>
                                <input type="text" class="form-control @error('name') border-error @enderror" id="name"
                                       name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('checkout.address') }}</label>
                                <input type="text" class="form-control @error('address') border-error @enderror" id="address"
                                       name="address" value="{{ old('address') }}">
                            </div>

                            <div class="half-form">
                                <div class="form-group">
                                    <label for="city">{{ __('checkout.city') }}</label>
                                    <input type="text" class="form-control @error('city') border-error @enderror" id="city"
                                           name="city" value="{{ old('city')}}">
                                </div>
                                <div class="form-group">
                                    <label for="province">{{ __('checkout.province') }}</label>
                                    <input type="text" class="form-control @error('province') border-error @enderror"
                                           id="province" name="province" value="{{ old('province') }}">
                                </div>
                            </div> <!-- end half-form -->

                            <div class="half-form">
                                <div class="form-group">
                                    <label for="postalcode">{{ __('checkout.postal_code') }}</label>
                                    <input type="text" class="form-control @error('postalcode') border-error @enderror"
                                           id="postalcode" name="postalcode" value="{{ old('postalcode') }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">{{ __('checkout.phone') }}</label>
                                    <input type="text" class="form-control @error('phone') border-error @enderror" id="phone"
                                           name="phone" value="{{ old('phone') }}">
                                </div>
                            </div> <!-- end half-form -->

                            <div class="spacer"></div>

                            <h2>{{ __('checkout.payment_details') }}</h2>

                            <div class="form-group">
                                <label for="name_on_card">{{ __('checkout.name_on_card') }}</label>
                                <input type="text" class="form-control @error('name_on_card') border-error @enderror"
                                       id="name_on_card" name="name_on_card" value="{{ old('name_on_card') }}">
                            </div>


                            <div class="form-group">
                                <label for="card-element">{{ __('checkout.credit_or_debit_card') }}</label>

                                <div id="card-element" class="form-control">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display Element errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>


                            <div class="spacer"></div>

                            <button type="submit" class="button-primary full-width" id="complete-order">{{ __('checkout.complete_order') }}</button>


                        </form>
                    @endif
                    @if(!request()->payment)
                        <div id="payment-method">
                            <h2>{{ __('checkout.payment_details') }}</h2>
                            <a href="{{ request()->fullUrlWithQuery(['payment' => 'credit-debit']) }}">
                                <button  class="button-primary full-width credit-debit-btn">
                                    {{ __('checkout.credit_or_debit_card') }}
                                </button>
                            </a>
                            <div class="spacer"></div>
                            <h2 style="text-align: center">Or</h2>
                            <div class="spacer"></div>
                            <div id="paypal-button"></div>
                        </div>
                    @endif
                @endif

            </div>


            <div class="checkout-table-container">
                <h2>{{ __('checkout.your_order') }}</h2>

                <div class="checkout-table">
                    @foreach(Cart::content() as $item)
                        <div class="checkout-table-row">
                            <div class="checkout-table-row-left">
                                <img src="{{ presentImage($item->model->image) }}" alt="item"
                                     class="checkout-table-img">
                                <div class="checkout-item-details">
                                    <div
                                        class="checkout-table-item">{{ $item->model->getTranslatedAttribute('name') }}</div>
                                    <div
                                        class="checkout-table-description">{{ $item->model->getTranslatedAttribute('details') }}</div>
                                    <div class="checkout-table-price">{{ $item->model->presentPrice() }}</div>
                                </div>
                            </div> <!-- end checkout-table -->

                            <div class="checkout-table-row-right">
                                <div class="checkout-table-quantity">{{ $item->qty }}</div>
                            </div>
                        </div> <!-- end checkout-table-row -->
                    @endforeach

                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        {{ __('shop.subtotal') }} <br>
                        @if(session()->has('coupon'))
                            {{ __('shop.code') }} ({{ session()->get('coupon')['name'] }})
                            <br>
                            <hr>
                            {{ __('shop.new_subtotal') }} <br>
                        @endif
                        {{ __('shop.tax') }} <br>
                        <span class="checkout-totals-total">{{ __('shop.total') }}</span>

                    </div>

                    <div class="checkout-totals-right">
                        {{ presentPrice(Cart::subtotal()) }} <br>
                        @if(session()->has('coupon'))
                            -{{ presentPrice($discount) }} <br>
                            <hr>
                            {{ presentPrice($newSubtotal) }} <br>
                        @endif
                        {{ presentPrice($newTax) }} <br>
                        <span class="checkout-totals-total">{{ presentPrice($newTotal) }}</span>

                    </div>

                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
    </div>

@endsection

@section('extra-js')
    <script>
        (function () {
            var locale = document.getElementsByTagName("html")[0].getAttribute("lang");

            const stripe = Stripe('pk_test_51ILy9rLwhl8jQZZNkcfGafRFKH7hNsClemq0KKk25UepdtcuLgAyDd4IaVzpfby59EkorR5BjxpbXX3vnph8vvrQ00w3zJLx3J', {
                locale: locale
            });
            const elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            const style = {
                base: {
                    color: '#303238',
                    fontSize: '20px',
                    fontFamily: '"Roboto","Open Sans", sans-serif',
                    fontSmoothing: 'antialiased',
                    '::placeholder': {
                        color: '#CFD7DF',
                    },
                },
                invalid: {
                    color: '#e5424d',
                    ':focus': {
                        color: '#303238',
                    },
                },
            };

            //Payment button style


            // Create an instance of the card Element.
            const card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Create a token or display an error when the form is submitted.
            const form = document.getElementById('payment-form');
            form.addEventListener('submit', async (event) => {
                event.preventDefault();
                document.getElementById('complete-order').disabled = true
                var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('province').value,
                    address_zip: document.getElementById('postalcode').value,
                }

                const {token, error} = await stripe.createToken(card, options);

                if (error) {
                    // Inform the customer that there was an error.
                    const errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;
                    document.getElementById('complete-order').disabled = false
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(token);
                }
            });

            const stripeTokenHandler = (token) => {
                // Insert the token ID into the form so it gets submitted to the server
                const form = document.getElementById('payment-form');
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        }())
    </script>

    <script>
        var locale = document.getElementsByTagName("html")[0].getAttribute("lang");
        paypal.Button.render({
            env: 'sandbox',
            locale: locale === 'ar' ? 'ar_SA' : 'en_US',
            style: {
                size: 'responsive',
                color: 'silver',
                shape: 'rect',
            },
            // Set up the payment:
            // 1. Add a payment callback
            payment: function (data, actions) {
                // 2. Make a request to your server
                return actions.request.post('/api/create-payment/')
                    .then(function (res) {
                        if (res.id){
                            return res.id;
                        }else {
                            window.location.href = '';
                        }
                    });
            },
            // Execute the payment:
            // 1. Add an onAuthorize callback
            onAuthorize: function (data, actions) {
                // 2. Make a request to your server
                return actions.request.post('/api/execute-payment/', {
                    paymentID: data.paymentID,
                    payerID: data.payerID
                })
                    .then(function (res) {
                        if (res.state == "approved"){
                            window.location.href = '/' + locale + '/thankyou';
                        }else {
                            window.location.href = '';
                        }

                    });
            }
        }, '#paypal-button');
    </script>
@endsection
