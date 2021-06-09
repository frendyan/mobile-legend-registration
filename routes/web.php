<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationAdminController;
use App\Http\Controllers\FeedbacksController;

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
Route::get('/pendaftaran/all', [App\Http\Controllers\RegistrationAdminController::class, 'indexAll'])->name('daftarAll');
Route::post('/pendaftaran/store', [App\Http\Controllers\RegistrationController::class, 'store'])->name('daftarSave');
Route::post('/pendaftaran/acc', [App\Http\Controllers\RegistrationAdminController::class, 'acc'])->name('daftarAcc');
Route::post('/pendaftaran/reject/{regid}', [App\Http\Controllers\RegistrationAdminController::class, 'reject'])->name('daftarReject');
Route::get('/data', [App\Http\Controllers\RegistrationController::class, 'showData'])->name('daftarDetail');
Route::get('/print/card/{regid}', [App\Http\Controllers\RegistrationController::class, 'showCard'])->name('printCard');


Route::get('/konfirmasi', [App\Http\Controllers\RegistrationController::class, 'konfirmasi'])->name('viewKonfirmasi');
Route::get('/konfirmasi/search', [App\Http\Controllers\RegistrationController::class, 'searchKonfirmasi'])->name('searchKonfirmasi');


Route::get('/saran', [App\Http\Controllers\FeedbacksController::class, 'index'])->name('viewSaran');
Route::post('/saran/save', [App\Http\Controllers\FeedbacksController::class, 'store'])->name('saranSave');
Route::get('/saran/all', [App\Http\Controllers\FeedbacksController::class, 'indexAll'])->name('viewSaranAll');


Route::resource('registrations', RegistrationAdminController::class); 
Route::resource('feedbacks', FeedbacksController::class); 
//// ADMIN



