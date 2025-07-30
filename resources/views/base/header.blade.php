<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>

            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('home') }}"><img src="{{asset('assets/imgs/theme/logo.png')}}" alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#">
                            <select class="select-active">
                                <option>Toutes les Categories</option>
                                @foreach ($categories as $category)
                                    <option>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input type="text" placeholder="Search for items..." />
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option>Your Location</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Delaware</option>
                                        <option>Florida</option>
                                        <option>Georgia</option>
                                        <option>Hawaii</option>
                                        <option>Indiana</option>
                                        <option>Maryland</option>
                                        <option>Nevada</option>
                                        <option>New Jersey</option>
                                        <option>New Mexico</option>
                                        <option>New York</option>
                                    </select>
                                </form>
                            </div>
                            {{-- <div class="header-action-icon-2">
                                <a href="shop-compare.html">
                                    <img class="svgInject" alt="Nest" src="{{asset('assets/imgs/theme/icons/icon-compare.svg')}}" />
                                    <span class="pro-count blue">3</span>
                                </a>
                                <a href="shop-compare.html"><span class="ml-0 lable">Compare</span></a>
                            </div> --}}
                            {{-- <div class="header-action-icon-2">
                                <a href="shop-wishlist.html">
                                    <img class="svgInject" alt="Nest" src="{{asset('assets/imgs/theme/icons/icon-heart.svg')}}" />
                                    <span class="pro-count blue">321</span>
                                </a>
                                <a href="shop-wishlist.html"><span class="lable">favorite</span></a>
                            </div> --}}
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('cart.index') }}">
                                    <img alt="Nest" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}" />
                                    <span id="cart-count" class="pro-count blue">{{ Session::get('cart') ? array_sum(array_column(Session::get('cart'), 'quantity')) : 0 }}</span></a>
                                <a href="{{ route('cart.index') }}"><span class="lable">Cart</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    @include('partials.cart_dropdown')
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Nest" src="{{asset('assets/imgs/theme/icons/icon-user.svg')}}" />
                                </a>
                                <a href="page-account.html"><span class="ml-0 lable">Account</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="page-account.html"><i class="mr-10 fi fi-rs-user"></i>My Account</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i class="mr-10 fi fi-rs-location-alt"></i>Order Tracking</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i class="mr-10 fi fi-rs-label"></i>My Voucher</a>
                                        </li>
                                        <li>
                                            <a href="shop-wishlist.html"><i class="mr-10 fi fi-rs-heart"></i>My Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i class="mr-10 fi fi-rs-settings-sliders"></i>Setting</a>
                                        </li>
                                        <li>
                                            <a href="page-login.html"><i class="mr-10 fi fi-rs-sign-out"></i>Sign out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ route('home') }}"><img src="{{asset('assets/imgs/theme/logo.png')}}" alt="logo" /></a>
                </div>


                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et">Afficher</span> toutes les catégories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach($categories->take(ceil($categories->count() / 2)) as $category)
                                    <li>
                                        <a href="{{ route('category.show', $category->id) }}">
                                            <img src="{{asset('assets/imgs/theme/icons/category-' . ($loop->iteration) . '.svg')}}" alt="{{ $category->name }}" />
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <ul class="end">
                                    @foreach($categories->skip(ceil($categories->count() / 2))->take(floor($categories->count() / 2)) as $category)
                                    <li>
                                        <a href="{{ route('category.show', $category->id) }}">
                                            <img src="{{asset('assets/imgs/theme/icons/category-' . ($loop->iteration + ceil($categories->count() / 2)) . '.svg')}}" alt="{{ $category->name }}" />
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @foreach($categories->take(2) as $category)
                                        <li>
                                            <a href="{{ route('category.show', $category->id) }}">
                                                <img src="{{asset('assets/imgs/theme/icons/icon-' . ($loop->iteration) . '.svg')}}" alt="{{ $category->name }}" />
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <ul class="end">
                                        @foreach($categories->skip(2)->take(2) as $category)
                                        <li>
                                            <a href="{{ route('category.show', $category->id) }}">
                                                <img src="{{asset('assets/imgs/theme/icons/icon-' . ($loop->iteration + 2) . '.svg')}}" alt="{{ $category->name }}" />
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Voir plus...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li class="hot-deals"><img src="{{asset('assets/imgs/theme/icons/icon-hot.svg')}}" alt="hot deals" /><a href="#">Deals</a></li>

                                <li class="position-static">
                                    <a href="#">Mega menu <i class="fi-rs-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Fruit & Vegetables</a>
                                            <ul>
                                                <li><a href="#">Meat & Poultry</a></li>
                                                <li><a href="#">Fresh Vegetables</a></li>
                                                <li><a href="#">Herbs & Seasonings</a></li>
                                                <li><a href="#">Cuts & Sprouts</a></li>
                                                <li><a href="#">Exotic Fruits & Veggies</a></li>
                                                <li><a href="#">Packaged Produce</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Breakfast & Dairy</a>
                                            <ul>
                                                <li><a href="#">Milk & Flavoured Milk</a></li>
                                                <li><a href="#">Butter and Margarine</a></li>
                                                <li><a href="#">Eggs Substitutes</a></li>
                                                <li><a href="#">Marmalades</a></li>
                                                <li><a href="#">Sour Cream</a></li>
                                                <li><a href="#">Cheese</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Meat & Seafood</a>
                                            <ul>
                                                <li><a href="#">Breakfast Sausage</a></li>
                                                <li><a href="#">Dinner Sausage</a></li>
                                                <li><a href="#">Chicken</a></li>
                                                <li><a href="#">Sliced Deli Meat</a></li>
                                                <li><a href="#">Wild Caught Fillets</a></li>
                                                <li><a href="#">Crab and Shellfish</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-34">
                                            <div class="menu-banner-wrap">
                                                <a href="#"><img src="{{asset('assets/imgs/banner/banner-menu.png')}}" alt="Nest" /></a>
                                                <div class="menu-banner-content">
                                                    <h4>Hot deals</h4>
                                                    <h3>
                                                        Don't miss<br />
                                                        Trending
                                                    </h3>
                                                    <div class="menu-banner-price">
                                                        <span class="new-price text-success">Save to 50%</span>
                                                    </div>
                                                    <div class="menu-banner-btn">
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="menu-banner-discount">
                                                    <h3>
                                                        <span>25%</span>
                                                        off
                                                    </h3>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="page-contact.html">Contact</a>
                                </li>
                                <li>
                                    <div class="search-style-2">
                                        <form action="#">
                                            <select class="select-active">
                                                <option>All Categories</option>
                                                <option>Milks and Dairies</option>
                                                <option>Wines & Alcohol</option>
                                                <option>Clothing & Beauty</option>
                                                <option>Pet Foods & Toy</option>
                                                <option>Fast food</option>
                                                <option>Baking material</option>
                                                <option>Vegetables</option>
                                                <option>Fresh Seafood</option>
                                                <option>Noodles & Rice</option>
                                                <option>Ice cream</option>
                                            </select>
                                            <input type="text" placeholder="Search for items..." />
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>


                <div class="hotline d-none d-lg-flex">
                    <img src="{{asset('assets/imgs/theme/icons/icon-headphone.svg')}}" alt="hotline" />
                    <p>1900 - 888<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        {{-- <div class="header-action-icon-2">
                            <a href="#">
                                <img alt="Nest" src="{{asset('assets/imgs/theme/icons/icon-heart.svg')}}" />
                                <span class="pro-count white">4</span>
                                <span id="cart-count" class="pro-count blue">{{ Session::get('cart') ? array_sum(array_column(Session::get('cart'), 'quantity')) : 0 }}</span>
                            </a>
                        </div> --}}
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="#">
                                <img alt="Nest" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}" />
                                {{-- <span class="pro-count white">2</span> --}}
                                <span id="cart-count" class="pro-count blue">{{ Session::get('cart') ? array_sum(array_column(Session::get('cart'), 'quantity')) : 0 }}</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                @include('partials.cart_dropdown')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
