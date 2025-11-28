<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\LoginUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Admin dashboard
     */
    public function dashboard()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $stats = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total'),
            'total_products' => Product::count(),
            'low_stock_products' => Product::where('stock', '<', 10)->count(),
            'total_customers' => LoginUser::where('role', 'customer')->count(),
        ];

        $recent_orders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_orders'));
    }

    /**
     * Sales report
     */
    public function salesReport(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $startDate = $request->start_date ?? now()->subMonth()->format('Y-m-d');
        $endDate = $request->end_date ?? now()->format('Y-m-d');

        $orders = Order::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'completed')
            ->with('items.product')
            ->get();

        $totalRevenue = $orders->sum('total');
        $totalOrders = $orders->count();
        $averageOrder = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;

        // Top products
        $topProducts = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->where('orders.status', 'completed')
            ->select('products.name', DB::raw('SUM(order_items.quantity) as total_quantity'), DB::raw('SUM(order_items.subtotal) as total_revenue'))
            ->groupBy('products.id', 'products.name')
            ->orderBy('total_quantity', 'desc')
            ->limit(10)
            ->get();

        return view('admin.sales-report', compact(
            'orders',
            'totalRevenue',
            'totalOrders',
            'averageOrder',
            'topProducts',
            'startDate',
            'endDate'
        ));
    }

    /**
     * Category management
     */
    public function categories()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }
        $categories = Category::withCount('products')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store category
     */
    public function storeCategory(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ]);

        Category::create($validated);

        return back()->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Update category
     */
    public function updateCategory(Request $request, Category $category)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
        ]);

        $category->update($validated);

        return back()->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Delete category
     */
    public function deleteCategory(Category $category)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        if ($category->products()->count() > 0) {
            return back()->with('error', 'No se puede eliminar una categoría que tiene productos.');
        }

        $category->delete();

        return back()->with('success', 'Categoría eliminada exitosamente.');
    }
}
