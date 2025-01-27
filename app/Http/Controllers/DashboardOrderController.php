<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class DashboardOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil nilai pencarian dari request
        $search = $request->input('search');

        // Query untuk mendapatkan order dengan pencarian
        $orders = Order::query()
            ->when($search, function ($query, $search) {
                return $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%'); // Pencarian berdasarkan nama user
                })
                ->orWhere('order_date', 'like', '%' . $search . '%') // Pencarian berdasarkan tanggal order
                ->orWhere('telepon', 'like', '%' . $search . '%'); // Pencarian berdasarkan telepon
            })
            ->latest()
            ->paginate(10);

        // Kirim data order dan nilai pencarian ke view
        return view('dashboard.order.index', [
            'orders' => $orders,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('user')->find($id); // Mendapatkan order berdasarkan ID
        $orderitems = OrderItem::where('order_id', $id)->paginate(10); // Dapatkan order items terkait

        return view('dashboard.order.detail', compact('order', 'orderitems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);
        return view('dashboard.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|string|in:unpaid,paid,processing,shipped,completed,canceled',
        ]);

        // Find the order by ID
        $order = Order::find($id);

        // Check if the order exists
        if (!$order) {
            return redirect()->route('dashboard.order.index')->with('error', 'Order not found.');
        }

        // Update the order status
        $order->status = $request->input('status');
        $order->save(); // Save changes to the database

        // Redirect back to the order index with a success message
        return redirect('/dashboard-order')->with('success', 'Status Pesanan Sudah Di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
