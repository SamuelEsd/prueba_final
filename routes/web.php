<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profle.index');


Route::apiResource('/discs', DiscController::class);

Route::get('/searchdiscs', [App\Http\Controllers\DiscController::class, 'search']);

