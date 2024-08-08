<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');
Route::get('/shop', [App\Http\Controllers\Client\EcommerceController::class, 'show_shop'])->name('shop');


// AUTHENTICATED
Route::middleware(['auth'])->group(function () {
    Route::get('/carts', [App\Http\Controllers\Client\EcommerceController::class, 'show_cart'])->name('cart');
    Route::get('/checkout', [App\Http\Controllers\Client\EcommerceController::class, 'show_checkout'])->name('checkout');
    Route::get('/orders', [App\Http\Controllers\Client\EcommerceController::class, 'show_order'])->name('order');
});


// SERVICES
Route::get("/service/alignment", [App\Http\Controllers\Client\CarAlignmentController::class, 'index']);
Route::get("/service/wash", [App\Http\Controllers\Client\CarWashController::class, 'index']);


// ADDITIONAL PAGES
Route::get("/terms-and-conditions", [App\Http\Controllers\Client\TermsConditionsController::class, 'index']);



// ADMIN ROUTES
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('users')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users');
        Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
        Route::post('/create', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{id}/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
        Route::get('/{id}/delete', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.users.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories');
        Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/create', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/{id}/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
        Route::get('/{id}/delete', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.categories.delete');
    });

    Route::prefix('tyres')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\TyreController::class, 'index'])->name('admin.tyres');
        Route::get('/create', [App\Http\Controllers\Admin\TyreController::class, 'create'])->name('admin.tyres.create');
        Route::post('/create', [App\Http\Controllers\Admin\TyreController::class, 'store'])->name('admin.tyres.store');
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\TyreController::class, 'edit'])->name('admin.tyres.edit');
        Route::put('/{id}/update', [App\Http\Controllers\Admin\TyreController::class, 'update'])->name('admin.tyres.update');
        Route::get('/{id}/delete', [App\Http\Controllers\Admin\TyreController::class, 'delete'])->name('admin.tyres.delete');
    });
});