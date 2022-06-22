<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bidder;
use App\Http\Controllers\Auctioneer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    return redirect()->route('bidder.home');
});

Route::prefix('bidder')->group(function () {
    Route::get('/', function () {
        return redirect()->route('bidder.home');
    });

    Route::group([
        'prefix' => 'home',
        'controller' => Bidder\HomeController::class
    ], function () {
        Route::get('/', 'index')->name('bidder.home');
    });

    Route::group([
        'prefix' => 'auth',
        'controller' => Bidder\AuthController::class
    ], function () {
        Route::get('/login', 'login')->name('bidder.auth.login');
        Route::post('/login', 'authenticate');

        Route::get('/register', 'register')->name('bidder.auth.register');
        Route::post('/register', 'store');

        Route::get('/logout', 'logout')->middleware('auth:bidder')->name('bidder.auth.logout');

        Route::get('/forgot', 'forgot')->name('bidder.auth.forgot');
        Route::post('/forgot', 'sendResetLink');

        Route::get('/reset', 'reset')->name('bidder.auth.reset');
        Route::post('/reset', 'doResetPassword');

        Route::get('/profile', 'profile')->name('bidder.auth.profile');
        Route::post('/profile', 'update');
    });

    Route::group([
        'prefix' => 'produk',
        'controller' => Bidder\ProdukController::class
    ], function () {
        Route::get('/semua', 'semua')->name('bidder.produk.semua');

        Route::get('/lihat/{produk}', 'lihat')->name('bidder.produk.lihat');

        Route::post('/tawar/{produk}', 'tawar')->middleware('auth:bidder')->name('bidder.produk.tawar');
    });

    Route::group([
        'prefix' => 'pengiriman',
        'controller' => Bidder\PengirimanController::class,
        'middleware' => 'auth:bidder'
    ], function () {
        Route::get('/semua', 'semua')->name('bidder.pengiriman.semua');
    });

    Route::group([
        'prefix' => 'saldo',
        'controller' => Bidder\SaldoController::class,
        'middleware' => 'auth:bidder'
    ], function () {
        Route::get('/riwayat', 'riwayat')->name('bidder.saldo.riwayat');

        Route::get('/topup', 'topup')->name('bidder.saldo.topup');
        Route::post('/topup', 'requestTopup');

        Route::get('/tarik', 'tarik')->name('bidder.saldo.tarik');
        Route::post('/tarik', 'requestTarik');
    });
});

Route::prefix('auctioneer')->group(function () {
    Route::group([
        'prefix' => 'auth',
        'controller' => Auctioneer\AuthController::class
    ], function () {
        Route::get('/login', 'login')->name('auctioneer.auth.login');
        Route::post('/login', 'authenticate');

        Route::get('/logout', 'logout')->middleware('auth:auctioneer')->name('auctioneer.auth.logout');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::group([
            'prefix' => 'dashboard',
            'controller' => Auctioneer\DashboardController::class
        ], function () {
            Route::get('/', 'index')->name('auctioneer.dashboard');
        });

        Route::group([
            'prefix' => 'produk',
            'controller' => Auctioneer\ProdukController::class
        ], function () {
            Route::get('/tawaran/{produk}', 'tawaran')->name('auctioneer.produk.tawaran');

            Route::get('/tambah', 'tambah')->name('auctioneer.produk.tambah');
            Route::post('/tambah', 'simpanTambah');

            Route::get('/semua', 'semua')->name('auctioneer.produk.semua');

            Route::get('/edit/{produk}', 'edit')->name('auctioneer.produk.lihat');
            Route::post('/edit/{produk}', 'simpanEdit');

            Route::post('/hapus/{produk}', 'hapus')->name('auctioneer.produk.hapus');
        });

        Route::group([
            'prefix' => 'pengiriman',
            'controller' => Auctioneer\PengirimanController::class
        ], function () {
            Route::get('/semua', 'semua')->name('auctioneer.pengiriman.semua');

            Route::get('/kirim/{produk}', 'kirim')->name('auctioneer.pengiriman.kirim');
            Route::post('/kirim/{produk}', 'simpan');
        });

        Route::group([
            'prefix' => 'saldo',
            'controller' => Auctioneer\SaldoController::class
        ], function () {
            Route::get('/semua', 'semua')->name('auctioneer.saldo.semua');

            Route::get('/lihat/{pengajuan}', 'lihat')->name('auctioneer.saldo.lihat');

            Route::post('/terima/{pengajuan}', 'terima')->name('auctioneer.saldo.terima');
            Route::post('/tolak/{pengajuan}', 'tolak')->name('auctioneer.saldo.tolak');
        });
    });
});

