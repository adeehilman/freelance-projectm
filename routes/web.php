<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswdController;
use App\Http\Controllers\ProfilUSerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\FormPendaftaranController;
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

    Route::get('/pendaftaran/form', [FormPendaftaranController::class, 'index'])->name('/form-pendaftaran');


    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('/riwayat');
    Route::get('/riwayat/getdata', [RiwayatController::class, 'getListData'])->name('riwayat.getdata');
});

