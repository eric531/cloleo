<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\views\HomeController;
use App\Http\Controllers\views\FavoriteController;
use App\Http\Controllers\client\UserController;
use App\Http\Controllers\views\ReviewController;
use App\Http\Controllers\views\CartController;
use App\Http\Controllers\views\CheckoutController;
use App\Http\Controllers\auth\AuthenticatedSessionController;

// Public
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Produits et catégories
Route::prefix('views')->group(function () {
    Route::get('/category/{category}', [HomeController::class, 'show'])->name('category.show');
    Route::get('/products/{product}', [HomeController::class, 'showProduct'])->name('product.show');
    Route::get('/products', [HomeController::class, 'index'])->name('products.index');

    // Panier
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

});

// Espace utilisateur

Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout-detail',[CheckoutController::class, 'checkout'])->name('checkout.detail');
Route::post('/checkout/update', [CheckoutController::class, 'update'])->name('checkout.update');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/favorites', [UserController::class, 'favorites'])->name('favorites');
    Route::get('/orders', [UserController::class, 'orders'])->name('orders');
    Route::get('/reviews', [UserController::class, 'reviews'])->name('reviews');

    // Avis & favoris
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::post('/products/{product}/favorite', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
});
