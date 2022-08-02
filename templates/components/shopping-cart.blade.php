@if(!Cart::session(auth()->user()->id)->isEmpty())
    <li class="nav-item">
        <a class="nav-link nav-item position-relative {{ (request()->routeIs('shop.cart')) ? 'active' : '' }}" href="{{ route('shop.cart') }}">
            <i class="bi-cart-fill"></i>
            Cart
            <span class="badge bg-success text-white ms-1 rounded-pill">{{ Cart::session(auth()->user()->id)->getContent()->count() }}</span>
        </a>
    </li>
@endif
