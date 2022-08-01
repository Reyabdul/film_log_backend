<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\UsersController;



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
Route::get('/console/photos/add', [PhotosController::class, 'addForm'])->middleware('auth');
Route::post('/console/photos/add', [PhotosController::class, 'add'])->middleware('auth');
Route::get('/console/photos/edit/{photo:id}', [PhotosController::class, 'editForm'])->where('photo', '[0-9]+')->middleware('auth');
Route::post('/console/photos/edit/{photo:id}', [PhotosController::class, 'edit'])->where('photo', '[0-9]+')->middleware('auth');
Route::get('/console/photos/delete/{photo:id}', [PhotosController::class, 'delete'])->where('photo', '[0-9]+')->middleware('auth');
Route::get('/console/photos/image/{photo:id}', [PhotosController::class, 'imageForm'])->where('photo', '[0-9]+')->middleware('auth');
Route::post('/console/photos/image/{photo:id}', [PhotosController::class, 'image'])->where('photo', '[0-9]+')->middleware('auth');

Route::get('/console/collections/list', [CollectionsController::class, 'list'])->middleware('auth');
Route::get('/console/collections/add', [CollectionsController::class, 'addForm'])->middleware('auth');
Route::post('/console/collections/add', [CollectionsController::class, 'add'])->middleware('auth');
Route::get('/console/collections/edit/{collection:id}', [CollectionsController::class, 'editForm'])->where('collection', '[0-9]+')->middleware('auth');
Route::post('/console/collections/edit/{collection:id}', [CollectionsController::class, 'edit'])->where('collection', '[0-9]+')->middleware('auth');
Route::get('/console/collections/delete/{collection:id}', [CollectionsController::class, 'delete'])->where('collection', '[0-9]+')->middleware('auth');
Route::get('/console/collections/image/{collection:id}', [CollectionsController::class, 'imageForm'])->where('collection', '[0-9]+')->middleware('auth');
Route::post('/console/collections/image/{collection:id}', [CollectionsController::class, 'image'])->where('collection', '[0-9]+')->middleware('auth');

Route::get('/console/users/list', [UsersController::class, 'list'])->middleware('auth');
Route::get('/console/users/add', [UsersController::class, 'addForm'])->middleware('auth');
Route::post('/console/users/add', [UsersController::class, 'add'])->middleware('auth');
Route::get('/console/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/console/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/console/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');