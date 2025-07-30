<div class="col-lg-1-5 primary-sidebar sticky-sidebar">
    <div class="sidebar-widget widget-category-2 mb-30">
        <h5 class="section-title style-1 mb-30">Categories</h5>
        <ul>
            @foreach ($categories as $category)
            <li>
                <a href="{{ (route('category.show', $category->id)) }}"> <img src="{{asset('assets/imgs/theme/icons/category-' . ($loop->iteration) . '.svg')}}" alt="{{ $category->name }}" />{{ $category->name }}</a><span class="count">{{ $category->products->count() }}</span>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- Fillter By Price -->
    <div class="sidebar-widget price_range range mb-30">
        <h5 class="section-title style-1 mb-30">Fill by price</h5>
        <div class="price-filter">
            <div class="price-filter-inner">
                <div id="slider-range" class="mb-20"></div>
                <div class="d-flex justify-content-between">
                    <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>
                    <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                </div>
            </div>
        </div>

        <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
    </div>
    <!-- Product sidebar Widget -->
    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
        <h5 class="section-title style-1 mb-30">New products</h5>

        @foreach ($nouveaux->take(3) as $product )
        <div class="single-post clearfix">
            <div class="image">
                <img src="assets/imgs/shop/thumbnail-3.jpg" alt="#" />
            </div>
            <div class="content pt-10">
                <h5><a href="shop-product-detail.html">{{ $product->name }}</a></h5>
                <p class="price mb-0 mt-5">{{ $product->price }} XOF</p>
                <div class="product-rate">
                    <div class="product-rating" style="width: 90%"></div>
                </div>
            </div>
        </div>
        @endforeach
        
        
    </div>
    <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
        <img src="{{ asset('assets/imgs/banner/banner-11.png') }}" alt="" />
        <div class="banner-text">
            <span>Oganic</span>
            <h4>
                Save 17% <br />
                on <span class="text-brand">Oganic</span><br />
                Juice
            </h4>
        </div>
    </div>
</div>