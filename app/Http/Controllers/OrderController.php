<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        // Validasi input
        $validatedData = $request->validate([
            'order_date' => 'required|date',
            'total_price' => 'required|numeric',
            'user_id' => 'required|integer',
            'telepon' => 'required|string',
            'cart_id' => 'required|exists:carts,id',
            'alamat' => 'required|string', // Menambahkan validasi untuk alamat
        ]);

        // Ambil semua item dalam keranjang
        $cartItems = Cart::where('user_id', Auth::id())->get();

        // Cek apakah semua produk dalam keranjang memiliki stok yang cukup
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);

            // Jika stok produk tidak cukup, kembalikan pesan kesalahan
            if ($product->stock < $cartItem->quantity) {
                return redirect()->route('product.index')->with(
                    'error', 
                    'Mohon Maaf Stok Tidak Mencukupi untuk ' . $product->product_name . 
                    ', Tersedia: ' . $product->stock . 
                    ', diminta: ' . $cartItem->quantity
                );
            }
        }

        // Simpan order setelah semua stok cukup
        $order = Order::create([
            'order_date' => $validatedData['order_date'],
            'total_price' => $validatedData['total_price'],
            'user_id' => $validatedData['user_id'],
            'telepon' => $validatedData['telepon'],
            'cart_id' => $validatedData['cart_id'],
            'alamat' => $validatedData['alamat'], // Menyimpan alamat
        ]);

        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);

            // Simpan item pesanan
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
            ]);

            // Pengurangan stok langsung dari produk
            $product->stock -= $cartItem->quantity;
            $product->save();
        }

        // Hapus semua item di keranjang setelah order berhasil
        Cart::where('user_id', Auth::id())->delete();

        // Redirect ke halaman produk dengan pesan sukses
        return redirect('/pesanan')->with('success', 'Order berhasil dibuat!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
