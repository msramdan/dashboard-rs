<?php

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
Route::controller(App\Http\Controllers\DashboardController::class)->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::controller(App\Http\Controllers\LaporanController::class)->group(function () {
    Route::get('/laporan', 'index')->name('laporan');
});


Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/profile', App\Http\Controllers\ProfileController::class)->name('profile');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleAndPermissionController::class);
});
