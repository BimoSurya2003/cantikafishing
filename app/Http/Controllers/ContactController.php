<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        // Mengambil semua data dari tabel kontak
        $contacts = Contact::paginate(10);

        // Mengembalikan data ke view
        return view('dashboard.contact.index', ['contacts' => $contacts]);
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string|max:255',
        ]);

        // Simpan data menggunakan Eloquent
        Contact::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'pesan' => $validatedData['pesan'],
        ]);

        return redirect('/');
    }
}
