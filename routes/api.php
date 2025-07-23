<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterLoginController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\OverrideController;

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



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::prefix('hrd')->group(function () {
    
    
    
    
});

Route::prefix('keuangan')->group(function () {
    
    
});

Route::prefix('karyawan')->group(function () {
    
});

Route::get('/pelamar/filter', [PelamarController::class, 'filter']);
Route::post('/pelamar/{pelamar}/validate', [PelamarController::class, 'performValidation']);
Route::post('/pelamar/override', [OverrideController::class, 'store'])->middleware('auth:sanctum');
Route::post('/pelamar/{pelamar}/generate-interview-invitation', [PelamarController::class, 'generateInterviewInvitation']);
Route::post('/pelamar/{pelamar}/approve', [PelamarController::class, 'approve']);


