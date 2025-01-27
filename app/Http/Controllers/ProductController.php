<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10000);
        return view('order.produk',['products' => $products]); // Menggunakan compact untuk kejelasan
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('order.produkdetail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Jika ada query pencarian, lakukan pencarian pada model Product
        $products = Product::where('product_name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->latest()
            ->paginate(10);

        return view('order.produk', compact('products'));
    }

    public function showByCategory($category)
    {
        // Ambil id kategori berdasarkan nama kategori
        $categoryId = DB::table('categories')
                        ->where('category_name', $category)
                        ->value('id');

        // if (!$categoryId) {
        //     // Jika kategori tidak ditemukan
        //     return view('order.produk')->with('error', 'Category not found');
        // }

        // Ambil produk berdasarkan category_id dan gunakan paginate
        $products = Product::where('category_id', $categoryId)
                            ->paginate(10);  // Sesuaikan jumlah produk per halaman

        return view('order.produk', compact('products'));
    }

    // public function showCategories()
    // {
    //     // Ambil semua kategori dari tabel categories
    //     $categories = DB::table('categories')->get();

    //     return view('layout_order.sidebar', ['categories' => $categories]);
    // }

}
