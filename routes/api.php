<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DemoController;
//use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [UserController::class, 'index']);
Route::post('/store', [UserController::class, 'store']);
Route::get('/demo', [DemoController::class, 'index'])->name('demo');

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
});