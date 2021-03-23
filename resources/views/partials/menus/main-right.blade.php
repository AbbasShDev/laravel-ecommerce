<ul>
    @guest
    <li>
        <a href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt fa-fw"></i>
{{--            <i class="fa fa-shopping-bag fa-fw align-icon m-y-1"></i>--}}
            {{ __('nav.log_in') }}
        </a>
    </li>
    <li>
        <a href="{{ route('register') }}">
            <i class="fas fa-user-plus fa-fw align-icon"></i>
            {{ __('nav.sign_up') }}
        </a>
    </li>
    @else
    <li>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt fa-fw"></i>
            {{ __('nav.log_out') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
    @endguest
    <li><a href="{{ route('cart.index') }}">
            <i class="fas fa-shopping-cart fa-fw align-icon"></i>
            {{ __('nav.cart') }}
            @if(Cart::count() > 0)
                <span class="cart-count">
                        <span>{{ Cart::count() }}</span>
                </span>
            @endif
        </a>
    </li>
</ul>
