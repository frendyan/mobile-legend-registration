<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;

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

Route::get('/', function () {
	return redirect()->route('dashboardAll');
});

Auth::routes();
Auth::routes(['/register' => false]);

///////////////////////////////////////////////////////////////////////////
//////////////////////////////// ADMIN ////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('/dashboard/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboardAll');
Route::get('/admin/login', [App\Http\Controllers\HomeController::class, 'login'])->name('loginAdmin');


Route::get('/pendaftaran', [App\Http\Controllers\RegistrationController::class, 'index'])->name('daftar');
Route::get('/pendaftaran/all', [App\Http\Controllers\RegistrationController::class, 'indexAll'])->name('daftarAll');
Route::post('/pendaftaran/store', [App\Http\Controllers\RegistrationController::class, 'store'])->name('daftarSave');
Route::get('/data', [App\Http\Controllers\RegistrationController::class, 'show'])->name('daftarDetail');


