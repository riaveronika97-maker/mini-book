<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Customer-facing pages are public. The admin and owner area uses the
| standard Laravel session authentication with role middleware.
|
*/

Route::view('/', 'welcome')->name('home');
Route::view('/jadwal', 'placeholders.jadwal')->name('schedule.index');
Route::view('/cek-booking', 'placeholders.cek-booking')->name('booking.lookup');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::view('/admin/dashboard', 'admin.dashboard')
    ->middleware('auth')
    ->name('admin.dashboard');
