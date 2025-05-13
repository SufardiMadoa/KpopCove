<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('pages.users.home');
});
Route::get('/album', [AlbumController::class, 'user'])->name('user.album');
 Route::get('/album/{id}', [AlbumController::class, 'userShow'])->name('user.album-detail');
Route::middleware('guest')->group(function () {
    // Login routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Registration routes
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile management
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    // Password change
    Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('password.update');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('pages.admin.index');
    })->name('dashboard');
    // Album routes
    Route::prefix('album')->name('album.')->group(function () {
        // Main album CRUD routes
        Route::get('/', [AlbumController::class, 'index'])->name('index');

        Route::get('/create', [AlbumController::class, 'create'])->name('create');
        Route::post('/store', [AlbumController::class, 'store'])->name('store');
        Route::get('/{id}', [AlbumController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AlbumController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AlbumController::class, 'update'])->name('update');
        Route::delete('/{id}', [AlbumController::class, 'destroy'])->name('destroy');

        // Additional album functionality
        Route::get('/gallery', [AlbumController::class, 'gallery'])->name('gallery');
        Route::get('/category/{kategoriId}', [AlbumController::class, 'byKategori'])->name('by-kategori');
        Route::get('/my-albums', [AlbumController::class, 'myAlbums'])->name('my-albums');
        Route::post('/search', [AlbumController::class, 'search'])->name('search');

        // Photo management within albums
        Route::post('/{id}/photos', [AlbumController::class, 'addPhotos'])->name('add-photos');
        Route::delete('/{albumId}/photos/{photoId}', [AlbumController::class, 'removePhoto'])->name('remove-photo');

        // Album status toggle
        Route::patch('/{id}/toggle-status', [AlbumController::class, 'toggleStatus'])->name('toggle-status');
    });


    Route::resource('kategori', KategoriController::class);


    Route::get('/pemesanan', [PemesananController::class, 'adminIndex'])->name('pemesanan.index');
    Route::get('/pemesanan/{id}', [PemesananController::class, 'adminShow'])->name('pemesanan.show');
    Route::get('/pemesanan/{id}/edit', [PemesananController::class, 'adminEdit'])->name('pemesanan.edit');
    Route::put('/pemesanan/{id}', [PemesananController::class, 'adminUpdate'])->name('pemesanan.update');
    Route::delete('/pemesanan/{id}', [PemesananController::class, 'adminDestroy'])->name('pemesanan.destroy');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
    });
});

// // Login dan Logout
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
// Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// // Signup
// Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
// Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

// Produk dan Kategori
// Route::get('/shop', [ProductController::class, 'index'])->name('products.index');
// Route::get('/product/{id}', [ProductDetailsController::class, 'showProductDetails'])->name('product.show');
// Route::get('/kategori', [CategoryProductController::class, 'index'])->name('categories');
// Route::get('/kategori/{id}', [CategoryProductController::class, 'show'])->name('categories.show');

// Keranjang
// Route::prefix('cart')->group(function () {
//     Route::post('/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
//     Route::get('/', [CartController::class, 'showCart'])->name('cart.view');
//     Route::delete('/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
//     Route::put('/update/{itemId}', [CartController::class, 'updateQuantity']);
// });

// Checkout dan Transaksi
// Route::post('/checkout/single/{productId}', [PaymentController::class, 'checkoutSingleProduct'])->name('checkout.single');
// Route::post('/submit-payment-proof', [PaymentController::class, 'store']);
// Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
// Route::get('/pesanan', [TransaksiController::class, 'showPesanan'])->name('pesanan');
// Route::put('/pesanan/{id}', [TransaksiController::class, 'updateStatusByUser'])->name('pesanan.updatebyuser');

// // Halaman Tambahan
// Route::view('/riwayat', 'riwayat')->name('riwayat');
// Route::view('/contact-us', 'pages.users.kontak')->name('contact_us');
// Route::view('/about', 'pages.users.about_us')->name('about');

/*
 * |--------------------------------------------------------------------------
 * | Admin Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register admin routes for your application.
 * |
 */
