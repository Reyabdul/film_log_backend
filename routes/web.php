<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\PhotosController;

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

Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest')->name('login'); //returns user to login if they attempt to go to dashboard without signing in
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');

Route::get('/console/photos/list', [PhotosController::class, 'list'])->middleware('auth');
Route::get('/console/photos/delete/{photo:id}', [PhotosController::class, 'delete'])->where('photo', '[0-9]+')->middleware('auth');
Route::get('/console/photos/add', [PhotosController::class, 'addForm'])->middleware('auth');
Route::post('/console/photos/add', [PhotosController::class, 'add'])->middleware('auth');
Route::get('/console/photos/edit/{photo:id}', [PhotosController::class, 'editForm'])->where('photo', '[0-9]+')->middleware('auth');
Route::post('/console/photos/edit/{photo:id}', [PhotosController::class, 'edit'])->where('photo', '[0-9]+')->middleware('auth');