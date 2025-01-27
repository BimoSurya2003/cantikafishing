<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::query();

        // Filter pencarian
        if ($search = request('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }

        // Pagination
        $users = $query->latest()->paginate(10)->withQueryString();

        return view('dashboard.user.index', ['users' => $users]);
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
        $user = User::find($id);
        $users = User::all();
        return view('dashboard.user.edit', compact('user','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'role' => 'required|in:1,0',
        ]);

        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Perbarui role
        $user->role = $request->role;
        $user->save();

        // Redirect dengan pesan sukses
        return redirect('/dashboard-user')->with('success', 'Role pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/dashboard-user')->with('success','Data Berhasil di Hapus');
    }
}
