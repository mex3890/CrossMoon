<?php

use App\Http\Controllers\AssignmentController;
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
Route::resource('assignment', AssignmentController::class)->middleware('auth');
Route::get('/assignments/{$filter}', function (string $filter) {
    return route('assignment.index', ['filter' => $filter]);
})->name('filtered')->middleware('auth');
