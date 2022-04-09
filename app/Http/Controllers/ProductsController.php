<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProductsController extends Controller
{
    public function sale()
    {
        return view('sale');
    }

    private function insertInDatabase(Request $request, $index, $product)
    {
        $product->name = $request->input('name-' . $index);
        $product->serial_number = $request->input('serial-number-' . $index);
        $product->part_number = $request->input('part-number-' . $index);
        $product->day = new Carbon($request->input('date-' . $index));
        $product->price = $request->input('price-' . $index);
        $product->save();
    }

    public function saveProducts(Request $request)
    {
        $inputLines = (count($request->input()) - 6) / 5;
        for ($i = 1; $i <= $inputLines; $i++) {
            $product = new Product;
            self::insertInDatabase($request, $i, $product);
        }
        return redirect(route('showAllProducts'));
    }

    public function showAllProducts() {
        return view('show-all-products')
                ->with('products', Product::orderBy('day', 'desc')->orderBy('created_at', 'desc')->get());
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect(route('showAllProducts'));
    }

    public function editProduct($id)
    {
        return view('edit-product')
                ->with('product', Product::find($id));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        self::insertInDatabase($request, 1, $product);
        return redirect(route('showAllProducts'));
    }
}
