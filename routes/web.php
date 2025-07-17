<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\ResignController;
use App\Http\Controllers\HutangKaryawanController;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\SuratPeringatanController;
use App\Http\Controllers\Auth\LoginController; // Import the custom LoginController
use App\Enums\RoleEnum;

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

Route::get('/', function () {
    return view('welcome');
});

// Custom Authentication Routes
Route::prefix('{role}/auth')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/home', [HomeController::class, 'index'])->name('home');

// Super Admin Routes
Route::middleware(['auth', 'role:' . RoleEnum::SuperAdmin->value])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('superadmin.dashboard');
    })->name('dashboard');
    // Add Super Admin specific resource routes here if any, e.g., user management for other roles
    // Route::resource('users', UserController::class);
});

// HRD Routes
Route::middleware(['auth', 'role:' . RoleEnum::HRD->value])->prefix('hrd')->name('hrd.')->group(function () {
    Route::get('/dashboard', function () {
        return view('hrd.dashboard');
    })->name('dashboard');
    Route::resource('pelamars', PelamarController::class);
    Route::resource('karyawans', KaryawanController::class);
    Route::resource('cutis', CutiController::class);
    Route::post('cutis/{cuti}/approve', [CutiController::class, 'approve'])->name('cutis.approve');
    Route::post('cutis/{cuti}/reject', [CutiController::class, 'reject'])->name('cutis.reject');
    Route::resource('mutasis', MutasiController::class);
    Route::resource('resigns', ResignController::class);
    Route::post('resigns/{resign}/approve', [ResignController::class, 'approve'])->name('resigns.approve');
    Route::post('resigns/{resign}/reject', [ResignController::class, 'reject'])->name('resigns.reject');
    Route::resource('surat-peringatans', SuratPeringatanController::class);
});

// Keuangan Routes
Route::middleware(['auth', 'role:' . RoleEnum::Keuangan->value])->prefix('keuangan')->name('keuangan.')->group(function () {
    Route::get('/dashboard', function () {
        return view('keuangan.dashboard');
    })->name('dashboard');
    Route::resource('hutang-karyawans', HutangKaryawanController::class);
});

// Operasional Routes
Route::middleware(['auth', 'role:' . RoleEnum::Operasional->value])->prefix('operasional')->name('operasional.')->group(function () {
    Route::get('/dashboard', function () {
        return view('operasional.dashboard');
    })->name('dashboard');
    Route::resource('kpis', KPIController::class);
});

// Guard Routes
Route::middleware(['auth', 'role:' . RoleEnum::Guard->value])->prefix('guard')->name('guard.')->group(function () {
    Route::get('/dashboard', function () {
        return view('guard.dashboard');
    })->name('dashboard');
    // Add Guard specific resource routes here
});