<?php
namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $teknisi_id = auth()->id();
        
        $stats = [
            'assigned_orders' => Order::where('technician_id', $teknisi_id)
                ->where('status', 'assigned')
                ->count(),
            'in_progress_orders' => Order::where('technician_id', $teknisi_id)
                ->where('status', 'in_progress')
                ->count(),
            'completed_orders' => Order::where('technician_id', $teknisi_id)
                ->where('status', 'completed')
                ->count(),
            'total_orders' => Order::where('technician_id', $teknisi_id)->count(),
        ];

        $recent_orders = Order::with(['customer', 'service'])
            ->where('technician_id', $teknisi_id)
            ->latest()
            ->take(5)
            ->get();

        return view('teknisi.dashboard', compact('stats', 'recent_orders'));
    }
}