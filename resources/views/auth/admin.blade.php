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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/imgs/theme/flag-fr.png') }}" />
    <!-- Template CSS -->
    <script src="{{ asset('admin/assets/js/vendors/color-modes.js') }}"></script>
    <link href="{{ asset('admin/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <main>
        <header class="main-header style-2 navbar">
            <div class="col-brand">
                <a href="index.html" class="brand-wrap">
                    <img src="{{ asset('admin/assets/imgs/theme/logo.svg') }}" class="logo" alt="Nest Dashboard" />
                </a>
            </div>
            <div class="col-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link btn-icon" href="#">
                            <i class="material-icons md-notifications animation-shake"></i>
                            <span class="badge rounded-pill">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="material-icons md-public"></i></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                            <a class="dropdown-item text-brand" href="#"><img src="{{ asset('admin/assets/imgs/theme/flag-us.png') }}" alt="English" />English</a>
                            <a class="dropdown-item" href="#"><img src="{{ asset('admin/assets/imgs/theme/flag-fr.png') }}" alt="Français" />Français</a>
                            <a class="dropdown-item" href="#"><img src="{{ asset('admin/assets/imgs/theme/flag-jp.png') }}" alt="Français" />日本語</a>
                            <a class="dropdown-item" href="#"><img src="{{ asset('admin/assets/imgs/theme/flag-cn.png') }}" alt="Français" />中国人</a>
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{ asset('admin/assets/imgs/people/avatar-2.png') }}" alt="User" /></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            <a class="dropdown-item" href="#"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-account_balance_wallet"></i>Wallet</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help center</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i class="material-icons md-exit_to_app"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <section class="content-main mt-80 mb-80">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sign in</h4>
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" placeholder="Username or email" type="text" name="email" :value="old('email')" required autofocus />
                        </div>
                        <!-- form-group// -->
                        <div class="mb-3">
                            <input class="form-control" placeholder="Password" type="password" name="password" required autocomplete="current-password" />
                        </div>
                        <!-- form-group// -->
                        <div class="mb-3">
                            @if (Route::has('admin.password.request'))
                                <a href="{{ route('admin.password.request') }}" class="float-end font-sm text-muted">Mot de passe oublié ?</a>
                            @endif

                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" checked="" name="remember" id="remember_me" />
                                <span class="form-check-label">Se souvenir de moi</span>
                            </label>
                        </div>
                        <!-- form-group form-check .// -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                        <!-- form-group// -->
                    </form>
                    <p class="text-center small text-muted mb-15">or sign up with</p>
                    <div class="d-grid gap-3 mb-4">
                        <a href="#" class="btn w-100 btn-light font-sm">
                            <svg aria-hidden="true" class="icon-svg" width="20" height="20" viewBox="0 0 20 20">
                                <path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 002.38-5.88c0-.57-.05-.66-.15-1.18z" fill="#4285F4"></path>
                                <path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 01-7.18-2.54H1.83v2.07A8 8 0 008.98 17z" fill="#34A853"></path>
                                <path d="M4.5 10.52a4.8 4.8 0 010-3.04V5.41H1.83a8 8 0 000 7.18l2.67-2.07z" fill="#FBBC05"></path>
                                <path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 001.83 5.4L4.5 7.49a4.77 4.77 0 014.48-3.3z" fill="#EA4335"></path>
                            </svg>
                            Sign in using Google
                        </a>
                        <a href="#" class="btn w-100 btn-light font-sm">
                            <svg aria-hidden="true" class="icon-svg" width="20" height="20" viewBox="0 0 20 20">
                                <path d="M3 1a2 2 0 00-2 2v12c0 1.1.9 2 2 2h12a2 2 0 002-2V3a2 2 0 00-2-2H3zm6.55 16v-6.2H7.46V8.4h2.09V6.61c0-2.07 1.26-3.2 3.1-3.2.88 0 1.64.07 1.87.1v2.16h-1.29c-1 0-1.19.48-1.19 1.18V8.4h2.39l-.31 2.42h-2.08V17h-2.5z" fill="#4167B2"></path>
                            </svg>
                            Sign in using Facebook
                        </a>
                    </div>
                    <p class="text-center mb-4">Don't have account? <a href="#">Sign up</a></p>
                </div>
            </div>
        </section>
        <footer class="main-footer text-center">
            <p class="font-xs">
                <script>
                    document.write(new Date().getFullYear());
                </script>
                &copy; Nest - HTML Ecommerce Template .
            </p>
            <p class="font-xs mb-30">All rights reserved</p>
        </footer>
    </main>
    <script src="{{ asset('admin/assets/js/vendors/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/jquery-3.7.1.min.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('admin/assets/js/main.js') }}" type="text/javascript"></script>
</body>

</html>