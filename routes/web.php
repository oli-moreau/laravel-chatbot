<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
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
})->name('home');

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/account', [UserController::class, 'account'])->middleware(['auth'])->name('account');
Route::match(['get', 'post'], '/account/modify', [UserController::class, 'modify'])->middleware(['auth'])->name('user.modify');

Route::match(['get', 'post'], '/dashboard/message', [MessageController::class, 'add'])->middleware(['auth'])->name('message.add');
Route::match(['get', 'delete'], '/dashboard/clear', [MessageController::class, 'clear'])->middleware(['auth'])->name('message.clear');

require __DIR__.'/auth.php';
