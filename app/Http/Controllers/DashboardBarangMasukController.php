<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardBarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $barangMasuks = BarangMasuk::with('product')
            ->when($request->search, function($query) use ($request) {
                return $query->where('supplier', 'like', '%' . $request->search . '%');
            })
            ->paginate(10);

        return view('dashboard.barang_masuk.index', compact('barangMasuks'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('dashboard.barang_masuk.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'harga_beli' => 'required|numeric|min:0',
            'tgl_masuk' => 'required|date',
            'keterangan' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan data Barang Masuk
        $barangMasuk = new BarangMasuk();
        $barangMasuk->product_id = $request->product_id;
        $barangMasuk->supplier = $request->supplier;
        $barangMasuk->quantity = $request->quantity;
        $barangMasuk->harga_beli = $request->harga_beli;
        $barangMasuk->tgl_masuk = $request->tgl_masuk;
        $barangMasuk->keterangan = $request->keterangan;

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('barang_masuk_images', 'public');
            $barangMasuk->image = $imagePath;
        }

        $barangMasuk->save();

        // Update stok produk pada tabel products
        $product = Product::find($request->product_id);
        $product->stock += $request->quantity; // Menambah stok produk sesuai dengan quantity barang masuk
        $product->save();

        return redirect('/dashboard-barang_masuk')->with('success', 'Barang Masuk berhasil ditambahkan dan stok produk diperbarui.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barangMasuk = BarangMasuk::with('product')->findOrFail($id);
        return view('dashboard.barang_masuk.detail', compact('barangMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $barangMasuk = BarangMasuk::findOrFail($id);
    //     $products = Product::all();

    //     return view('dashboard.barang_masuk.edit', compact('barangMasuk', 'products'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'supplier' => 'required|string|max:255',
    //         'quantity' => 'required|integer',
    //         'harga_beli' => 'required|numeric',
    //         'tgl_masuk' => 'required|date',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     // Cari data yang ingin diperbarui
    //     $barangMasuk = BarangMasuk::findOrFail($id);

    //     $barangMasuk->product_id = $request->product_id;
    //     $barangMasuk->supplier = $request->supplier;
    //     $barangMasuk->quantity = $request->quantity;
    //     $barangMasuk->harga_beli = $request->harga_beli;
    //     $barangMasuk->tgl_masuk = $request->tgl_masuk;

    //     // Periksa apakah ada file gambar baru yang diupload
    //     if ($request->hasFile('image')) {
    //         // Hapus gambar lama jika ada
    //         if ($barangMasuk->image && file_exists(storage_path('app/public/' . $barangMasuk->image))) {
    //             unlink(storage_path('app/public/' . $barangMasuk->image));
    //         }

    //         // Simpan gambar baru
    //         $imagePath = $request->file('image')->store('images', 'public');
    //         $barangMasuk->image = $imagePath;
    //     }

    //     $barangMasuk->keterangan = $request->keterangan;
    //     $barangMasuk->save(); // Simpan perubahan ke database

    //     return redirect('/dashboard-barang_masuk')->with('success', 'Data barang masuk berhasil diperbarui!');
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan data barang masuk yang akan dihapus
        $barangMasuk = BarangMasuk::findOrFail($id);

        // Temukan produk terkait dengan barang masuk yang akan dihapus
        $product = Product::findOrFail($barangMasuk->product_id);

        // Mengurangi stok produk dengan quantity barang masuk yang dihapus
        $product->stock -= $barangMasuk->quantity;
        $product->save(); // Simpan perubahan stok

        // Hapus data barang masuk
        $barangMasuk->delete();

        return redirect('/dashboard-barang_masuk')->with('success','Data Berhasil di Hapus');
    }

}
