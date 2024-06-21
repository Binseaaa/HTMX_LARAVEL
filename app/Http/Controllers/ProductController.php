<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::orderBy('name');

        if($request->filter) {
            $products->where('name', 'like', "%$request->filter%")
                     ->orWhere('description', 'like', "%$request->filter%");
        }

        $html = "";

        foreach($products->get() as $prod) {
            $html .= "
                <div class='p-4 rounded bg-blue-200 min-w-[15rem]'>
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
}
