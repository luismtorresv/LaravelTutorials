<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductApiControllerV3 extends Controller
{
    public function index(): ResourceCollection
    {
        return Product::all()->toResourceCollection();
    }

    public function paginate(): ResourceCollection
    {
        return Product::paginate(5)->toResourceCollection();
    }
}
