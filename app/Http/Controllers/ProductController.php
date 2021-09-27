<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','DESC')
        ->where('user_id', Auth::user()->id)
        ->paginate('10');

        return Inertia::render('Products/Index', [
            'products' => $products,
        ]);
    } 

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store(Request $request)
    {
        $create = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => Auth::user()->id,
        ];

        $product = Product::create($create);

        if(isset($product->id)){
            return Redirect::route('products.index');
        }
    }

    public function edit(int $id)
    {
        $product = Product::find($id);

        return Inertia::render('Products/Edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);

        if(isset($product->id))
        {
            $product->update($request->all());

            return Redirect::route('dashboard');
        }
    }

    public function destroy(int $id)
    {
        $product = Product::where('id', $id)->first();

        $product->delete(); 

        return Redirect::route('products.index');
    }
}
