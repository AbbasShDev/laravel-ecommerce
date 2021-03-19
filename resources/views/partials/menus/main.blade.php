<ul>
    <li>
        <form action="{{ route('change-lang') }}" method="post">
            @csrf
            <input type="hidden" name="lang" value="{{ app()->getLocale() == 'en' ? 'ar' : 'en' }}">
            <button class="change-lang">{{ __('general.change_lang') }}</button>
        </form>
    </li>
    <li><a href="{{ route('shop.index') }}">{{ __('nav.shop') }}</a></li>
    <li><a href="#">{{ __('nav.about') }}</a></li>
    <li><a href="#">{{ __('nav.blog') }}</a></li>
</ul>
