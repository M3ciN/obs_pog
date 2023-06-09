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

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
    Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
    Route::get('/messages', [ContactController::class, 'showMessages'])->name('messages.index');
    Route::get('/reply-form/{id}', [ContactController::class, 'replyForm'])->name('reply.form');
    Route::post('/send-reply-email', [ContactController::class, 'sendReplyEmail'])->name('send.reply.email');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/users', [UserController::class, 'showUsersWithRoleTwo'])->name('users.index')->middleware('admin');
    Route::get('/users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class,'update'])->name('users.update');
    Route::get('/users/create', [UserController::class,'create'])->name('users.create');
    Route::post('/users', [UserController::class,'store'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class,'destroy'])->name('users.destroy');

});

Route::controller(AuthController::class)->group(function () {
    Route::get('/services/{id}/edit', [ServicesController::class,'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServicesController::class,'update'])->name('services.update');
    Route::delete('/services/{id}', [ServicesController::class,'destroy'])->name('services.destroy');
    Route::post('/services', [ServicesController::class,'store'])->name('services.store');
    Route::get('/services/create', [ServicesController::class,'create'])->name('services.create');
});
