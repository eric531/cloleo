@extends('base.template')

@section('content')
    <main class="main">
        <!--Start hero slider-->
        <section class="home-slider position-relative mb-30">
            <div class="container">
                <div class="home-slide-cover mt-30">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        <div class="single-hero-slider single-animation-wrap"
                            style="background-image: url("{{ asset('assets/imgs/slider/slider-1.png') }}")>
                            <div class="slider-content">
                                <h1 class="mb-40 display-2">
                                    Don’t miss amazing<br />
                                    grocery deals
                                </h1>
                                <p class="mb-65">Sign up for the daily newsletter</p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="single-hero-slider single-animation-wrap"
                            style="background-image: url({{ asset('assets/imgs/slider/slider-2.png') }})">
                            <div class="slider-content">
                                <h1 class="mb-40 display-2">
                                    Fresh Vegetables<br />
                                    Big discount
                                </h1>
                                <p class="mb-65">Save up to 50% off on your first order</p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
        </section>
        <!--End hero slider-->
        <!--Start popular categories-->

        <section class="popular-categories section-padding">
            <div class="container wow animate__animated animate__fadeIn">
                <div class="section-title">
                    <div class="title">
                        <h3>Featured Categories</h3>
                        {{-- <ul class="list-inline nav nav-tabs links">
                            @foreach ($categories as $category)
                            <li class="list-inline-item nav-item"><a class="nav-link" href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul> --}}
                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                        id="carausel-10-columns-arrows"></div>
                </div>
                <div class="carausel-10-columns-cover position-relative">
                    <div class="carausel-10-columns" id="carausel-10-columns">
                        @foreach ($categories as $category)
                        <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <figure class="overflow-hidden img-hover-scale">
                                <a href="{{ route('category.show', $category->id) }}"><img
                                        src="{{ asset('assets/imgs/theme/icons/icon-headphone.svg') }}"
                                        alt="" /></a>
                            </figure>
                            <h6><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></h6>
                            <span>{{ $category->products->count() }} items</span>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!--End category slider-->
        <section class="banners mb-25">
            <div class="container">
                <div class="row">
                    @foreach ($pubs as $pub)
                    <div class="col-lg-4 col-md-6">
                            <h1>test</h1>
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                <img src="{{ asset('storage/' . $pub->image) }}" alt="" />
                            <div class="banner-text">
                                <h4>
                                  testrtrguhgjhoj
                                </h4>
                                <a href="" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!--End banners-->
        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>Popular Products</h3>

                </div>
                <!--End nav-tabs-->

                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    @include('partials.products-popular', ['categories' => $categories])
                </div>
                <!--End tab-content-->
            </div>
        </section>
        <!--Products Tabs-->
        <section class="pb-5 section-padding">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn">
                    <h3 class="">Meilleures ventes quotidiennes</h3>

                </div>
                <div class="row">
                    @include('partials.banniere-pub')
                    @include('partials.daily-best-sells')
                    <!--End Col-lg-9-->
                </div>
            </div>
        </section>
        <!--End Best Sales-->
        @include('partials.deal')
        <!--End Deals-->
        {{-- <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated">Top Vente</h4>
                        <div class="product-list-small animated">
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-1.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee Creamer</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-2.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee Creamer</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-3.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee Creamer</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp"
                        data-wow-delay=".1s">
                        <h4 class="section-title style-1 mb-30 animated">Produits en tendance</h4>
                        <div class="product-list-small animated">
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-4.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">Organic Cage-Free Grade A Large Brown Eggs</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-5.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, & Red
                                            Rice</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-6.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">Naturally Flavored Cinnamon Vanilla Light Roast
                                            Coffee</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp"
                        data-wow-delay=".2s">
                        <h4 class="section-title style-1 mb-30 animated">Ajout récent</h4>
                        <div class="product-list-small animated">
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-7.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">Pepperidge Farm Farmhouse Hearty White Bread</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-8.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">Organic Frozen Triple Berry Blend</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-9.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">Oroweat Country Buttermilk Bread</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
                        data-wow-delay=".3s">
                        <h4 class="section-title style-1 mb-30 animated">Top Rated</h4>
                        <div class="product-list-small animated">
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-10.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">Foster Farms Takeout Crispy Classic Buffalo
                                            Wings</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-11.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle
                                            Corn</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="mb-0 col-md-4">
                                    <a href="shop-product-right.html"><img src="assets/imgs/shop/thumbnail-12.jpg"
                                            alt="" /></a>
                                </figure>
                                <div class="mb-0 col-md-8">
                                    <h6>
                                        <a href="shop-product-right.html">All Natural Italian-Style Chicken Meatballs</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="ml-5 font-small text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        @include('base.ajaxCart')
        <!--End 4 columns-->
    </main>


@endsection
