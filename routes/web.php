<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\MinumanController;
use App\Http\Controllers\PesananController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', [HomeController::class, 'index'])->name('index');

    // Routes for Makanan
    Route::get('/makanan', [MakananController::class, 'index'])->name('makanan');
    Route::get('/makanan/create', [MakananController::class, 'create'])->name('create.makanan');
    Route::post('/makanan/store', [MakananController::class, 'store'])->name('store.makanan');
    Route::delete('/makanan/delete/{id_makanan}', [MakananController::class, 'delete'])->name('makanan.delete');
    Route::get('/makanan/edit/{id_makanan}', [MakananController::class, 'edit'])->name('makanan.edit');
    Route::put('/makanan/update/{id_makanan}', [MakananController::class, 'update'])->name('makanan.update');

    // Routes for Minuman
    Route::get('/minuman', [MinumanController::class, 'index'])->name('minuman');
    Route::get('/minuman/create', [MinumanController::class, 'create'])->name('create.minuman');
    Route::post('/minuman/store', [MinumanController::class, 'store'])->name('store.minuman');
    Route::delete('/minuman/delete/{id_minuman}', [MinumanController::class, 'delete'])->name('minuman.delete');
    Route::get('/minuman/edit/{id_minuman}', [MinumanController::class, 'edit'])->name('minuman.edit');
    Route::put('/minuman/update/{id_minuman}', [MinumanController::class, 'update'])->name('minuman.update');

    // Routes for Pesanan
    Route::get('/pesan', [PesananController::class, 'index'])->name('pesan');
    Route::get('/pesan/create', [PesananController::class, 'create'])->name('create.pesan');
    Route::post('/pesan/store', [PesananController::class, 'store'])->name('store.pesan');
    Route::delete('/pesan/delete/{id_pesan}', [PesananController::class, 'delete'])->name('pesan.delete');
    Route::get('/pesan/edit/{id_pesan}', [PesananController::class, 'edit'])->name('pesan.edit');
    Route::put('/pesan/update/{id_pesan}', [PesananController::class, 'update'])->name('pesan.update');
});
