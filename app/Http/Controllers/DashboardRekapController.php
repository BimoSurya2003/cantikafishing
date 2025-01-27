<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Booking;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardRekapController extends Controller
{
    public function rekap()
    {

        $todaySales = Order::whereDate('order_date', Carbon::today())->sum('total_price');

        $produkTerjual = OrderItem::sum('quantity');

        $produkMasuk = BarangMasuk::sum('quantity');

        $totalUsers = User::count();

        $totalBooking = Booking::count();

        $totalPenjualan = Order::sum('total_price');

        $jumlahOrder = Order::count();

        $pemancingan = Booking::sum('harga'); 


        return view('dashboard.rekap.index', compact('todaySales', 'produkTerjual', 'totalUsers', 'totalPenjualan', 'totalBooking', 'pemancingan', 'produkMasuk' , 'jumlahOrder'));
    }

    public function getSalesData(Request $request)
    {
        $timeRange = $request->input('timeRange', 'monthly');
        $salesData = [];

        switch ($timeRange) {
            case 'daily':
                $salesData = Order::selectRaw('DATE(order_date) as date, SUM(total_price) as total')
                    ->whereDate('order_date', Carbon::today())
                    ->groupBy('date')
                    ->get();
                break;
            case 'weekly':
                $salesData = Order::selectRaw('WEEK(order_date) as week, SUM(total_price) as total')
                    ->whereBetween('order_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->groupBy('week')
                    ->get();
                break;
            case 'monthly':
                $salesData = Order::selectRaw('MONTH(order_date) as month, SUM(total_price) as total')
                    ->whereYear('order_date', Carbon::now()->year)
                    ->groupBy('month')
                    ->get();
                break;
            case 'yearly':
                $salesData = Order::selectRaw('YEAR(order_date) as year, SUM(total_price) as total')
                    ->groupBy('year')
                    ->get();
                break;
        }

        return response()->json($salesData);
    }

}
