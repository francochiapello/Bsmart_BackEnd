<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:120',
            'price' => 'required|integer|min:1',
            'stock' => 'required|integer|min:1',
            'category_id' => 'required'
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;

        $product->save();
    }

    public function show(string $id)
    {
        $product = Product::find($id);

        return $product;
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;

        $product->save();

        return $product;
    }

    public function destroy(string $id)
    {
        $product = Product::destroy($id);

        return $product;
    }

    public function getAll(Request $request){
        $products = Product::findBy();

        return $products;
    }
}
