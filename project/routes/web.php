<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return 'root route connection';
});

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/profile', [AuthController::class, 'profile'])->name('auth.profile');

Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.users');

