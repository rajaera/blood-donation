<?php

use App\Http\Controllers\CampController;
use App\Http\Controllers\CampScheduleController;
use App\Http\Controllers\DonorController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.root');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

/*
Route::get('/camp', [App\Http\Controllers\CampController::class, 'index'])->name('camp');

Route::get('/camp/create', [App\Http\Controllers\CampController::class, 'create'])->name('camp.create');

Route::post('/camp/store', [App\Http\Controllers\CampController::class, 'store'])->name('camp.store');

Route::get('/camp/show/{id}', [App\Http\Controllers\CampController::class, 'show'])->name('camp.show');

Route::get('/camp/edit/{id}', [App\Http\Controllers\CampController::class, 'edit'])->name('camp.edit');
*/
Route::resource('camp', CampController::class);


/*
Route::get('/donor', [App\Http\Controllers\DonorController::class, 'index'])->name('donor');

Route::get('/donor/create', [App\Http\Controllers\DonorController::class, 'create'])->name('donor.create');

Route::post('/donor/store', [App\Http\Controllers\DonorController::class, 'store'])->name('donor.store');

Route::get('/donor/show/{id}', [App\Http\Controllers\DonorController::class, 'show'])->name('donor.show');

Route::get('/donor/edit/{id}', [App\Http\Controllers\DonorController::class, 'edit'])->name('donor.edit');

Route::put('/donor/update/{id}', [App\Http\Controllers\DonorController::class, 'update'])->name('donor.update');

Route::get('/donor/export', [App\Http\Controllers\DonorController::class, 'export'])->name('donor.export');
*/
Route::resource('donor', DonorController::class);

/*
Route::get('/camp-schedule', [App\Http\Controllers\CampScheduleController::class, 'index'])->name('camp-schedule');

Route::get('/camp-schedule/show/{id}', [App\Http\Controllers\CampScheduleController::class, 'show'])->name('camp-schedule.show');

Route::get('/camp-schedule/ongoingcamp/{id}', [App\Http\Controllers\CampScheduleController::class, 'ongoingcamp'])->name('camp-schedule.ongoingcamp');

Route::get('/camp-schedule/create', [App\Http\Controllers\CampScheduleController::class, 'create'])->name('camp-schedule.create');

Route::post('/camp-schedule/store', [App\Http\Controllers\CampScheduleController::class, 'store'])->name('camp-schedule.store');
*/

Route::resource('camp-schedule', CampScheduleController::class);
