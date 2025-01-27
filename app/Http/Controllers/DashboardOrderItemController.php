<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class DashboardOrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil nilai pencarian dari request
        $search = $request->input('search');

        // Query untuk mendapatkan OrderItem dengan pencarian
        $orderitems = OrderItem::query()
            ->when($search, function ($query, $search) {
                return $query->whereHas('order', function ($query) use ($search) {
                    $query->where('order_date', 'like', '%' . $search . '%') // Pencarian berdasarkan tanggal order
                    ->orWhere('telepon', 'like', '%' . $search . '%'); // Pencarian berdasarkan telepon
                })
                ->orWhereHas('product', function ($query) use ($search) {
                    $query->where('product_name', 'like', '%' . $search . '%'); // Pencarian berdasarkan nama produk
                });
            })
            ->latest()
            ->paginate(10);

        // Kirim data OrderItem dan nilai pencarian ke view
        return view('dashboard.order_item.index', [
            'orderitems' => $orderitems,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
