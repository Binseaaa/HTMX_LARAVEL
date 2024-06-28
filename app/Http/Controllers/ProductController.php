<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::orderBy('created_at', 'desc');

        if($request->filter) {
            $products->where('name', 'like', "%$request->filter%")
                     ->orWhere('description', 'like', "%$request->filter%");
        }

        // $html = "";

        // foreach($products->get() as $prod) {
        //     $html .= "
        //     <div class='p-4 rounded bg-blue-200 min-w-[30%]'>
        //         <div class='flex justify-end'>
        //             <a href='/products/$prod->id/delete'>
        //                 <svg class='h-5 w-5 text-red-500 hover:text-red-900'  width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>  <path stroke='none' d='M0 0h24v24H0z'/>  <line x1='4' y1='7' x2='20' y2='7' />  <line x1='10' y1='11' x2='10' y2='17' />  <line x1='14' y1='11' x2='14' y2='17' />  <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12' />  <path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3' /></svg>
        //             </a>
        //             <a href='/products/$prod->id'>
        //                 <svg class='h-5 w-5 text-gray-900 hover:text-gray-500'  viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>  <path stroke='none' d='M0 0h24v24H0z'/>  <path d='M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3' />  <path d='M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3' />  <line x1='16' y1='5' x2='19' y2='8' /></svg>
        //             </a>
        //         </div>
        //             <h3 class='text-2xl mb-3'>$prod->name</h3>

        //             <img src='$prod->img' class='h-[10em] w-[100%] rounded'>
        //             <div class='italic text-gray-500'>
        //                 $prod->description
        //             </div>
        //             <div class='text-4xl text-right text-green-500'>$$prod->price</div>
        //         </div>
        //     ";
        // }
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

        return view('products.edit', compact('product'));
    }


    public function destroy(Product $product) {
        $product->delete();

        return redirect('/products')->route('products.index')->with('success', 'Product deleted successfuly');
    }

    public function update(Request $request, Product $product){
        $fields = $request->validate([
            'name' => 'required',
            'img' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $product->update($fields);

        return view('pages.products');
    }
}
