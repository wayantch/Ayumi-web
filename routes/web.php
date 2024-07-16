<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryClassController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\InterprenterLisanController;
use App\Http\Controllers\InterprenterTextController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MultiStepRegisterController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::domain('daftarayumi.mongel.net')->group(function () {
//     Route::get('/', function () {
//         return view('/login');
//     });
// });

// Rute untuk login
Route::get('/login', [SesiController::class, 'index'])->name('login');
Route::post('/login', [SesiController::class, 'login'])->name('login');

// Grup rute dengan middleware auth
Route::middleware(['auth'])->group(function () {

    // Rute untuk dashboard admin dan manajemen pengguna
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/data-user', [AdminController::class, 'dataUser'])->name('data-user');
    Route::delete('/admin/data-user/{id}', [AdminController::class, 'destroy'])->name('data-user.destroy');

    // Rute untuk manajemen pendaftaran
    Route::get('/admin/data-daftar', [DaftarController::class, 'index'])->name('data-daftar');
    Route::delete('/admin/data-daftar/{id}', [DaftarController::class, 'destroy'])->name('data-daftar.destroy');

    // Rute untuk manajemen interprenter lisan
    Route::get('/admin/data-interpreter', [InterprenterLisanController::class, 'index'])->name('data-interpreter');
    Route::delete('/admin/data-interpreter/{id}', [InterprenterLisanController::class, 'destroy'])->name('data-interpreter.destroy');

    // Rute untuk manajemen interprenter teks
    Route::get('/admin/data-text', [InterprenterTextController::class, 'index'])->name('data-text');
    Route::delete('/admin/data-text/{id}', [InterprenterTextController::class, 'destroy'])->name('data-text.destroy');

    // Rute untuk kategori kelas
    Route::get('/admin/kategori', [CategoryClassController::class, 'index'])->name('data-kategori');
    Route::get('/admin/kategori/create', [CategoryClassController::class, 'create'])->name('data-kategori.create');
    Route::post('/admin/kategori', [CategoryClassController::class, 'store'])->name('data-kategori.store');
    Route::get('/admin/kategori/{id}/edit', [CategoryClassController::class, 'edit'])->name('data-kategori.edit');
    Route::put('/admin/kategori/{id}', [CategoryClassController::class, 'update'])->name('data-kategori.update');
    Route::delete('/admin/kategori/{id}', [CategoryClassController::class, 'destroy'])->name('data-kategori.destroy');

    // Rute untuk kelas
    Route::get('/admin/kelas', [KelasController::class, 'index'])->name('data-kelas');
    Route::get('/admin/kelas/create', [KelasController::class, 'create'])->name('data-kelas.create');
    Route::post('/admin/kelas', [KelasController::class, 'store'])->name('data-kelas.store');
    Route::get('/admin/kelas/{id}/edit', [KelasController::class, 'edit'])->name('data-kelas.edit');
    Route::put('/admin/kelas/{id}', [KelasController::class, 'update'])->name('data-kelas.update');
    Route::delete('/admin/kelas/{id}', [KelasController::class, 'destroy'])->name('data-kelas.destroy');

    // Rute untuk logout
    Route::get('/admin/logout', [SesiController::class, 'logout'])->name('logout');

    // Rute untuk pendaftaran kelas
    // Route::get('/user/daftar', [DaftarController::class, 'create'])->name('daftar.create');
    Route::get('/user/daftar/{id}', [DaftarController::class, 'create'])->name('daftar.create');
    Route::post('/user/daftar', [DaftarController::class, 'store'])->name('daftar.store');

    // Rute untuk pesan terjemahan lisan
    Route::get('/user/lisans', [InterprenterLisanController::class, 'create'])->name('lisans.create');
    Route::post('/user/lisans', [InterprenterLisanController::class, 'store'])->name('lisans.store');
    Route::get('/user/lisans/detail', [InterprenterLisanController::class, 'detail'])->name('lisans.detail');
    
    // Rute untuk pesan terjemahan teks
    Route::get('/user/text', [InterprenterTextController::class, 'create'])->name('text.create');
    Route::post('/user/text', [InterprenterTextController::class, 'store'])->name('text.store');
    Route::get('/user/text/detail', [InterprenterTextController::class, 'detail'])->name('texts.detail');

    // Rute untuk pengguna
    Route::get('/user/home', [UserController::class, 'index'])->name('home');
    Route::get('user/toko', [TokoController::class, 'index'])->name('toko');
    Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
});

// Rute untuk register multi-langkah
Route::prefix('register')->group(function () {
    Route::get('step1', [MultiStepRegisterController::class, 'showStep1'])->name('register.step1');
    Route::post('step1', [MultiStepRegisterController::class, 'postStep1'])->name('register.step1.post');
    Route::get('step2', [MultiStepRegisterController::class, 'showStep2'])->name('register.step2');
    Route::post('step2', [MultiStepRegisterController::class, 'postStep2'])->name('register.step2.post');
    Route::get('step3', [MultiStepRegisterController::class, 'showStep3'])->name('register.step3');
    Route::post('step3', [MultiStepRegisterController::class, 'postStep3'])->name('register.step3.post');
});
