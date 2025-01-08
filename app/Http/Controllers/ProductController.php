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
            'options.*.image' => 'image',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        foreach ($request->options as $option) {
            if (isset($option['image'])) {
                $file = $option['image'];
                $filename = time() . "_image." . $file->getClientOriginalExtension();
                $path = 'uploads/images';
                $file->move(public_path($path), $filename);
                $imagePath = $path . '/' . $filename;
            } else {
                $imagePath = null;
            }
            ProductOption::create([
                'product_id' => $product->id,
                'name' => $option['name'],
                'image_path' => $imagePath,
                'price' => $option['price'],
            ]);
        }

        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.product_edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'options' => 'required|array',
            'options.*.name' => 'required',
            'options.*.price' => 'required|numeric',
            'options.*.image' => 'image',
        ]);

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        foreach ($request->options as $option) {
            if (isset($option['image'])) {
            $file = $option['image'];
            $filename = time() . "_image." . $file->getClientOriginalExtension();
            $path = 'uploads/images';
            $file->move(public_path($path), $filename);
            $imagePath = $path . '/' . $filename;
            } else {
            $imagePath = isset($option['id']) ? $product->options->where('id', $option['id'])->first()->image_path : null;
            }

            ProductOption::updateOrCreate(
            ['id' => $option['id'] ?? null],
            [
                'product_id' => $product->id,
                'name' => $option['name'],
                'image_path' => $imagePath,
                'price' => $option['price'],
            ]
            );
        }

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }


}
