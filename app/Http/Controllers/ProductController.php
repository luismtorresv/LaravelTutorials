<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Internet Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $product = @Product::findOrFail($id);

        if (! $product) {
            return redirect()->route('home.index');
        }

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

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => ['required', 'gt:0', 'integer'],
        ]);

        return redirect('/products/create/success');
    }

    public function createSuccess(): View
    {
        $viewData = [];
        $viewData['title'] = 'Product created';

        return view('product.createSuccess')->with('viewData', $viewData);
    }
}
