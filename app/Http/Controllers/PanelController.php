<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PanelController extends Controller
{
    public function index()
    {
        return Inertia::render('Administration/Panel', [
            'products' => Product::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:254',
            'price' => 'required|max:254',
            'quantity' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->storePublicly('', [
            'disk' => 'public'
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect('/products');
    }

    public function destroy(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:254',
            'price' => 'required|max:254',
            'quantity' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->storePublicly('', [
            'disk' => 'public'
        ]);


        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image' => $path,
        ]);


        return back();
    }
}
