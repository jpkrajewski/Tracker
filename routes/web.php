<?php

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

Route::get('/', [App\Http\Controllers\UserController::class,'index'])->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
	Route::resource('posts', App\Http\Controllers\PostController::class);
	Route::resource('notes', App\Http\Controllers\NoteController::class);
	Route::resource('goals', App\Http\Controllers\GoalController::class);
	Route::resource('profiles', App\Http\Controllers\ProfileController::class);
	Route::resource('earnings', App\Http\Controllers\EarningController::class);
	Route::resource('women', App\Http\Controllers\WomanController::class);
	Route::resource('physiques', App\Http\Controllers\PhysiqueController::class);
});

Auth::routes();

