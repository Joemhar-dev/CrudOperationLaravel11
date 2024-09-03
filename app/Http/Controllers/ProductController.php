<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products.index');
    }
    public function getProduct(){
        $products = Product::all();
        return response()->json(['data' => $products]); // return as array
    }
    public function createProduct(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return response()->json(['productName' => $product->name]);
    }

    public function updateProduct(Request $request, $id){
        $product = Product::find($id);
        if($product){
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->save();
            return response()->json(['productName' => $product['name']]);
        }else{
            return response()->json(['error ' => 'Product not found!'], 404);
        }
    }
    public function deleteProduct($id){
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json(['productName' => $product['name']]);
        }else{
            return response()->json(['error' => 'Product not found!'], 404);
        }
    }


}
