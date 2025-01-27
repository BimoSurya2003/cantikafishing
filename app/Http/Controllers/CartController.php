<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Menampilkan isi keranjang
    public function index()
    {
        // Mengambil keranjang pengguna
        $carts = Cart::where('user_id', auth()->id())->get();
        return view('order.keranjang', compact('carts'));
    }

    // Menambahkan item ke keranjang
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Memastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk menambahkan item ke keranjang.');
        }

        // Mengambil produk berdasarkan ID
        $product = Product::find($validated['product_id']);
        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        // Menambahkan atau memperbarui item dalam keranjang
        $cartItem = Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $validated['product_id'],
            ],
            [
                'quantity' => DB::raw("IFNULL(quantity, 0) + {$validated['quantity']}"),
                'updated_at' => now(),
            ]
        );

        return redirect('/product')->with('success', 'Berhasil menambahkan produk ke keranjang');
    }

    // Method untuk mengupdate quantity
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Mengambil item keranjang berdasarkan user dan id item keranjang
        $cartItem = Cart::where('user_id', Auth::id())->where('id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity = $validated['quantity'];
            $cartItem->save();

            return redirect()->back();
        }

        return redirect()->back()->with('error', 'Item tidak ditemukan.');
    }

    // Menghapus item dari keranjang
    public function destroy($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
        }

        return redirect()->back()->with('error', 'Item tidak ditemukan.');
    }
}
