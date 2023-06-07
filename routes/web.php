<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObsPogController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

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

Route::get('/', [ObsPogController::class, 'index'])->name('obs_pog.index');

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/services', [ServicesController::class, 'index'])->name('services.index');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/users', [UserController::class, 'showUsersWithRoleTwo'])->name('users.index')->middleware('admin');

Route::get('/users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class,'update'])->name('users.update');

Route::get('/services/{id}/edit', [ServicesController::class,'edit'])->name('services.edit');
Route::put('/services/{id}', [ServicesController::class,'update'])->name('services.update');
