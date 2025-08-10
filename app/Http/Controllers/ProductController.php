<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
        ['id' => '1', 'name' => 'TV', 'description' => 'Worst TV'],
        ['id' => '2', 'name' => 'iPhone', 'description' => 'Worst iPhone'],
        ['id' => '3', 'name' => 'Chromecast', 'description' => 'Worst Chromecast'],
        ['id' => '4', 'name' => 'Glasses', 'description' => 'Worst Glasses'],
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Internet Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = ProductController::$products;

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $product = ProductController::$products[$id - 1];
        $viewData['title'] = $product['name'].' - Internet Store';
        $viewData['subtitle'] = $product['name'].' - Product information';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; // to be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        dd($request->all());
        // here will be the code to call the model and save it to the database
    }
}
