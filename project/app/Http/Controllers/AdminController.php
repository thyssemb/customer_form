<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function showUsers() {
        return view('admin.users');
    }

    public function getAllUsers() {
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
    }


    public function sortUsersById() {
        return $this->getAllUsers($request->merge(['sort_by' => 'id']));
    }

    public function sortUsersByName() {
        return $this->getAllUsers($request->merge(['sort_by' => 'name']));
    }

    public function sortUsersByFirstName() {
         return $this->getAllUsers($request->merge(['sort_by' => 'firstname']));
    }

    public function sortUsersByEmail() {
         return $this->getAllUsers($request->merge(['sort_by' => 'email']));
    }

    public function sortUserByRole() {
          return $this->getAllUsers($request->merge(['sort_by' => 'role']));
    }

    public function sortUserByCreatedAt() {
          return $this->getAllUsers($request->merge(['sort_by' => 'created_at']));
    }
}
