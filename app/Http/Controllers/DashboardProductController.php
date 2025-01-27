<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil nilai pencarian dari request
        $search = $request->input('search');

        // Query untuk mendapatkan produk dengan pencarian
        $products = Product::query()
            ->when($search, function ($query, $search) {
                return $query->where('product_name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10);

        // Kirim data produk dan nilai pencarian ke view
        return view('dashboard.product.index', [
            'products' => $products,
            'search' => $search
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.product.create',['categories'=>Categories::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'category_id' => 'required'
        ]);

        $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('image', $fileName, 'public');
        $validated['image'] = 'storage/' . $path; 

        Product::create($validated);

        return redirect('/dashboard-product')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.product.detail',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Categories::all();
        return view('dashboard.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'price' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg', 
            'category_id' => 'required'
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('image', $fileName, 'public');
            $validated['image'] = 'storage/' . $path;
        } else {
            $validated['image'] = $product->image; 
        }

        $product->update($validated);

        return redirect('dashboard-product')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect('/dashboard-product')->with('success','Data Berhasil di Hapus');
    }
}
