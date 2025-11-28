<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display user's order history
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('items.product')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Display the specified order
     */
    public function show(Order $order)
    {
        // Verify order belongs to user or user is admin
        if ($order->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $order->load('items.product', 'user');
        return view('orders.show', compact('order'));
    }

    /**
     * Create order from cart (checkout)
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'nullable|string|max:500',
        ]);

        $cart = Cart::where('user_id', Auth::id())
            ->with('items.product')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Tu carrito está vacío.');
        }

        // Check stock availability
        foreach ($cart->items as $item) {
            if ($item->quantity > $item->product->stock) {
                return redirect()->route('cart.index')
                    ->with('error', "El producto {$item->product->name} no tiene suficiente stock.");
            }
        }

        DB::beginTransaction();
        try {
            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $cart->total,
                'status' => 'pending',
                'shipping_address' => $request->shipping_address,
                'payment_method' => 'simulated',
            ]);

            // Create order items and update stock
            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'subtotal' => $item->subtotal,
                ]);

                // Update product stock
                $item->product->decrement('stock', $item->quantity);
            }

            // Clear cart
            $cart->items()->delete();

            DB::commit();

            return redirect()->route('orders.show', $order)
                ->with('success', 'Pedido realizado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')
                ->with('error', 'Error al procesar el pedido. Por favor intenta de nuevo.');
        }
    }

    /**
     * Admin: List all orders
     */
    public function adminIndex()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }
        
        $orders = Order::with('user', 'items.product')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Admin: Update order status
     */
    public function updateStatus(Request $request, Order $order)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return back()->with('success', 'Estado del pedido actualizado.');
    }
}
