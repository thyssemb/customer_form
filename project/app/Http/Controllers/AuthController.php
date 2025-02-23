<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function login() {
        return view('auth.login');
    }

    public function registerSubmit(Request $request)
    {

             $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'birthday' => 'required|date',
            'picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'number' => 'required|digits:10|unique:internautes',
            'email' => 'required|email|max:255|unique:internautes',
            'password' => 'required|string|min:8',
            'mailing_address' => 'required|string|max:255',
        ]);

        $birthday = $validatedData['birthday'];

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = strtolower($validatedData['name'] . '.' . $validatedData['firstname'] . '.' . $file->getClientOriginalExtension());

            $image = Image::make($file)->resize(200, 200);
            Storage::disk('public')->put('profile_pictures/' . $filename, (string) $image->encode());

            $picturePath = 'profile_pictures/' . $filename;
        } else {
            $picturePath = null;
        }

        $user = User::create([
            'name' => $validatedData['name'],
            'firstname' => $validatedData['firstname'],
            'birthday' => $birthday,
            'picture' => $picturePath,
            'number' => $validatedData['number'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'mailing_address' => $validatedData['mailing_address'],
            'role' => 'user',
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'message' => 'Register successfully',
        ]);
    }

    public function loginSubmit() {

    }


    public function profile() {
        return view('auth.profile');
    }

    public function showUserInfo() {
        $user = auth()->user();

        return view('auth.profile', compact('user'));
    }

}
