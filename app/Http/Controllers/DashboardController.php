<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Store Status
        $storeStatus = Setting::where('key', 'store_status')->value('value') ?? 'on';

        // ==================== KEY METRICS ====================
        $totalProducts   = Product::count();
        $activeProducts  = Product::where('is_active', 1)->count();
        $totalCategories = Category::count();
        $totalUsers      = User::count();
        
        // Orders Stats
        $totalOrders     = Order::count();
        $pendingOrders   = Order::where('order_status', 'pending')->count();
        $completedOrders = Order::where('order_status', 'completed')->count();
        $totalRevenue    = Order::where('payment_status', 'paid')->sum('total');
        
        // Monthly Revenue (last 12 months)
        $monthlyRevenue = Order::where('payment_status', 'paid')
            ->where('created_at', '>=', Carbon::now()->subMonths(12))
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total) as revenue')
            ->groupByRaw('DATE_FORMAT(created_at, "%Y-%m")')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                return [
                    'month' => Carbon::createFromFormat('Y-m', $item->month)->format('M'),
                    'revenue' => (float) $item->revenue,
                ];
            });

        // Orders per month (last 12 months)
        $ordersPerMonth = Order::where('created_at', '>=', Carbon::now()->subMonths(12))
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->groupByRaw('DATE_FORMAT(created_at, "%Y-%m")')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                return [
                    'month' => Carbon::createFromFormat('Y-m', $item->month)->format('M'),
                    'count' => (int) $item->count,
                ];
            });

        // Order Status Distribution
        $orderStatusDistribution = Order::selectRaw('order_status, COUNT(*) as count')
            ->groupBy('order_status')
            ->get()
            ->map(function ($item) {
                return [
                    'status' => ucfirst($item->order_status),
                    'count' => (int) $item->count,
                ];
            });

        // Recent Orders (with relationships)
        $recentOrders = Order::with(['user', 'orderItems'])
            ->latest()
            ->limit(10)
            ->get();

        // Recent Users
        $recentUsers = User::latest()
            ->limit(8)
            ->get();

        // Growth Metrics
        $usersThisMonth = User::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $usersLastMonth = User::whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ])->count();
        $userGrowth = $usersLastMonth > 0 ? round((($usersThisMonth - $usersLastMonth) / $usersLastMonth) * 100, 1) : 0;

        // Recent Orders This Month
        $ordersThisMonth = Order::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $ordersLastMonth = Order::whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ])->count();
        $orderGrowth = $ordersLastMonth > 0 ? round((($ordersThisMonth - $ordersLastMonth) / $ordersLastMonth) * 100, 1) : 0;

        return view('admin.dashboard-modern', compact(
            'storeStatus',
            'totalProducts',
            'activeProducts',
            'totalCategories',
            'totalUsers',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'totalRevenue',
            'monthlyRevenue',
            'ordersPerMonth',
            'orderStatusDistribution',
            'recentOrders',
            'recentUsers',
            'userGrowth',
            'usersThisMonth',
            'orderGrowth',
            'ordersThisMonth'
        ));
    }
}
