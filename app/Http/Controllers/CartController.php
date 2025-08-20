<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $products = [];
        $products[121] = ['name' => 'Samsung TV', 'price' => '1000000'];
        $products[11] = ['name' => 'iPhone', 'price' => '2000000'];

        $cartProducts = [];
        $cartProductData = session('cart_product_data');
        if ($cartProductData) {
            foreach ($products as $key => $product) {
                if (in_array($key, array_keys($cartProductData))) {
                    $cartProducts[$key] = $product;
                }
            }
        }

        $viewData = [];
        $viewData['title'] = 'Cart - Internet Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['products'] = $products;
        $viewData['cartProducts'] = $cartProducts;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {
        $cartProductData = session('cart_product_data');
        $cartProductData[$id] = $id;
        Session::put('cart_product_data', $cartProductData);

        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {
        Session::forget('cart_product_data');

        return back();
    }
}
