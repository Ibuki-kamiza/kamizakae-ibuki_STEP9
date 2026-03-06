<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\PurchaseController;
use App\Http\Controllers\Admin\MyPageController;
use App\Http\Controllers\Admin\ExhibitProductController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\User\OrderController;

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase.index');
    Route::post('/purchase', [PurchaseController::class, 'store'])->name('purchase.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/products/{test}/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});
Route::get('/', [ProductController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | 購入側(User)
    |--------------------------------------------------------------------------
    */
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/{test}', [ProductController::class, 'show'])->name('show');
        Route::post('/{test}/favorite', [ProductController::class, 'toggleFavorite'])->name('favorite');
        Route::post('/{test}/cart', [CartController::class, 'store'])->name('cart.store');
    });

    Route::prefix('purchase')->name('purchase.')->group(function () {
        Route::get('/{test}', [PurchaseController::class, 'show'])->name('show');
        Route::post('/{test}', [PurchaseController::class, 'store'])->name('store');
    });

    /*
    |--------------------------------------------------------------------------
    | 管理側(Admin)
    |--------------------------------------------------------------------------
    */
    Route::prefix('mypage')->name('mypage.')->group(function () {
        Route::get('/', [MyPageController::class, 'index'])->name('index');
    });

    Route::prefix('admin/products')->name('admin.products.')->group(function () {
        Route::get('/', [ExhibitProductController::class, 'index'])->name('index');
        Route::get('/create', [ExhibitProductController::class, 'create'])->name('create');
        Route::post('/', [ExhibitProductController::class, 'store'])->name('store');
        Route::get('/{test}', [ExhibitProductController::class, 'show'])->name('show');
        Route::get('/{test}/edit', [ExhibitProductController::class, 'edit'])->name('edit');
        Route::put('/{test}', [ExhibitProductController::class, 'update'])->name('update');
        Route::delete('/{test}', [ExhibitProductController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/edit', [AccountController::class, 'edit'])->name('edit');
        Route::put('/', [AccountController::class, 'update'])->name('update');
    });

    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('/', [ContactController::class, 'create'])->name('create');
        Route::post('/', [ContactController::class, 'store'])->name('store');
    });
});