<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer', 'technician', 'service'])
            ->latest()
            ->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $technicians = User::whereHas('role', function($q) {
            $q->where('name', 'teknisi');
        })->where('is_active', true)->get();
        
        return view('admin.orders.edit', compact('order', 'technicians'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'technician_id' => 'nullable|exists:users,id',
            'status' => 'required|in:pending,assigned,in_progress,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        $order->update($request->only(['technician_id', 'status', 'notes']));

        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil diupdate!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}