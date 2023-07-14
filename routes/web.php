<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\ListingsController@index');

Auth::routes();
Route::resource('listings', 'App\Http\Controllers\ListingsController');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
