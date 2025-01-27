<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class RiwayatBookingController extends Controller
{
    public function index()
    {
        // Ambil semua booking untuk user yang sedang login
        $bookings = Booking::where('user_id', auth()->id())
                            ->orderBy('tgl_booking', 'desc') // Urutkan berdasarkan tanggal booking terbaru
                            ->paginate(10); // Menampilkan 10 booking per halaman

        // Kirim data booking ke view
        return view('pemancingan.index', compact('bookings'));
    }

    public function cancel($id)
    {
        $booking = Booking::find($id);
        if ($booking && $booking->status == 'pending') {
            $booking->status = 'canceled';
            $booking->save();

            return redirect()->back()->with('success', 'Pemesanannya telah dibatalkan.');
        }

        return redirect()->back()->with('error', 'Tidak dapat membatalkan pemesanan.');
    }

}
