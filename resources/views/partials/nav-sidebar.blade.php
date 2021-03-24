<div class="nav-sidebar">
    <div class="top-sidebar">
        <div>
            <form action="{{ route('change-lang') }}" method="post">
                @csrf
                <input type="hidden" name="lang" value="{{ app()->getLocale() == 'en' ? 'ar' : 'en' }}">
                <button class="change-lang">{{ __('general.change_lang') }}</button>
            </form>
        </div>

        <div class="close-sidebar"><i class="fas fa-times"></i></div>
    </div>

    <div class="sidebar-links">
        <ul>
            @guest
                <li>
                    <a href="{{ route('login') }}">
                        <div>{{ __('nav.log_in') }}</div>
                        <div><i class="fas fa-sign-in-alt fa-fw"></i></div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}">
                        <div>{{ __('nav.sign_up') }}</div>
                        <div><i class="fas fa-user-plus fa-fw align-icon"></i></div>
                    </a>
                </li>
                <hr>
            @endguest
            <li><a href="{{ route('cart.index') }}">
                    <div>
                        {{ __('nav.cart') }}
                        @if(Cart::count() > 0)
                            <span class="cart-count">
                            <span>{{ Cart::count() }}</span>
                            </span>
                        @endif
                    </div>
                    <div><i class="fas fa-shopping-cart fa-fw align-icon"></i></div>
                </a>
            </li>
            <li><a href="{{ route('shop.index') }}">
                    <div>{{ __('nav.shop') }}</div>
                    <div><i class="fa fa-shopping-bag fa-fw align-icon"></i></div>
                </a>
            </li>
            <li>
                <div class="dropdown">
                    <a class="dropbtn">
                        <div>
                            {{ __('shop.categories') }}
                            <i class="fa fa-caret-down dropdown-icon"></i>
                        </div>
                        <div><i class="fas fa-tag fa-fw align-icon"></i></div>
                    </a>
                    <div class="dropdown-content">
                        @foreach($categories as $category)
                            <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
                                {{ $category->getTranslatedAttribute('name') }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </li>
            @auth
                <hr>
                <li>
                    <a href="{{ route('users.edit') }}">
                        <div>{{ __('nav.account') }}</div>
                        <div><i class="fas fa-user-alt fa-fw align-icon"></i></div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('orders.index') }}">
                        <div>{{ __('profile.orders') }}</div>
                        <div><i class="fas fa-clipboard fa-fw"></i></div>

                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                        <div>{{ __('nav.log_out') }}</div>
                        <div><i class="fas fa-sign-out-alt fa-fw"></i></div>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</div>
