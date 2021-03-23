<ul>
    <li>
        <form action="{{ route('change-lang') }}" method="post">
            @csrf
            <input type="hidden" name="lang" value="{{ app()->getLocale() == 'en' ? 'ar' : 'en' }}">
            <button class="change-lang">{{ __('general.change_lang') }}</button>
        </form>
    </li>
    <li><a href="{{ route('shop.index') }}">
            <i class="fa fa-shopping-bag fa-fw align-icon"></i>
            {{ __('nav.shop') }}
        </a>
    </li>
    <li><a href="{{ route('shop.index') }}">
            <i class="fa fa-shopping-bag fa-fw align-icon"></i>
            {{ __('shop.categories') }}
        </a>
    </li>
    @auth
        <li>
            <a href="{{ route('users.edit') }}">
                <i class="fas fa-user-alt fa-fw align-icon"></i>
                {{ __('nav.my_account') }}
            </a>
        </li>
        <li>
            <a href="{{ route('orders.index') }}">
                <i class="fas fa-clipboard fa-fw"></i>
                {{ __('profile.orders') }}
            </a>
        </li>
    @endauth
{{--    <li><a href="#">--}}
{{--            <i class="fa fa-info m-y-1"></i>--}}
{{--            {{ __('nav.about') }}--}}
{{--        </a>--}}
{{--    </li>--}}
</ul>
