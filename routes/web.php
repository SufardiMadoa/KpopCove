<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', [ProductController::class, 'Best4Product'])->name('product.best');

// Login dan Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Signup
Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

// Produk dan Kategori
Route::get('/shop', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductDetailsController::class, 'showProductDetails'])->name('product.show');
Route::get('/kategori', [CategoryProductController::class, 'index'])->name('categories');
Route::get('/kategori/{id}', [CategoryProductController::class, 'show'])->name('categories.show');

// Keranjang
Route::prefix('cart')->group(function () {
    Route::post('/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/', [CartController::class, 'showCart'])->name('cart.view');
    Route::delete('/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::put('/update/{itemId}', [CartController::class, 'updateQuantity']);
});

// Checkout dan Transaksi
Route::post('/checkout/single/{productId}', [PaymentController::class, 'checkoutSingleProduct'])->name('checkout.single');
Route::post('/submit-payment-proof', [PaymentController::class, 'store']);
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/pesanan', [TransaksiController::class, 'showPesanan'])->name('pesanan');
Route::put('/pesanan/{id}', [TransaksiController::class, 'updateStatusByUser'])->name('pesanan.updatebyuser');

// Halaman Tambahan
Route::view('/riwayat', 'riwayat')->name('riwayat');
Route::view('/contact-us', 'pages.users.kontak')->name('contact_us');
Route::view('/about', 'pages.users.about_us')->name('about');

// Dashboard untuk Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminProfileController::class, 'viewProfile'])->name('admin.profile');
    Route::put('/profile/update', [AdminProfileController::class, 'updateProfile'])->name('admin.update');

    // Produk di Dashboard
    Route::prefix('produk')->group(function () {
        Route::get('/', [ProductController::class, 'showProduct'])->name('dashboard.products');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    // Kategori di Dashboard
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryProductController::class, 'kategori_dashboard'])->name('dashboard.kategori.index');
        Route::get('/tambah', [CategoryProductController::class, 'create'])->name('dashboard.category_products.create');
        Route::post('/', [CategoryProductController::class, 'store'])->name('dashboard.category_products.store');
        Route::get('/{id}/edit', [CategoryProductController::class, 'edit'])->name('dashboard.category_products.edit');
        Route::put('/{id}', [CategoryProductController::class, 'update'])->name('dashboard.category_products.update');
        Route::delete('/{id}', [CategoryProductController::class, 'destroy'])->name('dashboard.category_products.destroy');
    });

    // Transaksi di Dashboard
    Route::prefix('transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'showAll'])->name('transaksi.showAll');
        Route::patch('/{id}/update-status', [TransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');
        Route::delete('/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
        Route::get('/laporan', [TransaksiController::class, 'showAllLaporan'])->name('transaksi.showAllLaporan');
        Route::get('/export-pdf/{filter?}', [TransaksiController::class, 'generatePdf'])->name('transaksi.exportPdf');
    });
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'viewProfile'])->name('user.profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.edit');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('user.update');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');
});
