<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }


    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('info', 'Producto eliminado'); // redirige y envia una sesión
    }

    public function store(Request $request)
    {
        $request->all();
        $product = new Product();
        $product->description =  $request['description'];
        $product->price =  $request['price'];
        $product->save();
        return redirect()->route('products.index')->with('info', 'Producto creado'); // redirige y envia una sesión
    }


    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $request = $request->all();
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->save();
        return redirect()->route('products.index')->with('info', 'Producto actualizado');
    }
}
