<section class="pb-5 section-padding">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
            <h3 class="">Deals du jour</h3>
            <a class="show-all" href="#">
                Voir tous les deals
                <i class="fi-rs-angle-right"></i>
            </a>
        </div>


        <div class="row">
            @foreach ($deals->take(4) as $deal)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0">
                        <div class="product-img-action-wrap">
                            <div class="product-img">
                                <a href="{{ route('products.show', $deal->id) }}">
                                    <img src="{{ asset('assets/imgs/shop/thumbnail-2.jpg')}}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="deals-countdown-wrap">
                                <div class="deals-countdown" data-countdown="2025/12/25 10:00:00"></div>
                            </div>
                            <div class="deals-content">
                                <h2><a href="{{ route('products.show', $deal->id) }}">{{ Str::limit($deal->description, 20) }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="ml-5 font-small text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html">
                                            <i class="mr-5 fa fa-shopping-cart"></i>Ajouter
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
