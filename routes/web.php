<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\ResignController;
use App\Http\Controllers\SuratPeringatanController;
use App\Http\Controllers\HutangKaryawanController;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\Karyawan\AbsensiController;
use App\Http\Controllers\Karyawan\LapDokumenController;
use App\Http\Controllers\Karyawan\PembinaanController;
use App\Http\Controllers\Keuangan\RekeningKaryawanController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Enums\RoleEnum;
use App\Http\Controllers\AdministrasiPelamarController;

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

use App\Models\Setting;

Route::get('/', function () {
    $is_form_enabled = Setting::where('key', 'is_form_enabled')->first();
    $is_form_enabled = $is_form_enabled ? ($is_form_enabled->value === 'true') : true; // Default to true if not set
    return view('welcome', compact('is_form_enabled'));
});


    Route::get('/hutang', [App\Http\Controllers\KeuanganController::class, 'indexHutang'])->name('hutang.index');
    Route::get('/hutang/{hutangKaryawan}', [App\Http\Controllers\KeuanganController::class, 'showHutang'])->name('hutang.show');

Route::post('/pelamar/store', [App\Http\Controllers\PelamarController::class, 'store'])->name('pelamar.store');
Route::get('/pelamar/store', function () {
    return redirect('/');
});



// Custom Authentication Routes
Route::prefix('superadmin/auth')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::prefix('hrd/auth')->name('hrd.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::prefix('keuangan/auth')->name('keuangan.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});



Route::prefix('karyawan/auth')->name('karyawan.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::prefix('logistik/auth')->name('logistik.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});
Route::prefix('pelamar/auth')->name('pelamar.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::get('/pelamar/{pelamar}/confirm-interview', [App\Http\Controllers\PelamarController::class, 'showConfirmationForm'])->name('pelamar.show-confirm-interview');
Route::post('/pelamar/{pelamar}/confirm-interview', [App\Http\Controllers\PelamarController::class, 'confirmInterview'])->name('pelamar.confirm-interview');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/home', [HomeController::class, 'index'])->name('home');

// Super Admin Routes
Route::middleware(['auth', 'check.role:' . RoleEnum::SuperAdmin->value])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\SuperAdmin\SuperAdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::get('/settings', [App\Http\Controllers\SuperAdmin\SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [App\Http\Controllers\SuperAdmin\SettingController::class, 'update'])->name('settings.update');

    // Pengajuan Barang Routes for Superadmin
    Route::get('/pengajuan-barang', [App\Http\Controllers\SuperadminPengajuanBarangController::class, 'index'])->name('pengajuan-barang.index');
    Route::post('/pengajuan-barang/{pengajuan_barang}/approve', [App\Http\Controllers\SuperadminPengajuanBarangController::class, 'approve'])->name('pengajuan-barang.approve');
    Route::post('/pengajuan-barang/{pengajuan_barang}/reject', [App\Http\Controllers\SuperadminPengajuanBarangController::class, 'reject'])->name('pengajuan-barang.reject');
    
});

// HRD Routes
Route::middleware(['auth', 'check.role:' . RoleEnum::HRD->value])->prefix('hrd')->name('hrd.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HrdDashboardController::class, 'index'])->name('dashboard');

    // Pengajuan Barang Routes for HRD
    Route::get('/pengajuan-barang/create', [App\Http\Controllers\HrdPengajuanBarangController::class, 'create'])->name('pengajuan-barang.create');
    Route::post('/pengajuan-barang', [App\Http\Controllers\HrdPengajuanBarangController::class, 'store'])->name('pengajuan-barang.store');

    Route::resource('karyawans', KaryawanController::class)->names([
        'index' => 'data-karyawan',
        'create' => 'data-karyawan.create',
        'store' => 'data-karyawan.store',
        'show' => 'data-karyawan.show',
        'edit' => 'data-karyawan.edit',
        'update' => 'data-karyawan.update',
        'destroy' => 'data-karyawan.destroy',
    ]);

    Route::resource('cutis', CutiController::class)->names([
        'index' => 'pengajuan-cuti',
        'create' => 'pengajuan-cuti.create',
        'store' => 'pengajuan-cuti.store',
        'show' => 'pengajuan-cuti.show',
        'edit' => 'pengajuan-cuti.edit',
        'update' => 'pengajuan-cuti.update',
        'destroy' => 'pengajuan-cuti.destroy',
    ]);
    Route::post('cutis/{cuti}/approve', [CutiController::class, 'approve'])->name('pengajuan-cuti.approve');
    Route::post('cutis/{cuti}/reject', [CutiController::class, 'reject'])->name('pengajuan-cuti.reject');

    Route::resource('resigns', ResignController::class)->names([
        'index' => 'data-resign',
        'create' => 'data-resign.create',
        'store' => 'data-resign.store',
        'show' => 'data-resign.show',
        'edit' => 'data-resign.edit',
        'update' => 'data-resign.update',
        'destroy' => 'data-resign.destroy',
    ]);
    Route::post('resigns/{resign}/approve', [ResignController::class, 'approve'])->name('data-resign.approve');
    Route::post('resigns/{resign}/reject', [ResignController::class, 'reject'])->name('data-resign.reject');

    Route::resource('surat-peringatans', SuratPeringatanController::class)->names([
        'index' => 'surat-peringatan',
        'create' => 'surat-peringatan.create',
        'store' => 'surat-peringatan.store',
        'show' => 'surat-peringatan.show',
        'edit' => 'surat-peringatan.edit',
        'update' => 'surat-peringatan.update',
        'destroy' => 'surat-peringatan.destroy',
    ]);

    Route::resource('mutasis', MutasiController::class)->names([
        'index' => 'mutasi-karyawan',
        'create' => 'mutasi-karyawan.create',
        'store' => 'mutasi-karyawan.store',
        'show' => 'mutasi-karyawan.show',
        'edit' => 'mutasi-karyawan.edit',
        'update' => 'mutasi-karyawan.update',
        'destroy' => 'mutasi-karyawan.destroy',
    ]);

    Route::resource('pelamars', App\Http\Controllers\PelamarController::class)->names([
        'index' => 'administrasi-pelamar',
        'create' => 'administrasi-pelamar.create',
        'store' => 'administrasi-pelamar.store',
        'show' => 'administrasi-pelamar.show',
        'edit' => 'administrasi-pelamar.edit',
        'update' => 'administrasi-pelamar.update',
        'destroy' => 'administrasi-pelamar.destroy',
    ]);
    Route::post('pelamars/{pelamar}/approve', [App\Http\Controllers\PelamarController::class, 'approve'])->name('administrasi-pelamar.approve');
    Route::post('pelamars/{pelamar}/reject', [App\Http\Controllers\PelamarController::class, 'reject'])->name('administrasi-pelamar.reject');
    Route::get('pelamars/{pelamar}/pat', [App\Http\Controllers\PelamarController::class, 'showPatForm'])->name('administrasi-pelamar.show-pat-form');
    Route::post('pelamars/{pelamar}/pat', [App\Http\Controllers\PelamarController::class, 'storePatResult'])->name('administrasi-pelamar.store-pat-result');
    Route::get('pelamars/{pelamar}/psikotest', [App\Http\Controllers\PelamarController::class, 'showPsikotestForm'])->name('administrasi-pelamar.show-psikotest-form');
    Route::post('pelamars/{pelamar}/psikotest', [App\Http\Controllers\PelamarController::class, 'storePsikotestResult'])->name('administrasi-pelamar.store-psikotest-result');
    Route::get('pelamars/{pelamar}/health-test', [App\Http\Controllers\PelamarController::class, 'showHealthTestForm'])->name('administrasi-pelamar.show-health-test-form');
    Route::post('pelamars/{pelamar}/health-test', [App\Http\Controllers\PelamarController::class, 'storeHealthTestResult'])->name('administrasi-pelamar.store-health-test-result');
    Route::get('pelamars/{pelamar}/interview', [App\Http\Controllers\PelamarController::class, 'showInterviewForm'])->name('administrasi-pelamar.show-interview-form');
    Route::post('pelamars/{pelamar}/interview', [App\Http\Controllers\PelamarController::class, 'storeInterviewResult'])->name('administrasi-pelamar.store-interview-result');
    Route::get('pelamars/{pelamar}/final-decision', [App\Http\Controllers\PelamarController::class, 'showFinalDecisionForm'])->name('administrasi-pelamar.show-final-decision-form');
    Route::post('pelamars/{pelamar}/final-decision', [App\Http\Controllers\PelamarController::class, 'storeFinalDecision'])->name('administrasi-pelamar.store-final-decision');
});

// Keuangan Routes
Route::middleware(['auth', 'check.role:' . RoleEnum::Keuangan->value])->prefix('keuangan')->name('keuangan.')->group(function () {
    Route::get('/dashboard', function () {
        return view('keuangan.dashboard');
    })->name('dashboard');
    Route::resource('hutang-karyawans', HutangKaryawanController::class);
    Route::resource('rekening-karyawans', RekeningKaryawanController::class);
    Route::get('/penalti-sp', [\App\Http\Controllers\KeuanganController::class, 'indexPenalti'])->name('penalti-sp.index');
    Route::resource('surat-peringatan', SuratPeringatanController::class)->only(['show', 'edit', 'update', 'destroy']);
    Route::get('/surat-peringatan/create', [SuratPeringatanController::class, 'create'])->name('surat-peringatan.create');
    Route::post('/surat-peringatan', [SuratPeringatanController::class, 'store'])->name('surat-peringatan.store');
});

// Karyawan Routes
Route::middleware(['auth', 'check.role:' . RoleEnum::Karyawan->value])->prefix('karyawan')->name('karyawan.')->group(function () {
    Route::get('/dashboard', function () {
        return view('karyawan.dashboard');
    })->name('dashboard');
    Route::resource('kpis', App\Http\Controllers\Karyawan\KPIKaryawanController::class)->names([
        'index' => 'kpis',
        'create' => 'kpis.create',
        'store' => 'kpis.store',
        'show' => 'kpis.show',
        'edit' => 'kpis.edit',
        'update' => 'kpis.update',
        'destroy' => 'kpis.destroy',
    ]);
    Route::resource('absensis', App\Http\Controllers\Karyawan\AbsensiController::class)->names([
        'index' => 'absensis',
        'create' => 'absensis.create',
        'store' => 'absensis.store',
        'show' => 'absensis.show',
        'edit' => 'absensis.edit',
        'update' => 'absensis.update',
        'destroy' => 'absensis.destroy',
    ]);
    Route::resource('lap-dokumens', App\Http\Controllers\Karyawan\LapDokumenController::class)->names([
        'index' => 'lap-dokumens',
        'create' => 'lap-dokumens.create',
        'store' => 'lap-dokumens.store',
        'show' => 'lap-dokumens.show',
        'edit' => 'lap-dokumens.edit',
        'update' => 'lap-dokumens.update',
        'destroy' => 'lap-dokumens.destroy',
    ]);
    Route::resource('pembinaans', App\Http\Controllers\Karyawan\PembinaanController::class)->names([
        'index' => 'pembinaans',
        'create' => 'pembinaans.create',
        'store' => 'pembinaans.store',
        'show' => 'pembinaans.show',
        'edit' => 'pembinaans.edit',
        'update' => 'pembinaans.update',
        'destroy' => 'pembinaans.destroy',
    ]);
});

// Logistik Routes
Route::middleware(['auth', 'check.role:' . RoleEnum::Logistik->value])->prefix('logistik')->name('logistik.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\LogistikDashboardController::class, 'index'])->name('dashboard');
    // Pengajuan Barang Routes for Logistic
    Route::get('/pengajuan-barang', [App\Http\Controllers\LogisticPengajuanBarangController::class, 'index'])->name('pengajuan-barang.index');
    Route::post('/pengajuan-barang/{pengajuan_barang}/approve', [App\Http\Controllers\LogisticPengajuanBarangController::class, 'approve'])->name('pengajuan-barang.approve');
    Route::post('/pengajuan-barang/{pengajuan_barang}/reject', [App\Http\Controllers\LogisticPengajuanBarangController::class, 'reject'])->name('pengajuan-barang.reject');
    Route::post('/pengajuan-barang/{pengajuan_barang}/set-item-status', [App\Http\Controllers\LogisticPengajuanBarangController::class, 'setItemStatus'])->name('pengajuan-barang.set-item-status');
});

// Pelamar Routes
Route::middleware(['auth', 'check.role:' . RoleEnum::Pelamar->value])->prefix('pelamar')->name('pelamar.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\PelamarDashboardController::class, 'index'])->name('dashboard');
});