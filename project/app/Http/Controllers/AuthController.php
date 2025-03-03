<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * @OA\Info(title="Customer Form Api Documentation", version="1.0.0")
 */
class AuthController extends Controller
{
     /**
         * @OA\Get(
         *     path="/register",
         *     summary="Affiche le formulaire d'inscription",
         *     @OA\Response(response=200, description="Formulaire d'inscription affiché")
         * )
         */
    public function register() {
        return view('auth.register');
    }

    /**
     * @OA\Get(
     *     path="/login",
     *     summary="Affiche le formulaire de connexion",
     *     @OA\Response(response=200, description="Formulaire de connexion affiché")
     * )
     */
    public function login() {
        return view('auth.login');
    }

    /**
     * @OA\Get(
     *     path="/logout",
     *     summary="Déconnecte l'utilisateur",
     *     @OA\Response(response=200, description="Impossible de déconnecter l'utilisateur")
     * )
     */
    public function logout() {
        Auth()->logout();
        return redirect('/login');
    }

    /**
     * @OA\Post(
     *     path="/register",
     *     summary="Soumet les données d'inscription",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         required=true,
     *         description="Nom de l'utilisateur",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="firstname",
     *         in="query",
     *         required=true,
     *         description="Prénom de l'utilisateur",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="birthday",
     *         in="query",
     *         required=true,
     *         description="Date de naissance de l'utilisateur",
     *         @OA\Schema(type="string", format="date")
     *     ),
     *     @OA\Parameter(
     *         name="picture",
     *         in="query",
     *         required=true,
     *         description="Photo de profil de l'utilisateur",
     *         @OA\Schema(type="file")
     *     ),
     *     @OA\Parameter(
     *         name="number",
     *         in="query",
     *         required=true,
     *         description="Numéro de téléphone de l'utilisateur",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         required=true,
     *         description="Email de l'utilisateur",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         required=true,
     *         description="Mot de passe de l'utilisateur",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="mailing_address",
     *         in="query",
     *         required=true,
     *         description="Adresse de l'utilisateur",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Utilisateur inscrit avec succès"
     *     )
     * )
     */
    public function registerSubmit(Request $request)
    {

             $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'birthday' => 'required|date',
            'picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'number' => 'required|digits:10|unique:internautes',
            'email' => 'required|email|max:255|unique:internautes',
            'password' => 'required|string',
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
            'message' => 'Inscription réussie',
        ]);
    }

     /**
      * @OA\Post(
      *     path="/login",
      *     summary="Soumet les données de connexion",
      *     @OA\Parameter(
      *         name="email",
      *         in="query",
      *         required=true,
      *         description="Email de l'utilisateur",
      *         @OA\Schema(type="string")
      *     ),
      *     @OA\Parameter(
      *         name="password",
      *         in="query",
      *         required=true,
      *         description="Mot de passe de l'utilisateur",
      *         @OA\Schema(type="string")
      *     ),
      *     @OA\Response(
      *         response=201,
      *         description="Utilisateur connecté avec succès"
      *     )
      * )
      */
    public function loginSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string',
        ]);
        if (Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ], $request->remember)) {
              return response()->json([
                        'success' => true,
                        'message' => 'Connexion réussie',
                    ]);
        } else {
            return back()->withErrors([
                'email' => 'L\'email est incorrect',
                'password' => 'Le mot de passe est incorrect',
            ]);
        }
    }


    /**
     * @OA\Get(
     *     path="/profile",
     *     summary="Affiche le profil utilisateur",
     *     @OA\Response(response=200, description="Impossible d'afficher le profil")
     * )
     */
    public function profile() {
        return view('auth.profile');
    }

    public function showUserInfo() {
        $user = auth()->user();

        return view('auth.profile', compact('user'));
    }

}
