<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('checksession');

use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::post('home/signup', [HomeController::class, 'signup'])->name('home.signup');

use App\Http\Controllers\AuthController;

// Route untuk menampilkan halaman login
Route::get('/auth', [AuthController::class, 'index'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/auth/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\LaporanController;
Route::resource('laporan', LaporanController::class)->middleware('checksession');

//Route untuk halaman tentang
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang')->middleware('checksession');
