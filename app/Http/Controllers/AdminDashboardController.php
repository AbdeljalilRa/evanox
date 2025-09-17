<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get statistics for dashboard
        $totalProducts = Product::count();
        $activeProducts = Product::where('is_active', true)->count();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        
        // Get order statistics
        $totalOrders = Order::count();
        $pendingOrders = Order::where('order_status', 'pending')->count();
        $completedOrders = Order::where('order_status', 'completed')->count();
        
        // Store status (mock for now, can be implemented later)
        $storeStatus = 'on'; // Mock data
        
        return view('admin.dashboard', compact(
            'totalProducts',
            'activeProducts',
            'totalCategories',
            'totalUsers',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'storeStatus'
        ));
    }
    
    public function toggleStoreStatus(Request $request)
    {
        // This is a placeholder for store status toggle functionality
        // In a real implementation, this would update a settings table
        $status = $request->input('status', 'on');
        
        // For now, just return success message
        return redirect()->route('admin.dashboard')
            ->with('success', 'Store status updated to ' . $status);
    }
}