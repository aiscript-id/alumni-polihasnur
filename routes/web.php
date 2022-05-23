<?php

use App\Http\Controllers\Admin\ProdiController as AdminProdiController;
use App\Http\Controllers\Admin\TracerController as AdminTracerController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

// after authentication, redirect to home page
Route::middleware('role:superadmin|admin')->prefix('admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin');

    // user section
    Route::resource('users', AdminUserController::class);
    Route::get('users/{user}/verify', [AdminUserController::class, 'verify'])->name('admin.user.verify');

    // prodi section
    Route::resource('prodi', AdminProdiController::class);

    // tracer Section
    Route::resource('tracer', AdminTracerController::class);
});

// for role user
Route::middleware('role:user')->prefix('user')->group(function() {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
