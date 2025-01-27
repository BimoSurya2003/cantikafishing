<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil nilai pencarian dari request
        $search = $request->input('search');

        // Query untuk mendapatkan Booking dengan pencarian
        $bookings = Booking::when($search, function ($query, $search) {
                return $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%'); // Pencarian berdasarkan nama pengguna
                })
                ->orWhere('status', 'like', '%' . $search . '%') // Pencarian berdasarkan status booking
                ->orWhere('jenis_pemesanan', 'like', '%' . $search . '%') // Pencarian berdasarkan status booking
                ->orWhere('harian_duration', 'like', '%' . $search . '%'); // Pencarian berdasarkan status booking
            })
            ->latest()
            ->paginate(10);

        // Kirim data bookings dan nilai pencarian ke view
        return view('dashboard.booking.index', [
            'bookings' => $bookings,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemancingan.booking',['bookings'=>Booking::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kolam' => 'required|in:kolam_1,kolam_2,kolam_3',
            'jenis_pemesanan' => 'required|in:harian,jam,kiloan',
            'tgl_booking' => 'required|date',
            'harian_duration' => 'required_if:jenis_pemesanan,harian|in:setengah_hari,seharian', // Validasi durasi untuk harian
        ]);

        // Cek apakah sudah ada pembookingan pada tanggal yang sama
        $existingBooking = Booking::where('user_id', auth()->id())
            ->where('tgl_booking', $request->tgl_booking)
            ->where('kolam', $request->kolam) // Pastikan mengecek berdasarkan kolam juga
            ->first();

        if ($existingBooking) {
            // Jika sudah ada, kembalikan dengan pesan error
            return back()->with('error', 'Anda sudah memiliki pembookingan pada tanggal yang sama untuk kolam ini.');
        }

        // Tentukan harga berdasarkan jenis pemesanan
        $harga = 0;
        switch ($request->jenis_pemesanan) {
            case 'harian':
                // Tentukan harga berdasarkan durasi
                if ($request->harian_duration == 'setengah_hari') {
                    $harga = 36000; // Harga setengah hari
                } elseif ($request->harian_duration == 'seharian') {
                    $harga = 72000; // Harga seharian
                }
                break;
            case 'jam':
                // Harga per jam (maksimal 16 orang)
                $harga = 252000; // Harga untuk pemesanan jam
                break;
            case 'kiloan':
                // Harga kiloan per 3kg
                $harga = 108000; // Harga per kiloan
                break;
            default:
                return back()->with('error', 'Jenis pemesanan tidak valid.');
        }

        // Simpan data booking
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'kolam' => $request->kolam,
            'jenis_pemesanan' => $request->jenis_pemesanan,
            'harian_duration' => $request->harian_duration,
            'tgl_booking' => $request->tgl_booking,
            'harga' => $harga,
            'status' => 'pending', // Status awal
        ]);

        // Redirect dengan pesan sukses
        return redirect("/pemancingan")->with('success', 'Booking berhasil dibuat!');
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
        $booking = Booking::findOrFail($id);
        return view('dashboard.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,canceled',
        ]);
    
        // Ambil data booking berdasarkan ID
        $booking = Booking::findOrFail($id);
    
        // Update status booking
        $booking->update(['status' => $validated['status']]);
    
        // Redirect ke halaman dengan pesan sukses
        return redirect('/booking')->with('success', 'Status booking berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Booking::destroy($id);
        return redirect('/booking')->with('success','Data Berhasil di Hapus');
    }
}
