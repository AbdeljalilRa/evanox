<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order; // إذا عندك جدول المبيعات
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        // Store Status
        $storeStatus = Setting::where('key', 'store_status')->value('value') ?? 'on';

        // Stats
        $totalProducts   = Product::count();
        $activeProducts  = Product::where('is_active', 1)->count();
        $totalCategories = Category::count();
        $totalUsers      = User::count();

        // Orders (إذا عندك جدول orders)
        $totalOrders = Order::count() ?? 0;
        $pendingOrders   = Order::where('order_status', 'pending')->count() ?? 0;
        $completedOrders = Order::where('order_status', 'completed')->count() ?? 0;

        return view('admin.dashboard', compact(
            'storeStatus',
            'totalProducts',
            'activeProducts',
            'totalCategories',
            'totalUsers',
            'totalOrders',
            'pendingOrders',
            'completedOrders'
        ));
    }
}
