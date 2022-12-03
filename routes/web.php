<?php

use App\Http\Controllers\BloodCampController;
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

Route::delete('/user/{user_id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');


Route::resource('blood-camp', BloodCampController::class)->except(['show']);

//normal route define must come before route::resource, otherwise route may conflict
Route::get('/donor/export',  [DonorController::class, 'export'])->name('donor.export');
Route::resource('donor', DonorController::class);

//normal route define must come before route::resource, otherwise route may conflict
Route::get('/camp-schedule/ongoingcamp/{schedule_id}',  [CampScheduleController::class, 'ongoingcamp'])->name('camp-schedule.ongoingcamp');
Route::put('/camp-schedule/statusToggle/{schedule_id}',  [CampScheduleController::class, 'statusToggle'])->name('camp-schedule.statusToggle');
Route::resource('camp-schedule', CampScheduleController::class);

