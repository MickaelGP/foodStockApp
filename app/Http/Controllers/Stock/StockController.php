<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\ProductApi;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use OpenFoodFacts\Laravel\Facades\OpenFoodFacts;


class StockController extends Controller
{
    /**
     * Affiche la page d'accueil du stock avec les catégories disponibles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupération de toutes les catégories
        $categories = Categorie::all();

        // Récupération de l'utilisateur authentifié
        $user = Auth::user();

        // Affichage de la vue stock.index avec les catégories et l'utilisateur
        return view('stock.index', compact('user', 'categories'));
    }

    /**
     * Enregistre un nouveau produit dans le stock de l'utilisateur.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        // Validation des données reçues
        $data = $request->validate([
            'quantite' => ['required', 'numeric'],
            'dlc' => ['required', 'date_format:Y-m-d'],
            'barcode' => ['required', 'string'],
            'categorie_id' => ['required', 'numeric'],
        ]);

        // Récupération des informations du produit à partir de l'API OpenFoodFacts
        $product = OpenFoodFacts::barcode($data['barcode']);

        if ($product) {
            try {
                // Vérifie si le produit existe déjà sinon le crée
                if (!ProductApi::where('code', $data['barcode'])->exists()) {
                    ProductApi::create($product);
                }
                // Création du nouvel enregistrement de stock
                Stock::create([
                    'quantite' => $data['quantite'],
                    'dlc' => $data['dlc'],
                    'categorie_id' => $data['categorie_id'],
                    'user_id' => Auth::id(),
                    'product_name_fr' => $product['product_name_fr'],
                    'image_url' => $product['image_thumb_url'],
                    'brands' => $product['brands'],
                ]);
            } catch (\Exception $exception) {
                // En cas d'erreur, log l'exception et retourne un message d'erreur
                Log::error($exception->getMessage());
                return back()->with('error', 'Nous avons rencontré une erreur, veuillez réessayer plus tard');
            }
        } else {
            // Si le produit n'est pas trouvé dans l'API, retourne un message d'erreur
            return back()->with('error', 'Produit non trouvé');
        }
        // Retour avec un message de succcès si le produit a été ajouté
        return back()->with('success', 'Produit ajouté avec succès');
    }

    /**
     * Recherche des produits dans le stock de l'utilisateur.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        // Initialisation de la requête de base pour le stock
        $productStock = Stock::query();

        // Récupération et nettoyage des données reçues
        $query = htmlentities($request->input('query'));

        // Recherche des produits correspondant au terme de recherche pour l'utilisateur connecté
        $products = $productStock->where('user_id', Auth::id())->where('product_name_fr', 'LIKE', '%' . $query . '%')->get();

        // Affichage de la vue stock.search avec les produits trouvés
        return view('stock.search', compact('products'));
    }

    /**
     * Affiche le formulaire de modification pour un produit de stock
     *
     * @param Stock $stock
     * @return \Illuminate\View\View
     */
    public function edit(Stock $stock)
    {
        // Affichage de la vue stock.edit avec le produit à modifier
        return view('stock.edit', compact('stock'));
    }

    /**
     * Met à jour les informations d'un produit dans le stock.
     *
     * @param Request $request
     * @param Stock $stock
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Stock $stock)
    {
        // Validation des données reçues
        $data = $request->validate([
            'quantite' => ['required', 'numeric'],
            'product_name_fr' => ['required', 'string'],
        ]);

        try {
            // Mise à jour des informations du produit
            $stock->update($data);
        } catch (\Exception $exception) {
            // En cas d'erreur, log l'exception et retour avec un message d'erreur
            Log::error($exception->getMessage());
            return back()->with('error', 'We have encountered an error try again later');
        }
        // Redirection vers la page d'accueil du stock avec un message de succès
        return redirect()->route('stock.index')->with('success', 'Product updated successfully');
    }

    /**
     * Supprime un produit du stock.
     *
     * @param Stock $stock
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Stock $stock)
    {
        // Suppression du produit du stock
        $stock->delete();
        // Retour avec un message de succès aaprès la suppression
        return back()->with('success', 'Product deleted successfully');
    }
}
