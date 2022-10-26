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

Route::get('/donor/create', [App\Http\Controllers\DonorController::class, 'create'])->name('donor.create');

Route::post('/donor/create', [App\Http\Controllers\DonorController::class, 'create'])->name('donor.create');

Route::post('/donor/store', [App\Http\Controllers\DonorController::class, 'store'])->name('donor.store');
