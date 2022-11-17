<?php

use App\Http\Controllers\BloodCampController;
use App\Http\Controllers\CampScheduleController;
use App\Http\Controllers\CampsiteController;
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



Route::resource('blood-camp', BloodCampController::class);

Route::resource('donor', DonorController::class);

Route::resource('camp-schedule', CampScheduleController::class);
