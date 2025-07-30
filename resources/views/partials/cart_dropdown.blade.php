<ul>
    @if (Session::has('cart'))
    @foreach (Session::get('cart') as $item)
    <li>
        <div class="shopping-cart-img">
            <a href="shop-product-right.html"><img alt="Nest" src="{{asset($item['image'])}}" /></a>
        </div>
        <div class="shopping-cart-title">
            <h4><a href="shop-product-right.html">{{ $item['name'] }}</a></h4>
            <h4><span>1 × </span>{{$item['price']}} FCFA</h4>
            {{-- {{ Session::get('cart') ? array_sum(array_column(Session::get('cart'), 'quantity')) : 0 }} --}}
        </div>

    </li>
    @endforeach
    @else
    <p>Votre panier est vide</p>
    @endif
</ul>

<div class="shopping-cart-footer">
    <div class="shopping-cart-total">
        <h4>Total <span>{{ Session::get('cart') ? array_sum(array_column(Session::get('cart'), 'price')) : 0 }}</span></h4>
    </div>
    <div class="shopping-cart-button">
        <a href="{{ route('cart.index') }}" class="outline">View cart</a>
        <a href="{{ route('cart.index') }}">Checkout</a>
        <div id="cart-count" style="margin-top: 10px;">🛒 <span>{{ Session::get('cart') ? count(Session::get('cart')) : 0 }}</span> articles</div>
    </div>
</div>
