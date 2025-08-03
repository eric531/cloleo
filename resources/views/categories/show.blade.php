@extends('base.template')

@section('content')

<main class="main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">{{ $products[0]->category->name }}</h1>
                        <div class="breadcrumb">
                            <a href="index.html" rel="nofollow"><i class="mr-5 fi-rs-home"></i>Home</a>
                            <span></span> Shop <span></span> Snack
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>Nous avons trouvé <strong class="text-brand">{{ $products->count() }}</strong> produits pour vous</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="mr-10 sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>voir:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row product-grid">
                    @foreach($products as $product)
                    <div class="row-lg-1-5 col-md-3 col-6 col-sm-6">

                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                            data-wow-delay=".2s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product.show', $product->id) }}">
                                        <img class="default-img"
                                            src="{{ asset($product->image) }}"
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

                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>  {{ $product->price }} XOF</span>
                                        <span class="old-price">{{ $product->price}} XOF</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="mr-5 fi-rs-shopping-cart"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('base.modal_product')
                    @endforeach

                    <!--end product card-->

                </div>
                <!--product grid-->
                <div class="mt-20 mb-20 pagination-area">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            {{-- Bouton "Précédent" --}}
                            @if ($products->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="fi-rs-arrow-small-left"></i></span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}"><i class="fi-rs-arrow-small-left"></i></a>
                                </li>
                            @endif

                            {{-- Numéros des pages --}}
                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Bouton "Suivant" --}}
                            @if ($products->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}"><i class="fi-rs-arrow-small-right"></i></a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="fi-rs-arrow-small-right"></i></span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <!--End Pagination-->
                @include('partials.deal')
                <!--End Deals-->
            </div>
            @include('partials.sidebarRight')

        </div>
    </div>
</main>

@endsection
