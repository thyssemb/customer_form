<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return 'root route connection';
});

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
