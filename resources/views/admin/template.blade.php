<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nest Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <script src="{{ asset('admin/assets/imgs/theme/favicon.svg') }}"></script>
    <link href="{{ asset('admin/assets/css/main.css') }}" rel="stylesheet" type="text/css" /></head>

<body>
    <div class="screen-overlay"></div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="index.html" class="brand-wrap">
                <img src="assets/imgs/theme/logo.svg" class="logo" alt="Nest Dashboard" />
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item active">
                    <a class="menu-link" href="index.html">
                        <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-products-list.html">
                        <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Categories / Produits</span>
                    </a>
                    <div class="submenu">
                        {{-- <a href="{{ route('admin.products.index') }}">Product List</a> --}}
                        <a href="{{ route('admin.products.index') }}">Product</a>
                        {{-- <a href="page-products-grid-2.html">Product grid 2</a> --}}
                        <a href="{{ route('admin.categories.index') }}">Categories</a>
                        <a href="{{ route('etiquette.index') }}">Etiquette</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-shopping_cart"></i>
                        <span class="text">Commandes</span>
                    </a>
                    <div class="submenu">
                        <a href="#">Liste de commandes</a>
                        {{-- <a href="page-orders-detail.html">Détail de la commande</a> --}}
                    </div>
                </li>

                <li class="menu-item has-submenu">
                    <a class="menu-link" href="{{ route('admin.products.create') }}">
                        <i class="icon material-icons md-add_box"></i>
                        <span class="text">Produit</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('admin.products.create') }}">Ajouter un produit</a>
                        {{-- <a href="page-orders-detail.html">Détail de la commande</a> --}}
                    </div>

                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-monetization_on"></i>
                        <span class="text">Transactions</span>
                    </a>
                    <div class="submenu">
                        <a href="#">Transaction 1</a>
                        <a href="#">Transaction 2</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-person"></i>
                        <span class="text">Créer un compte</span>
                    </a>
                    <div class="submenu">
                        {{-- <a href="page-account-login.html">User login</a> --}}
                        <a href="#">User registration</a>
                        {{-- <a href="page-error-404.html">Error 404</a> --}}
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-reviews.html">
                        <i class="icon material-icons md-comment"></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>

            </ul>
            <hr />
            <ul class="menu-aside">
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-settings"></i>
                        <span class="text">Settings</span>
                    </a>
                    <div class="submenu">
                        <a href="page-settings-1.html">Setting sample 1</a>
                        <a href="page-settings-2.html">Setting sample 2</a>
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-blank.html">
                        <i class="icon material-icons md-local_offer"></i>
                        <span class="text"> Starter page </span>
                    </a>
                </li>
            </ul>
            <br />
            <br />
        </nav>
    </aside>


    @yield("admin")

    <script src="{{ asset('admin/assets/js/vendors/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/jquery-3.7.1.min.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('admin/assets/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/vendors/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
</body>

</html>
