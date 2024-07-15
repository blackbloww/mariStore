<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

class ChartController extends Controller
{
    public function salesByDay()
    {
        $orders = Order::all();
        $users = User::all();
        $sales = Order::select(
            DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'),
            DB::raw('SUM(total_price) as total_sales'),
            DB::raw('SUM(CASE WHEN status = "Hoàn thành" THEN total_price ELSE 0 END) as completed_sales'),
            DB::raw('COUNT(*) as order_count')
        )
        ->groupBy('day')
        ->get();
        return view('chart.sales_by_day', compact('sales','users','orders'));
    }

    
}
