<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::orderBy('name');

        if($request->filter){
            $products->where('name', 'like', "%$request->filter")
                ->orWhere('description', 'like', "%$request->filter");
        }

        return view('templates._products-list-for-create', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'img' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        if($validator->fails()) {
            $products = Product::orderBy('name');
            return view('templates._create-products-error', ['errors'=>$validator->errors(), 'products'=>$products]);
        }

        Product::create($request->all());

        $products = Product::orderBy('name');
        return view('templates._products-list-for-create', ['products'=>$products]);
    }

    public function edit(Product $product){
        $product = Product::find($product->id);

        return view('products.edit', ['product' => $product]);
    }


    public function destroy(Product $product) {
        $products = Product::orderBy('name');

        $product->delete();

        return view('templates._products-list-for-create', ['products' => $products]);
    }

    public function update(Request $request, Product $product){
        $products = Product::orderBy('name');

        $fields = $request->validate([
            'name' => 'required',
            'img' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $product->update($fields);

        return view('templates._products-list-for-create', ['products'=>$products]);
    }
}
