<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\GroupController;

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

// Auth::routes();

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register/process', [RegisterController::class, 'registerProcess'])->name('register.process');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('/admin')->middleware('auth')->group(function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('/categories', CategoryController::class);
    Route::resource('/groups', GroupController::class);
    Route::resource('/customers', CustomerController::class);
});
