<!--Start Daily Best Sells-->
<div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
    <div class="tab-content" id="myTabContent-1">
        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
            <div class="carausel-4-columns-cover arrow-center position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">

                    {{-- les plus vendu --}}
                    @foreach($products as $product)
                    <div class="product-cart-wrap">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ route('product.show', $product->id) }}">
                                    <img class="default-img" style="height: 150px; width: 300px;" src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                                    <img class="hover-img" style="height: 150px; width: 300px;" src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-product-id="{{ $product->id }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="{{ route('favorites.toggle', $product->id) }}">
                                    <i class="fi-rs-heart"></i>
                                </a>
                                {{-- <a aria-label="Compare" class="action-btn small hover-up" href="">
                                    <i class="fi-rs-shuffle"></i>
                                </a> --}}
                            </div>
                            @if($product->discount > 0)
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">-{{ $product->discount }}%</span>
                            </div>
                            @endif
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="{{ route('category.show', $product->category->id) }}">{{ $product->category->name??'' }}</a>
                            </div>
                            <h2><a href="{{ route('product.show', $product->id) }}">{{ Str::limit($product->description, 50) }}</a></h2>
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width: {{ $product->rating * 20 }}%"></div>
                            </div>
                            <div class="mt-10 product-price">
                                <span>{{ number_format($product->price, 2) }} €</span>
                                @if($product->old_price)
                                <span class="old-price">{{ number_format($product->old_price, 2) }} €</span>
                                @endif
                            </div>
                            <div class="sold mt-15 mb-15">
                                <div class="mb-5 progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ ($product->sold / $product->stock) * 100 }}%"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="font-xs text-heading">Stock: {{ $product->sold }}/{{ $product->stock }}</span>
                            </div>
                            {{-- <a href="{{ route('cart.add', $product->id) }}" class="btn w-100 hover-up">
                                <i class="mr-5 fi-rs-shopping-cart"></i>Ajouter au panier
                            </a> --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Daily Best Sells-->
