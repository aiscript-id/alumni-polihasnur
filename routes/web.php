<?php

use App\Http\Controllers\Admin\ProdiController as AdminProdiController;
use App\Http\Controllers\Admin\TracerController as AdminTracerController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\JobController as AdminJobController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;
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
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin');
    Route::put('publish', [AdminController::class, 'publish'])->name('admin.publish');

    // user section
    Route::resource('users', AdminUserController::class);
    Route::get('users/{user}/verify', [AdminUserController::class, 'verify'])->name('admin.user.verify');

    // prodi section
    Route::resource('prodi', AdminProdiController::class);

    // tracer Section
    Route::resource('tracer', AdminTracerController::class);
    Route::get('tracer/detail/{tracer_user}', [AdminTracerController::class, 'detail'])->name('admin.tracer.detail');

    // job section
    // job statistic
    Route::get('job/statistic', [AdminJobController::class, 'statistic'])->name('job.statistic');
    Route::get('job/map', [AdminJobController::class, 'map'])->name('jobs.map');
    Route::resource('job', AdminJobController::class);

    Route::get('tracer/section-a/{id}', [AdminTracerController::class, 'sectionA'])->name('admin.tracer.section-a');
    Route::get('tracer/section-b/{id}', [AdminTracerController::class, 'sectionB'])->name('admin.tracer.section-b');
    Route::get('tracer/section-c/{id}', [AdminTracerController::class, 'sectionC'])->name('admin.tracer.section-c');
    Route::get('tracer/section-d/{id}', [AdminTracerController::class, 'sectionD'])->name('admin.tracer.section-d');
    Route::get('tracer/section-e/{id}', [AdminTracerController::class, 'sectionE'])->name('admin.tracer.section-e');
    Route::get('tracer/section-f/{id}', [AdminTracerController::class, 'sectionF'])->name('admin.tracer.section-f');
});

// for role user
Route::middleware('role:user')->prefix('user')->group(function() {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user');
    // profile
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('/profile', [UserController::class, 'update'])->name('user.profile.update');
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('user.password.update');

    // tracer
    Route::get('tracer', [TracerController::class, 'index'])->name('user.tracer');
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

    Route::get('job', [JobController::class, 'index'])->name('user.job');
    Route::get('job/create', [JobController::class, 'create'])->name('user.job.create');
    Route::post('job/store', [JobController::class, 'store'])->name('user.job.store');
    Route::get('job/{id}', [JobController::class, 'show'])->name('user.job.show');
    Route::get('job/{id}/edit', [JobController::class, 'edit'])->name('user.job.edit');
    Route::put('job/{id}/update', [JobController::class, 'update'])->name('user.job.update');
    Route::delete('job/{id}/destroy', [JobController::class, 'destroy'])->name('user.job.destroy');

    Route::get('alumni', [UserController::class, 'alumni'])->name('user.alumni');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
