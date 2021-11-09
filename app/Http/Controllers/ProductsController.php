<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProductsController extends Controller
{
    public function showTable($id)
    {
        return view('company-sales')
                ->with('companyId', $id );
    }

    private function insertInDatabase($index, Request $request, $id)
    {
        $product = new Product;
        $product->company_id = $id;
        $product->name = $request->input('name-' . $index);
        $product->serial_number = $request->input('serial-number-' . $index);
        $product->part_number = $request->input('part-number-' . $index);
        $product->day = new Carbon($request->input('date-' . $index));
        $product->price = $request->input('price-' . $index);
        $product->delivered = ($request->delivered == true);
        $product->save();
    }

    public function saveProducts(Request $request, $id)
    {
        $inputLines = (count($request->input()) - 7) / 5;
        for ($i = 1; $i <= $inputLines; $i++) {
            self::insertInDatabase($i, $request, $id);
        }
        
        return redirect(route('home'));
    }
}
