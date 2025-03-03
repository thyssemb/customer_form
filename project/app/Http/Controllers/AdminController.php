<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

        /**
         * @OA\Get(
         *     path="/admin/users",
         *     summary="Affiche la liste des utilisateurs",
         *     @OA\Response(response=200, description="Liste des utilisateurs récupérée")
         * )
         */
         public function showUsers(Request $request) {
        return $this->getAllUsers($request);
    }

        /**
         * @OA\Post(
         *     path="/profile",
         *     summary="Permet le drag and drop de la photo de profil, réservé aux admins",
         *     @OA\Response(response=200, description="Drag and drop impossible")
         *)
         */
public function dragAndDrop(Request $request, $userId)
{
    $user = User::findOrFail($userId);

    $validatedData = $request->validate([
        'picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
        try {
            $file = $request->file('picture');
            $filename = strtolower($validatedData['name'] . '.' . $validatedData['firstname'] . '.' . $file->getClientOriginalExtension());

            $image = Image::make($file)->resize(200, 200);
            Storage::disk('public')->put('profile_pictures/' . $filename, (string) $image->encode());

            $picturePath = 'profile_pictures/' . $filename;

            $user->picture = $picturePath;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Photo de profil mise à jour avec succès',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Une erreur s\'est produite lors du téléchargement de l\'image: ' . $e->getMessage(),
            ], 500);
        }
    } else {
        return response()->json([
            'error' => 'Aucun fichier téléchargé ou le fichier est invalide',
        ], 400);
    }
}


    /**
     * @OA\Delete(
     *     path="/admin/user/{id}",
     *     summary="Supprime un utilisateur",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'utilisateur",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Utilisateur supprimé")
     * )
     */
    public function deleteUser() {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            } else {
                Session::flash('error', 'Utilisateur introuvable.');
                }

            return redirect()->route('admin.users');
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
