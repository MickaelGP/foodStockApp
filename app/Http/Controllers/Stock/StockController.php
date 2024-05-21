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
    public function index()
    {
        $categories = Categorie::all();
        $user = Auth::user();
        return view('stock.index', compact('user', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'quantite' => ['required', 'numeric'],
            'dlc' => ['required', 'date_format:Y-m-d'],
            'barcode' => ['required', 'string'],
            'categorie_id' => ['required', 'numeric'],
        ]);

        $product = OpenFoodFacts::barcode($data['barcode']);

        if ($product) {
            try {
                if (!ProductApi::where('code', $data['barcode'])->exists()) {
                    ProductApi::create($product);
                }
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
                Log::error($exception->getMessage());
                return back()->with('error', 'We have encountered an error try again later');
            }
        } else {
            return back()->with('error', 'Product not found');
        }

        return back()->with('success', 'Product added successfully');
    }

    public function search(Request $request)
    {
        $productStock = Stock::query();
        $query = $request->input('query');

        $products = $productStock->where('user_id', Auth::id())->where('product_name_fr', 'LIKE', '%' . $query . '%')->get();

        return view('stock.search', compact('products'));
    }

    public function edit(Stock $stock)
    {
        return view('stock.edit', compact('stock'));
    }

    public function update(Request $request, Stock $stock)
    {
        $data = $request->validate([
            'quantite' => ['required', 'numeric'],
            'product_name_fr' => ['required', 'string'],
        ]);

        try {
            $stock->update($data);

        } catch (\Exception $exception) {

            Log::error($exception->getMessage());
            return back()->with('error', 'We have encountered an error try again later');
        }

        return redirect()->route('stock.index')->with('success', 'Product updated successfully');
    }
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return back()->with('success', 'Product deleted successfully');
    }
}
