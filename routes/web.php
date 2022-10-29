<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

//Route::resource('/donor',DonorController::class)->only(['index' => 'donor','create' => 'donor.create', 'store' => 'donor.store']);

Route::get('/donor', [App\Http\Controllers\DonorController::class, 'index'])->name('donor');

Route::get('/donor/camp/{id}', [App\Http\Controllers\DonorController::class, 'camp'])->name('donor.camp');

Route::get('/donor/create', [App\Http\Controllers\DonorController::class, 'create'])->name('donor.create');

Route::post('/donor/create', [App\Http\Controllers\DonorController::class, 'create'])->name('donor.create');

Route::post('/donor/store', [App\Http\Controllers\DonorController::class, 'store'])->name('donor.store');

Route::get('/donor/show/{id}', [App\Http\Controllers\DonorController::class, 'show'])->name('donor.show');

Route::get('/donor/edit/{id}', [App\Http\Controllers\DonorController::class, 'edit'])->name('donor.edit');

Route::get('/donor/export', [App\Http\Controllers\DonorController::class, 'export'])->name('donor.export');


Route::get('/camp-schedule', [App\Http\Controllers\CampScheduleController::class, 'index'])->name('camp-schedule');

Route::get('/camp-schedule/show/{id}', [App\Http\Controllers\CampScheduleController::class, 'show'])->name('camp-schedule.show');

Route::get('/camp-schedule/ongoingcamp/{id}', [App\Http\Controllers\CampScheduleController::class, 'ongoingcamp'])->name('camp-schedule.ongoingcamp');

Route::get('/camp-schedule/create', [App\Http\Controllers\CampScheduleController::class, 'create'])->name('camp-schedule.create');

Route::post('/camp-schedule/store', [App\Http\Controllers\CampScheduleController::class, 'store'])->name('camp-schedule.store');
