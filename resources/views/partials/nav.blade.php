<header>
    <div class="top-nav container">
        <div class="logo"><a href="/">Laravel Ecommerce</a></div>
        @if (! request()->is('checkout'))
        <ul>
            <li><a href="{{ route('shop.index') }}">Shop</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="{{ route('cart.index') }}">
                    Cart
                    @if(Cart::count() > 0)
                    <span class="cart-count">
                        <span>{{ Cart::count() }}</span>
                    </span>
                    @endif
                </a>
            </li>
        </ul>
        @endif
    </div> <!-- end top-nav -->
</header>
