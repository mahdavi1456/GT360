<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransportController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
Route::resource('transport', TransportController::class);
Route::resource('account', AccountController::class);


Route::post('/uploadFile', [ApiController::class, 'uploadFile']);