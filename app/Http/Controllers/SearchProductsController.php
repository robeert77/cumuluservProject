<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchProductsController extends Controller
{
    public function query(Request $request)
    {
        if ($request->has('search')) {
            $products = Product::search($request->search)->orderBy('day', 'desc')->get();
        }
        else {
            $products = Product::orderBy('day', 'desc')->get();
        }

        return view('show-all-products')
                ->with('products', $products);
    }
}
