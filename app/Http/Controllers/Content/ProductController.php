<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use App\Models\content\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('content.plans', compact('products'));
    }

    public function update(Product $product, Request $request)
    {

        $product->update($request->all());
        return redirect()->back()->with('success', 'Data has been updated');
    }
}
