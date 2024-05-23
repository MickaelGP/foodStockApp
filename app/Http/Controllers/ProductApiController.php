<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductApiResource;
use App\Models\ProductApi;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function showProduct()
    {


        return ProductApiResource::collection(ProductApi::limit(10)->get());
    }
}
