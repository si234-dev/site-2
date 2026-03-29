<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends BaseController
{
    // Get all products
    public function getProducts() {
        return response()->json(Product::all(), 200);
    }

    // Add a product
  public function add(Request $request) {
    $this->validate($request, [
        'name' => 'required|string|unique:products,name',
        'description' => 'nullable|string',
        'price' => 'required|numeric'
    ]);

    $product = Product::create($request->all());
    return response()->json($product, 201);
}
    // Show a specific product
    public function show($id) {
        $product = Product::find($id);
        if(!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product, 200);
    }

    // Update a product
   public function update(Request $request, $id) {
    $product = Product::find($id);
    if(!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    // ADD THIS VALIDATION HERE
    $this->validate($request, [
        'name' => 'required|string|unique:products,name,' . $id,
        'description' => 'nullable|string',
        'price' => 'required|numeric'
    ]);

    $product->update($request->all());
    return response()->json($product, 200);
}

    // Delete a product
    public function delete($id) {
        $product = Product::find($id);
        if(!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted'], 200);
    }
}