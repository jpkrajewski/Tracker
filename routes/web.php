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

Route::resource('posts', App\Http\Controllers\PostController::class)->middleware('auth');
Route::resource('notes', App\Http\Controllers\NoteController::class)->middleware('auth');
Route::resource('goals', App\Http\Controllers\GoalController::class)->middleware('auth');
Route::patch('goals/{$goal}/{$status?}', [App\Http\Controllers\GoalController::class, 'update'])->middleware('auth');
Route::resource('profiles', App\Http\Controllers\ProfileController::class)->middleware('auth');
Route::resource('earnings', App\Http\Controllers\EarningController::class)->middleware('auth');
Route::resource('women', App\Http\Controllers\WomanController::class)->middleware('auth');
Route::resource('physiques', App\Http\Controllers\PhysiqueController::class)->middleware('auth');

Auth::routes();
