<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ShoppingListController extends Controller

{

    public function showResult(Request $request)
    {

        $cheapestProducts = $request->cheapestProducts;
        $totalCost = $request->totalCost;
        $mostExpensiveProducts = $request->mostExpensiveProducts;

        if (empty($cheapestProducts)){
            $cheapestProducts = [];
        }
        if (empty($totalCost)){
            $totalCost = null;
        }
        if (empty($mostExpensiveProducts)){
            $mostExpensiveProducts = [];
        }

        return view('shopping-list')->with('totalCost', $totalCost)
            ->with('cheapestProducts', $cheapestProducts)
            ->with('mostExpensiveProducts', $mostExpensiveProducts);;
    }


    public function calculate(Request $request)
    {
        $products = $request->input('products');
        $totalCost = 0;
        $minPrice = PHP_INT_MAX;
        $maxPrice = PHP_INT_MIN;
        $cheapestProducts = [];
        $mostExpensiveProducts = [];


        foreach ($products as $product) {

                $totalCost += $product['price'];
                if ($product['price'] < $minPrice) {
                    $minPrice = $product['price'];
                    $cheapestProducts = [$product['name']];
                } elseif ($product['price'] == $minPrice) {
                    $cheapestProducts[] = $product['name'];
                }
    
                if ($product['price'] > $maxPrice) {
                    $maxPrice = $product['price'];
                    $mostExpensiveProducts = [$product['name']];
                } elseif ($product['price'] == $maxPrice) {
                    $mostExpensiveProducts[] = $product['name'];
                }

        }

        return redirect()->route('shop-bill', [
            'totalCost' => $totalCost,
            'cheapestProducts' => $cheapestProducts,
            'mostExpensiveProducts' => $mostExpensiveProducts
        ]);
    }
}
