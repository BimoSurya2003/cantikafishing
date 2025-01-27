<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->paginate(10);
        return view('order.pesanan', ['orders' => $orders]);
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

        return view('order.detailpesanan', compact('order', 'orderitems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bukti_bayar = Order::findOrFail($id);
        $total_price = $bukti_bayar->total_price;
        return view('order.bukti_transaksi', compact('bukti_bayar', 'total_price'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {
        // Validasi data
        $validated = $request->validate([
            'bukti_bayar' => 'nullable|mimes:png,jpg,jpeg|max:2048', // File bersifat opsional
        ]);

        // Ambil data order berdasarkan ID
        $order = Order::findOrFail($id);

        // Periksa apakah ada file baru
        if ($request->hasFile('bukti_bayar')) {
            // Hapus file lama jika ada
            if ($order->bukti_bayar && Storage::disk('public')->exists($order->bukti_bayar)) {
                Storage::disk('public')->delete($order->bukti_bayar);
            }

            // Simpan file baru dengan nama unik
            $fileName = time() . '_' . $request->file('bukti_bayar')->getClientOriginalName();
            $path = $request->file('bukti_bayar')->storeAs('bukti_bayar', $fileName, 'public');
            $validated['bukti_bayar'] = $path; // Simpan path untuk database
        } else {
            $validated['bukti_bayar'] = $order->bukti_bayar; // Pertahankan file lama
        }

        // Update data order
        $order->update($validated);

        // Redirect dengan pesan sukses
        return redirect('/pesanan')->with('success', 'Bukti pembayaran berhasil di tambahkan');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
