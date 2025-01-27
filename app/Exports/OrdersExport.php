<?php

namespace App\Exports;

use App\Models\OrderItem;
use App\Models\Booking; // Jika Anda memiliki model Booking untuk pemancingan
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;

class OrdersExport implements FromView
{
    /**
    * @return \Illuminate\Contracts\View\View
    */
    public function view(): View
    {
        // Ambil data order items yang ingin diekspor beserta relasi yang diperlukan
        $orderitems = OrderItem::with(['order.user', 'product'])->get(); // Memuat relasi order, user, dan product
        $bookings = Booking::with('user')->get();

        // Hitung total booking pemancingan
        $totalBookings = Booking::count(); // Asumsikan model Booking digunakan untuk menghitung booking pemancingan
        $totalPembokingan = Booking::sum('harga');

        // Hitung total penjualan
        $totalPenjualan = Order::sum('total_price');

        // Hitung jumlah produk terjual
        $produkTerjual = OrderItem::sum('quantity');

        // Hitung total order
        $totalorder = Order::count();

        // Mengirimkan data ke tampilan 'exports.orders'
        return view('dashboard.rekap.excel', [
            'orderitems' => $orderitems,
            'totalBookings' => $totalBookings,
            'produkTerjual' => $produkTerjual,
            'totalorder' => $totalorder,
            'totalPenjualan' => $totalPenjualan,
            'bookings' => $bookings,
            'totalPembokingan' => $totalPembokingan,
        ]);
    }


}
