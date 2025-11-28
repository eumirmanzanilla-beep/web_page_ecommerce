<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of products (public catalog)
     */
    public function index(Request $request)
    {
        $query = Product::with('category')->where('active', true);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Category filter
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $products = $query->paginate(12);
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Display the specified product
     */
    public function show(Product $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for creating a new product (admin only)
     */
    public function create()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product (admin only)
     */
    public function store(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Show the form for editing the specified product (admin only)
     */
    public function edit(Product $product)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product (admin only)
     */
    public function update(Request $request, Product $product)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified product (admin only)
     */
    public function destroy(Product $product)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }

    /**
     * Admin: List all products
     */
    public function adminIndex()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }
        $products = Product::with('category')->paginate(15);
        return view('admin.products.index', compact('products'));
    }
}
