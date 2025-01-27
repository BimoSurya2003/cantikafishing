<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchases;
use Illuminate\Http\Request;

class DashboardPurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil query pencarian jika ada
        $search = $request->input('search');

        // Query untuk mencari stok berdasarkan nama produk atau suplier
        $purchases = Purchases::with('product')
            ->when($search, function ($query, $search) {
                return $query->whereHas('product', function ($q) use ($search) {
                    $q->where('product_name', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(10);

        return view('dashboard.purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('dashboard.purchases.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'stock' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:1', 
            'tgl_beli' => 'required|date',
        ]);

        Purchases::create($validated);

        return redirect('/dashboard-purchases')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $purchase = Purchases::with('product')->findOrFail($id);
        return view('dashboard.purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $purchase = Purchases::findOrFail($id);
        $products = Product::all();

        return view('dashboard.purchases.edit', compact('purchase', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'stock' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:1',
            'tgl_beli' => 'required|date',
        ]);

        $purchase = Purchases::findOrFail($id);
        $purchase->update($validated);

        return redirect('/dashboard-purchases')->with('success', 'Data Pembelian Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = Purchases::findOrFail($id); 
        $purchase->delete();

        return redirect('/dashboard-purchases')->with('success', 'Data Pembelian Berhasil Dihapus');
    }
}
