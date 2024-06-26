<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BankSampahController;
use App\Http\Controllers\BeritaDanTipsController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\PDFController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dash', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    if (auth()->user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk seluruh
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //PDF
    Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');
});

// Route khusus admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // User
    Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.users.index');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    // Jenis Sampah
    Route::get('/admin/jenis-sampah', [JenisSampahController::class, 'index'])->name('admin.jenis-sampah.index');
    Route::post('/admin/jenis-sampah', [JenisSampahController::class, 'store'])->name('admin.jenis-sampah.store');
    Route::put('/admin/jenis-sampah/{id}', [JenisSampahController::class, 'update'])->name('admin.jenis-sampah.update');
    Route::delete('/admin/jenis-sampah/{id}', [JenisSampahController::class, 'destroy'])->name('admin.jenis-sampah.destroy');
    // Bank Sampah
    Route::get('/banksampah/riwayat', [BankSampahController::class, 'historyAdmin'])->name('admin.banksampah.history');
    Route::post('/banksampah/{id}', [BankSampahController::class, 'confirm'])->name('banksampah.confirm');
    Route::delete('/banksampah/{id}', [BankSampahController::class, 'destroy'])->name('banksampah.destroy');

    // Berita dan Tips
    Route::get('/admin/berita/create', [BeritaDanTipsController::class, 'create'])->name('admin.berita.create');
    Route::get('/admin/berita', [BeritaDanTipsController::class, 'adminIndex'])->name('admin.berita.index');
    Route::post('/admin/berita', [BeritaDanTipsController::class, 'store'])->name('admin.berita.store');
    Route::delete('/admin/berita/{id}', [BeritaDanTipsController::class, 'destroy'])->name('admin.berita.destroy');
    Route::get('/admin/beritas', [BeritaDanTipsController::class, 'indexAdmin'])->name('admin.berita.indexAdmin');
    Route::get('/admin/berita/{id}', [BeritaDanTipsController::class, 'showAdmin'])->name('admin.berita.show');


    // Produk
    Route::get('/admin/products', [ProdukController::class, 'index'])->name('admin.products.index');
    Route::post('/admin/products', [ProdukController::class, 'store'])->name('admin.products.store');
    Route::put('/admin/products/{product}', [ProdukController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProdukController::class, 'destroy'])->name('admin.products.destroy');
    // Transaksi
    Route::get('/admin/transaksi', [TransaksiController::class, 'indexAdmin'])->name('admin.transaksi.index');
    Route::get('/admin/konfirmasi-transaksi', [TransaksiController::class, 'showAdmin'])->name('admin.transaksi.show');
    Route::post('/transaksi/updateStatus', [TransaksiController::class, 'updateStatus'])->name('admin.transaksi.updateStatus');
    Route::delete('/admin/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('admin.transaksi.destroy');
});

// Route khusus pengguna
Route::middleware(['auth', 'role:pengguna'])->group(function () {
    // Route pengguna
    Route::get('/', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/banksampah', [BankSampahController::class, 'create'])->name('banksampah.create');
    Route::post('/banksampah', [BankSampahController::class, 'store'])->name('banksampah.store');
    // User Produk
    Route::get('/products', [UserProduKController::class, 'index'])->name('user.products.index');
    Route::get('/products/{product}', [UserProduKController::class, 'show'])->name('user.products.show');
    //Bank Sampah
    Route::get('/banksampah/history', [BankSampahController::class, 'history'])->name('banksampah.history');
    // Berita dan Tips
    Route::get('/berita', [BeritaDanTipsController::class, 'index'])->name('berita.index');
    Route::get('/berita/{id}', [BeritaDanTipsController::class, 'show'])->name('berita.show');
    // Keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/store', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::put('/keranjang/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/{produk}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
    Route::get('keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');
    // Transaksi
    Route::get('/checkout', [DetailTransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/checkout', [DetailTransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/status', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::get('/transaksi/history', [TransaksiController::class, 'index'])->name('transaksi.history');
});

require __DIR__ . '/auth.php';
