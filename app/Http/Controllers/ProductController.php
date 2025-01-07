<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('options')->get();
        return view('product.product_list', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.product_add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'options' => 'required|array',
            'options.*.name' => 'required',
            'options.*.price' => 'required|numeric',
            'options.*.image' => 'required|image',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        foreach ($request->options as $option) {
            $imagePath = $option['image']->store('uploads', 'public');
            ProductOption::create([
                'product_id' => $product->id,
                'name' => $option['name'],
                'image_path' => $imagePath,
                'price' => $option['price'],
            ]);
        }

        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }
}
