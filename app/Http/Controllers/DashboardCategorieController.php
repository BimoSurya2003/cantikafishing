<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class DashboardCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil nilai pencarian dari request
        $search = $request->input('search');

        // Query untuk mendapatkan kategori dengan pencarian
        $categories = Categories::query()
            ->when($search, function ($query, $search) {
                return $query->where('category_name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10);

        // Kirim data kategori dan nilai pencarian ke view
        return view('dashboard.categorie.index', [
            'categories' => $categories,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categorie.create',['categories'=>Categories::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required',
        ]);

        Categories::create($validated);

        return redirect('/dashboard-categorie')->with('success','Data Berhasil di Buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = Categories::findOrFail($id);
        return view('dashboard.categorie.detail',compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = Categories::find($id);
        $categories = Categories::all();
        return view('dashboard.categorie.edit', compact('categorie','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_name' => 'required',
        ]);

        Categories::where('id', $id)->update($validated);
        return redirect('dashboard-categorie')->with('success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categories::destroy($id);
        return redirect('/dashboard-categorie')->with('success','Data Berhasil di Hapus');
    }
}
