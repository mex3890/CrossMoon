<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/category', [App\Http\Controllers\HomeController::class, 'categoryIndex'])->name('home.category');

Route::resource('assignment', AssignmentController::class)->middleware('auth');
Route::resource('post', PostController::class);
Route::resource('user', UserController::class);

Route::prefix('admin')->group(function (){
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'adminDashboard'])
        ->name('dashboard');
});
