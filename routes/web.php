<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ContohController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilTimController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfilEditController;

// Route::get('/', function () {
//     return view('index.index');
// })->name('home');
Route::get('/', [LayananController::class, 'indexPublic'])->name('home');
Route::get('/service', function () {
    return view('index.service');
})->name('service');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');

Route::post('/login', [LoginController::class, 'handleLogin'])->name('login')->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'Logout'])->name('logout');

    Route::prefix('manajemen-user')->as('manajemen-user.')->group(function () {
        Route::prefix('users')->as('users.')->controller(UserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            Route::post('/ganti-password', 'gantiPassword')->name('ganti-password');
        Route::post('/reset-password/{id}', 'resetPassword')->name('reset-password');
        });
        Route::prefix('roles')->as('roles.')->controller(RoleController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        Route::prefix('role_user')->as('role_user.')->controller(RoleUserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            // Route::get('/{user}', [RoleUserController::class, 'edit'])->name('edit');
            // Route::put('/{user}', [RoleUserController::class, 'update'])->name('update');
            // Route::delete('/{id}/destroy','destroy')->name('destroy');
        });
        // Route::prefix('product')->as('product.')->controller(ProductController::class)->group(function() {
        //     Route::get('/', 'index')->name('index');
        //     Route::post('/', 'store')->name('store');
        //     Route::delete('/{id}/destroy','destroy')->name('destroy');
        //     // Route::post('/{id}', 'destroy')->name('destroy');
        //     // Route::delete('/{id}', 'destroy')->name('destroy');
        // });
    });
    Route::prefix('contoh')->as('contoh.')->controller(ContohController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    Route::prefix('profil-perusahaan')->as('profil-perusahaan.')->group(function () {
        Route::prefix('profil')->as('profil.')->controller(ProfilController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            // Route::delete('/{id}/destroy','destroy')->name('destroy');
        });
        Route::prefix('profil-edit')->as('profil-edit.')->controller(ProfilEditController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            // Route::delete('/{id}/destroy','destroy')->name('destroy');
        });
        Route::prefix('profil-tim')->as('profil-tim.')->controller(ProfilTimController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
    });


    Route::prefix('produk-layanan')->name('produk-layanan.')->group(function () {

        // 1. KATEGORI (Rute: produk-layanan.kategori)
        Route::resource('kategori', KategoriController::class)->except(['show'])->names([
            'index' => 'kategori.index',      // produk-layanan.kategori.index
            'create' => 'kategori.create',
            'store' => 'kategori.store',
            'edit' => 'kategori.edit',
            'update' => 'kategori.update',
            'destroy' => 'kategori.destroy',
        ]);

        // 2. PRODUK (Rute: produk-layanan.produk)
        Route::resource('produk', ProdukController::class)->except(['show'])->names([
            'index' => 'produk.index',        // produk-layanan.produk
            'create' => 'produk.create',
            'store' => 'produk.store',
            'edit' => 'produk.edit',
            'update' => 'produk.update',
            'destroy' => 'produk.destroy',
        ]);

        // 3. LAYANAN (Rute: produk-layanan.layanan)
        Route::resource('layanan', LayananController::class)->except(['show'])->names([
            'index' => 'layanan.index',       // produk-layanan.layanan
            'create' => 'layanan.create',
            'store' => 'layanan.store',
            'edit' => 'layanan.edit',
            'update' => 'layanan.update',
            'destroy' => 'layanan.destroy',
        ]);
    });

    Route::resource('apply', ApplyController::class);
    Route::post('/apply-job-public', [ApplyController::class, 'storePublic'])->name('apply.storePublic');
    // Route::get('/', [LayananController::class, 'indexPublic'])->name('layanan.indexPublic');
    // Route::get('/', [LayananController::class, 'indexPublic'])->name('home');

    // Route::resource('berita', BeritaController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('news', NewsController::class);
    Route::resource('faq', FaqController::class);
});
