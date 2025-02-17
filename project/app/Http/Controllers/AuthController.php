<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(request $Request): RedirectResponse {
    return view('auth.register');
    }


    public function profile() {
    return view('auth.profile');
    }

}
