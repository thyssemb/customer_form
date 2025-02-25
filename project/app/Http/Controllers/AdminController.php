<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function showUsers(Request $request) {
        return $this->getAllUsers($request);
    }

    public function getAllUsers(Request $request) {
        $query = User::query();

        if ($request->has('id') && $request->input('id') != '') {
            $query->where('id', $request->input('id'));
        }

        if ($request->has('name') && $request->input('name') != '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('firstname') && $request->input('firstname') != '') {
            $query->where('firstname', 'like', '%' . $request->input('firstname') . '%');
        }

        if ($request->has('email') && $request->input('email') != '') {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        if ($request->has('role') && $request->input('role') != '') {
            $query->where('role', $request->input('role'));
        }

        if ($request->has('created_at') && $request->input('created_at') != '') {
            $query->whereDate('created_at', $request->input('created_at'));
        }

        if ($request->has('sort_by')) {
            $sortColumn = $request->input('sort_by');
            $query->orderBy($sortColumn, 'asc');
        }

        $users = $query->paginate(10);

        return view('admin.users', compact('users'));
    }

    public function sortUserById(Request $request) {
        return $this->getAllUsers($request->merge(['sort_by' => 'id']));
    }

    public function sortUserByName(Request $request) {
        return $this->getAllUsers($request->merge(['sort_by' => 'name']));
    }

    public function sortUserByFirstName(Request $request) {
        return $this->getAllUsers($request->merge(['sort_by' => 'firstname']));
    }

    public function sortUserByEmail(Request $request) {
        return $this->getAllUsers($request->merge(['sort_by' => 'email']));
    }

    public function sortUserByRole(Request $request) {
        return $this->getAllUsers($request->merge(['sort_by' => 'role']));
    }

    public function sortUserByCreatedAt(Request $request) {
        return $this->getAllUsers($request->merge(['sort_by' => 'created_at']));
    }
}
