<ul>
    @guest
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Sign up</a></li>
    @else
    <li><a href="{{ route('users.edit') }}">My Account</a></li>
    <li>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
    @endguest
    <li><a href="{{ route('cart.index') }}">
            cart
            @if(Cart::count() > 0)
                <span class="cart-count">
                        <span>{{ Cart::count() }}</span>
                </span>
            @endif
        </a>
    </li>
</ul>
