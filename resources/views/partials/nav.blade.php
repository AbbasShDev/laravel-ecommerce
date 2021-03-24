<header>
    <div class="top-nav container">
        @if (!  ( request()->is(app()->getLocale().'/checkout')|| request()->is(app()->getLocale().'/guest-checkout')) )
            <div class="top-nav-left">
                <div class="logo"><a href="{{ route('landing-page') }}"><img src="{{ asset('img/logo-white.png') }}" alt=""></a></div>
                <div class="nav-sidebar-toggler">
                    <div class="my-span"></div>
                    <div class="my-span"></div>
                    <div class="my-span"></div>
                </div>
                @include('partials.menus.main')
            </div>
            @if(Route::currentRouteName() === 'landing-page')
                @include('partials.menus.search')
            @endif
            <div class="top-nav-right">
                @include('partials.menus.main-right')
            </div>
        @endif
    </div> <!-- end top-nav -->
</header>
