<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminUserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CheckoutController;


// Auth admin
Route::get('/admin/login', [adminUserController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [adminUserController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [adminUserController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'admin'])->group(function () {
    // Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [adminUserController::class, 'dashboard'])->name('admin.dashboard');


    // Route::resource('/admin/products', ProductController::class);
    Route::resource('/admin/categories', CategoryController::class);

    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{order}/update', [OrderController::class, 'update'])->name('admin.orders.update');

    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/pubs', [AdminController::class, 'pubIndex'])->name('admin.pubs.index');
    Route::get('/pubs/create', [AdminController::class, 'pubCreate'])->name('admin.pubs.create');
    Route::post('/pubs', [AdminController::class, 'pubStore'])->name('admin.pubs.store');
    Route::get('/pubs/{pub}/edit', [AdminController::class, 'pubEdit'])->name('admin.pubs.edit');
    Route::put('/pubs/{pub}', [AdminController::class, 'pubUpdate'])->name('admin.pubs.update');
    Route::delete('/pubs/{pub}', [AdminController::class, 'pubDestroy'])->name('admin.pubs.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/etiquette', [AdminController::class, 'etiquette'])->name('etiquette.index');
    Route::post('/etiquette/store', [AdminController::class, 'etiquetteStore'])->name('etiquette.store');
    Route::get('/etiquette/{etiquette}/edit', [AdminController::class, 'etiquetteEdit'])->name('etiquette.edit');
    Route::put('/etiquette/{etiquette}', [AdminController::class, 'etiquetteUpdate'])->name('etiquette.update');
    Route::delete('/etiquette/{etiquette}', [AdminController::class, 'etiquetteDestroy'])->name('etiquette.destroy');
});
