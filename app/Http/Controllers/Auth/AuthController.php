<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Création d'un compte utilisateur et redirection vers la page de connexion.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request): RedirectResponse
    {
        //Validation des données reçues
        $data = $request->validate([
            'email' => ['required', 'email', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'string', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
            'name' => ['required', 'string', 'max:50']
        ]);

        // Vérification de la validation des données
        if($data){

            //Si les données sont validées, créer un nouvel utilisateur dans la base de données
            User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'name' => $data['name'],
            ]);
        }

        // Redirection de l'utilisateur vers la page de connexion
        return redirect()->route('login');
    }

    /**
     * Connexion de l'utilisateur et redirection vers le tableau de bord.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        //Validation des données reçues
        $credentials = $request->validate([
            'email' => ['required', 'email', 'string', 'max:255'],
            'password' => ['required'],
        ]);

        // Vérification de l'existence de l'utilisateur dans la base de données
        if(Auth::attempt($credentials)){

            // Création d'une nouvelle session utilisateur
            $request->session()->regenerate();

            // Redirection de l'utilisateur connecté vers son tableau de bord
            return redirect()->intended(route('dashboard'));
        }

        // Si l'authentification échoue, retour à la page de connexion avec message d'erreur
        return back()->withErrors([
            'email'=>'l\'identifiant n\'est pas correct',
        ])->onlyInput('email');
    }

    /**
     * Déconnexion de l'utilisateur.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        //Déconnexion de l'utilisateur authentifié
        Auth::logout();

        // Rediriger l'utilisateur vers la page de connexion avec un message de succès
        return to_route('login')->with('success','Vous êtes bien déconecté');
    }
}
