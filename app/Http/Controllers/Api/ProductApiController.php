<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductApiController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all();

        return response()->json($products, 200);
    }

    public function show(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        return response()->json($product, 200);
    }

    public function create(Request $request): JsonResponse
    {
        try {
            $validated = Product::validate($request);
        } catch (ValidationException) {
            return response()->json(['status' => 'fail'], 418);
        }

        Product::create($validated);

        return response()->json(['status' => 'success'], 200);
    }
}
