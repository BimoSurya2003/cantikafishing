<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardBarangMasukController;
use App\Http\Controllers\DashboardCategorieController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardOrderItemController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardPurchasesController;
use App\Http\Controllers\DashboardRekapController;
use App\Http\Controllers\DashboardStokSuplierController;
use App\Http\Controllers\DashboardSuplierController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\ExsportController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatBookingController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page.index');
});

Route::get('/about', function () {
    return view('landing_page.about');
});

Route::get('/about', function () {
    return view('landing_page.about');
});

Route::resource('/kategori-produk',LandingPageController::class);

Route::get('/event', function () {
    return view('landing_page.event');
});

Route::post('/contact', [ContactController::class, 'store']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::get('/logout',[LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index']);
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);

Route::get('/dashboard',[DashboardRekapController::class, 'rekap'])->middleware(['auth','role']);
Route::resource('/dashboard-product',DashboardProductController::class)->middleware(['auth','role']);
Route::resource('/dashboard-categorie',DashboardCategorieController::class)->middleware(['auth','role']);
Route::resource('/dashboard-order',DashboardOrderController::class)->middleware(['auth','role']);
Route::resource('/dashboard-orderitem',DashboardOrderItemController::class)->middleware(['auth','role']);
Route::resource('/dashboard-barang_masuk',DashboardBarangMasukController::class)->middleware(['auth','role']);
Route::resource('/dashboard-user',DashboardUserController::class)->middleware(['auth','role']);

Route::post('/get-sales-data', [DashboardRekapController::class, 'getSalesData'])->middleware(['auth','role']);

Route::resource('/pesanan',PesananController::class)->middleware('auth');
Route::put('/pesanan/{id}', [OrderController::class, 'update'])->name('pesanan.update');

Route::resource('/product',ProductController::class)->middleware('auth');
Route::post('/orders', [OrderController::class, 'store'])->name('order.store')->middleware('auth');
Route::resource('/cart',CartController::class)->middleware('auth');

Route::get('/export-orders', [ExsportController::class, 'exportOrders']);

Route::resource('/booking',BookingController::class)->middleware('auth');
Route::get('/pemancingan', [RiwayatBookingController::class, 'index'])->middleware('auth');
Route::put('/pemancingan/{id}/cancel', [RiwayatBookingController::class, 'cancel'])->middleware('auth');

Route::get('products/search', [ProductController::class, 'search'])->name('products.search')->middleware('auth');
Route::get('/products/category/{category}', [ProductController::class, 'showByCategory'])->name('products.category');
Route::get('/products', [ProductController::class, 'showCategories']);


