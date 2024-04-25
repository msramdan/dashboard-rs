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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/', fn () => view('dashboard'));
    Route::get('/dashboard', fn () => view('dashboard'));

    Route::get('/profile', App\Http\Controllers\ProfileController::class)->name('profile');

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleAndPermissionController::class);
});

Route::middleware(['auth', 'permission:test view'])->get('/tests', function () {
    dd('This is just a test and an example for permission and sidebar menu. You can remove this line on web.php, config/permission.php and config/generator.php');
})->name('tests.index');

Route::resource('administrasis', App\Http\Controllers\AdministrasiController::class)->middleware('auth');
Route::resource('bkias', App\Http\Controllers\BkiaController::class)->middleware('auth');
Route::resource('ugds', App\Http\Controllers\UgdController::class)->middleware('auth');
Route::resource('poli-umums', App\Http\Controllers\PoliUmumController::class)->middleware('auth');
Route::resource('pendaftarans', App\Http\Controllers\PendaftaranController::class)->middleware('auth');
Route::resource('rekam-medis', App\Http\Controllers\RekamMediController::class)->middleware('auth');
Route::resource('laboratoriums', App\Http\Controllers\LaboratoriumController::class)->middleware('auth');
Route::resource('radiologis', App\Http\Controllers\RadiologiController::class)->middleware('auth');
Route::resource('rawat-inaps', App\Http\Controllers\RawatInapController::class)->middleware('auth');
