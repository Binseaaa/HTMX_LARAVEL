<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::orderBy('price');

        if($request->filter) {
            $products->where('name', 'like', "%$request->filter%")
                     ->orWhere('description', 'like', "%$request->filter%");
        }

        $html = "";

        foreach($products->get() as $prod) {
            $html .= "
            <div class='p-4 rounded bg-blue-200 min-w-[30%]'>
                    <h3 class='text-2xl mb-3'>$prod->name</h3>

                    <img src='$prod->img' class='h-[10em] w-[100%] rounded'>
                    <div class='italic text-gray-500'>
                        $prod->description
                    </div>
                    <div class='text-4xl text-right text-green-500'>$$prod->price</div>
                </div>
            ";
        }
        return $html;
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
        };

        $products = Product::orderBy('name');

        Product::create($request->all());

        return view('templates._products-list-for-create', ['products'=>$products]);
    }
}
