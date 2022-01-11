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

Route::get('/', function()
    {
        return View::make('index');
    });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
	Route::resource('posts', App\Http\Controllers\PostController::class);
	Route::resource('notes', App\Http\Controllers\NoteController::class);
	Route::resource('goals', App\Http\Controllers\GoalController::class);
	Route::resource('profiles', App\Http\Controllers\ProfileController::class);
	Route::resource('incomes', App\Http\Controllers\IncomeController::class);
	Route::resource('physiques', App\Http\Controllers\PhysiqueController::class);
});

Auth::routes();

