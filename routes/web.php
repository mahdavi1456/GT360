<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\UserController;
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

Route::get('account/{accountId}/users', [UserController::class, 'showUsers'])->name('user.showUsers');
Route::get('account/{accountId}/users/{userId}/edit', [UserController::class, 'editUser'])->name('user.editUser');
Route::put('account/{accountId}/users/{userId}', [UserController::class, 'updateUser'])->name('users.updateUser');
Route::delete('account/{accountId}/users/{userId}', [UserController::class, 'destroyUser'])->name('account.users.destroy');
Route::get('users/create/{accountId}', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');








Route::post('/uploadFile', [ApiController::class, 'uploadFile']);
