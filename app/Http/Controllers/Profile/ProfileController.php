<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\User;
use App\Rules\CurrentPasswordRule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Affiche le tableau de bord de l'utilisateur.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Affiche la vue du tableau de bord de l'utilisateur
        return view('auth.dashboard');
    }

    /**
     * Affiche le formulaire d'édition du profil utilisateur.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function editProfile(User $user): View
    {
        Gate::authorize('update', $user);
        // Affiche la vue de modification du profil avec les données de l'utilisateur
        return view('auth.profile.edit', compact('user'));
    }

    /**
     * Met à jour les informations du profil utilisateur.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(User $user): RedirectResponse
    {
        Gate::authorize('update', $user);

        // Validation des données reçues
        $data = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        ]);

        // Mise à jour des informations de l'utilisateur
        $user->update($data);

        // Redirection avec message de succès
        return redirect()->back()->with('success', 'Profile Updated');
    }

    /**
     * Met à jour le mot de passe de l'utilisateur.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(User $user): RedirectResponse
    {
        Gate::authorize('update', $user);

        // Validation des données de mot de passe
        $data = request()->validate([
            'current_password' => ['required',new CurrentPasswordRule],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);
        // Mise à jour du mot de passe de l'utilisateur
        $user->password = Hash::make($data['new_password']);
        $user->save();

        // Redirection avec un message de succés
        return redirect()->back()->with('success', 'Password Updated.');
    }

    /**
     * Supprime le compte utilisateur.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validation du mot de passe avant la suppression
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        // Récupération de l'utilisateur authentifié
        $user = $request->user();
        Gate::authorize('delete', $user);

        // Déconnexion de l'utilisateur
        Auth::logout();

        // Suppression de l'utilisateur
        $user->delete();

        // Invalidation et régénération de la session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirection vers la page d'accueil avec un message de succés
        return redirect()->route('welcome')->with('success', 'Your account has been deleted.');
    }

    /**
     * Renvoie les statistiques des produits dans le stock de l'utilisateur.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function statistic(): JsonResponse
    {
        // Initialisation de la requête de base pour le stock
        $productStock = Stock::query();

        // Récupération des produits du stock de l'utilisateur connecté
        $products = $productStock->where('user_id', Auth::id())->get();

        // Retourne les produits sous forme de réponse JSON
         return response()->json($products);
    }
}
