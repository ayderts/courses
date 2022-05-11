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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('order_row/{position}/{table}/{sort}/{direction}', 'App\Http\Controllers\Voyager\VoyagerBreadController@orderRow')
        ->name('order_row');
});

Route::get('auth/forgot/reset', [App\Http\Controllers\HomeController::class, 'index'])->name('reset.password.link');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'reset'])->name('home.reset');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
