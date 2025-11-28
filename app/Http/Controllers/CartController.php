<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the user's cart
     */
    public function index()
    {
        $cart = $this->getOrCreateCart();
        $cart->load('items.product');
        
        return view('cart.index', compact('cart'));
    }

    /**
     * Add product to cart
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
        ]);

        $cart = $this->getOrCreateCart();

        // Check if item already exists in cart
        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $newQuantity = $cartItem->quantity + $request->quantity;
            if ($newQuantity > $product->stock) {
                return back()->with('error', 'No hay suficiente stock disponible.');
            }
            $cartItem->update(['quantity' => $newQuantity]);
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return back()->with('success', 'Producto agregado al carrito.');
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cartItem->product->stock,
        ]);

        // Verify cart belongs to user
        if ($cartItem->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')
            ->with('success', 'Carrito actualizado.');
    }

    /**
     * Remove item from cart
     */
    public function remove(CartItem $cartItem)
    {
        // Verify cart belongs to user
        if ($cartItem->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cartItem->delete();

        return redirect()->route('cart.index')
            ->with('success', 'Producto eliminado del carrito.');
    }

    /**
     * Clear entire cart
     */
    public function clear()
    {
        $cart = $this->getOrCreateCart();
        $cart->items()->delete();

        return redirect()->route('cart.index')
            ->with('success', 'Carrito vaciado.');
    }

    /**
     * Get or create user's cart
     */
    private function getOrCreateCart(): Cart
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if (!$cart) {
            $cart = Cart::create(['user_id' => Auth::id()]);
        }

        return $cart;
    }
}
