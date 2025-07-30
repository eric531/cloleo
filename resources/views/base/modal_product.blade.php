    <!-- Quick view -->
    <div class="modal fade custom-modal" style="background: red !!important; " id="quickViewModal-{{ $product->id }}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"style="background-color: #000e4d !important;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="product image" />
                                    </figure>
                                    {{-- <figure class="border-radius-10">
                                        <img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" />
                                    </figure> --}}
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <div><img src="{{ asset('storage/' . $product->image) }}" alt="product image') }}" alt="product image" /></div>
                                    {{-- <div><img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" /></div>
                                    <div><img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" /></div>
                                    <div><img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" /></div>
                                    <div><img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" /></div>
                                    <div><img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" /></div>
                                    <div><img src="{{ asset('assets/imgs/banner/popup-1.png') }}" alt="product image" /></div> --}}
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock"> {{ $product->status }} </span>
                                <h3 class="title-detail"><a href="shop-product-right.html"style="background: red !!important; " class="text-heading">Seeds of Change Organic Quinoa, Brown</a></h3>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="{{ $product->rating }}"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> ({{ $product->rating }})</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">{{ $product->price }}</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">{{ $product->discount }}</span>
                                            <span class="old-price font-md ml-15">{{ $product->price }}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="detail-extralink mb-30">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Ajouter au panier</button>
                                    </div>
                                </div>
                                <div class="font-xs">
                                    <ul>
                                        <li class="mb-5">Fournisseur : <span class="text-brand">Cloleo</span></li>
                                        {{-- <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2025</span></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    