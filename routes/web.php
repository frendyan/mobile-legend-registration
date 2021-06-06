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
	return redirect()->route('dashboard');
});

Auth::routes();
Auth::routes(['/register' => false]);

///////////////////////////////////////////////////////////////////////////
//////////////////////////////// ADMIN ////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

