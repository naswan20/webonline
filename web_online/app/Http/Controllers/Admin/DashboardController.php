<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_orders' => Order::count(),
            'total_services' => Service::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
        ];

        $recent_orders = Order::with(['customer', 'service', 'technician'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_orders'));
    }
}