
<ul>
    @foreach($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">
                {{ $menu_item->title }}
                @if($menu_item->title === 'cart')
                    @if(Cart::count() > 0)
                        <span class="cart-count">
                        <span>{{ Cart::count() }}</span>
                    </span>
                    @endif
                @endif
            </a>
        </li>
    @endforeach
</ul>
