<ul>
    @guest
    <li><a href="{{ route('login') }}">{{ __('nav.log_in') }}</a></li>
    <li><a href="{{ route('register') }}">{{ __('nav.sign_up') }}</a></li>
    @else
    <li><a href="{{ route('users.edit') }}">{{ __('nav.my_account') }}</a></li>
    <li>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            {{ __('nav.log_out') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
    @endguest
    <li><a href="{{ route('cart.index') }}">
            {{ __('nav.cart') }}
            @if(Cart::count() > 0)
                <span class="cart-count">
                        <span>{{ Cart::count() }}</span>
                </span>
            @endif
        </a>
    </li>
</ul>
