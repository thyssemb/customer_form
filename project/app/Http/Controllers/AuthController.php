<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register() {
    return view('auth.register');
    }

    public function registerSubmit(request $Request): RedirectResponse {
        return redirect()->route('auth.profile')->with('success', 'Register successful');
    }

    public function profile() {
    return view('auth.profile');
    }

}
