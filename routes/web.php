<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\AuthController;
use Database\Seeders\DatabaseSeeder;

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

Route::resource('/', UserController::class);
Route::get('/photos/add', [PhotoController::class, 'create'])->name('add.photo');
Route::post('/photos/store', [PhotoController::class, 'store'])->name('store.photo');
Route::get('/seeder', [DatabaseSeeder::class, 'run'])->name('seeder');