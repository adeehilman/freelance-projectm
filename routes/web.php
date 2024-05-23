<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswdController;
use App\Http\Controllers\ProfilUSerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditFormController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\FormPendaftaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

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

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/registerAccount', [RegisterController::class, 'registerAccount'])->name('registerAccount');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
// Route::get('/resetpasswd', [ResetPasswdController::class, 'index'])->name('resetpasswd');
// Route::get('/profile', [ProfilUserController::class, 'index'])->name('profile');

Route::group(['middleware' => ['LoginCheck']], function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/auth/change-password', [AuthController::class, 'indexChangePass']);
    Route::post('/update-pass', [AuthController::class, 'prosesChangePass'])->name('changPass');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/getList', [DashboardController::class, 'getList'])->name('dashboard.getcard');

    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('/pendaftaran');
    Route::get('/pendaftaran/getdata', [PendaftaranController::class, 'getList'])->name('pendaftaran.getdata');
    Route::get('/pendaftaran/getEdit', [PendaftaranController::class, 'getEdit'])->name('pendaftaran.getEdit');
    Route::post('/pendaftaran/update', [PendaftaranController::class, 'update'])->name('editJalur');

    Route::get('/pendaftaran/form/{id}', [FormPendaftaranController::class, 'index'])->name('/form-pendaftaran');
    Route::post('/pendaftaran/form/insertSiswa', [FormPendaftaranController::class, 'insertSiswa'])->name('insertSiswa');
    Route::post('/pendaftaran/form/updateSiswa', [EditFormController::class, 'updateSiswa'])->name('updateSiswa');
    Route::post('/pendaftaran/insertjalur', [FormPendaftaranController::class, 'insertjalur'])->name('insertjalur');
    Route::get('/pendaftaran/form/edit/{id}', [EditFormController::class, 'index'])->name('/form-pendaftaran/edit');

    Route::get('/userrole', [AkunController::class, 'index'])->name('/userrole');

    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('/riwayat');
    Route::get('/riwayat/getdata', [RiwayatController::class, 'getListData'])->name('riwayat.getdata');
    Route::get('/riwayat/edit', [EditFormController::class, 'index'])->name('/edit-form');

    Route::get('/akun', [AkunController::class, 'index'])->name('akun');

});
