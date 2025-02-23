<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'registerSubmit'])->name('auth.register.submit');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('auth.login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->get('/profile', [AuthController::class, 'showUserInfo'])->name('auth.profile');

Route::middleware(['auth', 'checkRole:admin'])->get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
Route::middleware(['auth', 'checkRole:admin'])->get('/admin/users', [AdminController::class, 'getAllUsers'])->name('admin.users');
