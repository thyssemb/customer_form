<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');


Route::post('/register', [AuthController::class, 'registerSubmit'])->name('auth.register.submit');

Route::get('/profile', [AuthController::class, 'profile'])->name('auth.profile');

Route::middleware('auth')->get('/profile', [AuthController::class, 'showUserInfo'])->name('auth.profile');

Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
