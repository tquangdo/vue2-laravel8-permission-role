<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
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
    $user = request()->user()->roles[0]; //lấy kèm với role của user (dùng cho vue router sau này)
    return view('welcome', ['user' => $user]);
})->middleware('auth');

Route::resource('tasks', TaskController::class);

Route::get('/users', [UserController::class, 'index']);
Route::get('/userpage', function () {
    $user = request()->user();
    dd($user->can('create-tasks'));
})->middleware('auth');

// hien goc tren phai "login, register"
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
