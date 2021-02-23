<header>
    <div class="top-nav container">
        @if (!  ( request()->is(app()->getLocale().'/checkout')|| request()->is(app()->getLocale().'/guest-checkout')) )
            <div class="top-nav-left">
                <div class="logo">Ecommerce</div>
                @include('partials.menus.main')
            </div>
            <div class="top-nav-right">
                @include('partials.menus.main-right')
            </div>
        @endif
    </div> <!-- end top-nav -->
</header>
