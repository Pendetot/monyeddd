<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Pelamar\PelamarController;
use App\Http\Controllers\Api\HRD\CutiController;
use App\Http\Controllers\Api\HRD\ResignController;
use App\Http\Controllers\Api\HRD\SuratPeringatanController;
use App\Http\Controllers\Api\HRD\MutasiController;
use App\Http\Controllers\Api\Keuangan\HutangController;
use App\Http\Controllers\Api\Keuangan\RekeningController;
use App\Http\Controllers\Api\Operasional\KPIController;
use App\Http\Controllers\Api\Operasional\PembinaanController;
use App\Http\Controllers\Api\Operasional\LapDokumenController;
use App\Http\Controllers\Api\Operasional\AbsensiController;
use App\Http\Controllers\Api\Auth\RegisterLoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\HRD\AdministrasiPelamarController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('/pelamar/{pelamar}/administrasi', [AdministrasiPelamarController::class, 'update']);

Route::prefix('pelamar')->group(function () {
    Route::apiResource('/', PelamarController::class);
});

Route::prefix('hrd')->group(function () {
    Route::apiResource('cuti', CutiController::class);
    Route::apiResource('resign', ResignController::class);
    Route::apiResource('surat-peringatan', SuratPeringatanController::class);
    Route::apiResource('mutasi', MutasiController::class);
});

Route::prefix('keuangan')->group(function () {
    Route::apiResource('hutang', HutangController::class);
    Route::apiResource('rekening', RekeningController::class);
});

Route::prefix('operasional')->group(function () {
    Route::apiResource('kpi', KPIController::class);
    Route::apiResource('pembinaan', PembinaanController::class);
    Route::apiResource('lap-dokumen', LapDokumenController::class);
    Route::apiResource('absensi', AbsensiController::class);
});

Route::prefix('auth')->group(function () {
    Route::post('register', [RegisterLoginController::class, 'register']);
    Route::post('login', [RegisterLoginController::class, 'login']);
    Route::post('logout', [RegisterLoginController::class, 'logout'])->middleware('auth:sanctum');
});
