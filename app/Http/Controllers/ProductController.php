<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return Inertia::render('Products', ['products' => $products]);
    }

    public function show(Product $product)
    {
        return Inertia::render('ProductDetail', [
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'description' => $product->description,
                'image' => Storage::disk('public')->url($product->image)
            ]
        ]);
    }
}
