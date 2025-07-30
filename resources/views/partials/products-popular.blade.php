

<div class="row product-grid-4">

    <!--end product card-->
    @foreach($products->take(8) as $product)
    <div class="row-lg-1-5 col-md-3 col-6 col-sm-6">

        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
            data-wow-delay=".2s">
            <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">
                    <a href="{{ route('product.show', $product->id) }}">
                        <img class="default-img"
                            src="{{ asset( $product->image) }}"
                            alt="" />
                        <img class="hover-img"
                            src="{{ asset($product->image) }}"
                            alt="" />
                    </a>
                </div>
                <div class="product-action-1">
                    <a aria-label="Add To Wishlist" class="action-btn"
                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>

                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                        data-bs-target="#quickViewModal-{{ $product->id }}"><i class="fi-rs-eye"></i></a>
                </div>
                <div class="product-badges product-badges-position product-badges-mrg">
                    <span class="sale">{{ $product->type_product->name }}</span>
                </div>
            </div>
            <div class="product-content-wrap">
                <div class="product-category">
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->category->name }}</a>
                </div>
                <h2><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h2>
                <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: 80%"></div>
                    </div>
                    <span class="ml-5 font-small text-muted"> (3.5)</span>
                </div>
                <div>
                    <span class="font-small text-muted">Par <a
                            href="{{ route('product.show', $product->id) }}">{{ $product->created_by }}</a></span>
                </div>
                <div class="product-card-bottom">
                    <div class="product-price">
                        @if($product->price == null)
                            <span>  {{ $product->old_price }} CfA</span>
                        @else
                            <span>  {{ $product->price }} XOF</span>
                            <span class="old-price">{{ $product->old_price}} CFA</span>
                        @endif
                    </div>
                    <div class="add-cart">
                        <a class="add button-add-to-cart" data-url="{{ route('cart.add', $product->id) }}" href="javascript:void(0);">
                            <i class="mr-5 fi-rs-shopping-cart"></i>Ajouter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('base.modal_product')
    @endforeach


{{-- @endforeach   --}}
    <!--end product card-->
</div>



