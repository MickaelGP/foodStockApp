<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductApiResource;
use App\Models\ProductApi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductApiController extends Controller
{
    /**
     *Display a listing of all products
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return ProductApiResource::collection(ProductApi::all());
    }

    /**
     * Store a newly created product in storage
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        //Validate the incoming request data
        $data = $request->validate([
            'code' => ['required', 'string', 'max:60', 'unique:products,code'],
            'product_name' => ['required', 'string', 'max:150'],
            'categories' => ['required', 'string', 'max:60'],
            'brands' => ['required', 'string', 'max:60'],
            'image_url' => ['string', 'nullable', 'max:255'],
        ]);
        //Check if result of $data exist in database
        if (!ProductApi::where('code', $data['code'])->exists()) {
            //Add product in database
            $product = ProductApi::create($data);
            return response()->json(new ProductApiResource($product), 200);
        } else {
            //Return message Product already exists
            return response()->json([
                'message' => "Product already exists",
            ], 400);
        }
    }

    /**
     * Update product by Id
     * @param ProductApi $productApi
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request, ProductApi $productApi): \Illuminate\Http\JsonResponse
    {
        $data = $request->validate([
            'code' => ['required', 'string', 'max:60'],
            'product_name' => ['required', 'string', 'max:150'],
            'categories' => ['required', 'string', 'max:60'],
            'brands' => ['required', 'string', 'max:60'],
            'image_url' => ['string', 'nullable', 'max:255'],
        ]);
        if (!ProductApi::find($productApi)) {
            return response()->json([
                'message' => "Product not found",
            ], 400);
        } else {
            $productApi->update($data);
            return response()->json(new ProductApiResource($productApi), 200);
        }
    }

    /**
     * Delete product by Id
     *
     * @param ProductApi $productApi
     * @return JsonResponse
     */
    public function destroy(ProductApi $productApi): \Illuminate\Http\JsonResponse
    {
        $productApi->delete();

        return response()->json(null, 204);
    }
}
