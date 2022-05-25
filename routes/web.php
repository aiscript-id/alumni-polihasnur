<?php

use App\Http\Controllers\Admin\ProdiController as AdminProdiController;
use App\Http\Controllers\Admin\TracerController as AdminTracerController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TracerController;
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

    // tracer
    Route::get('tracer', [TracerController::class, 'tracer'])->name('user.tracer');
    Route::get('tracer/{slug}', [TracerController::class, 'tracer'])->name('user.tracer.show');
    Route::get('tracer/{slug}/section-a', [TracerController::class, 'section_a'])->name('user.tracer.section-a');
    Route::put('tracer/{id}/section-a/update', [TracerController::class, 'section_a'])->name('user.tracer.section-a.update');

    Route::get('tracer/{slug}/section-b', [TracerController::class, 'section_b'])->name('user.tracer.section-b');
    Route::put('tracer/{id}/section-b/update', [TracerController::class, 'section_b'])->name('user.tracer.section-b.update');

    Route::get('tracer/{slug}/section-c', [TracerController::class, 'section_c'])->name('user.tracer.section-c');
    Route::put('tracer/{id}/section-c/update', [TracerController::class, 'section_c'])->name('user.tracer.section-c.update');

    Route::get('tracer/{slug}/section-d', [TracerController::class, 'section_d'])->name('user.tracer.section-d');
    Route::put('tracer/{id}/section-d/update', [TracerController::class, 'section_d'])->name('user.tracer.section-d.update');

    Route::get('tracer/{slug}/section-e', [TracerController::class, 'section_e'])->name('user.tracer.section-e');
    Route::put('tracer/{id}/section-e/update', [TracerController::class, 'section_e'])->name('user.tracer.section-e.update');

    Route::get('tracer/{slug}/section-f', [TracerController::class, 'section_f'])->name('user.tracer.section-f');
    Route::put('tracer/{id}/section-f/update', [TracerController::class, 'section_f'])->name('user.tracer.section-f.update');


});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
