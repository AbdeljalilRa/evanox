<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Order::with('user')->latest();

        // Filtrer par order_status ou payment_status
        if ($request->filled('order_status')) {
            $query->where('order_status', $request->order_status);
        }

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        $orders = $query->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }


    public function show($id)
    {
        $order = Order::with(['user', 'orderItems.product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
{
    $order = \App\Models\Order::findOrFail($id);

    $field = $request->input('field');
    $value = $request->input('value');

    if (!in_array($field, ['order_status', 'payment_status'])) {
        return response()->json(['message' => 'Invalid field'], 400);
    }

    $order->$field = $value;
    $order->save();

    return response()->json(['message' => ucfirst(str_replace('_', ' ', $field)) . ' updated successfully']);
}

}
