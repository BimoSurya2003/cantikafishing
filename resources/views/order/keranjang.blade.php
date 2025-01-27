@extends('layout_order.main')

@section('addproduk')
    <div class="container-keranjang">
        <div class="product-card-keranjang">
            <h1 style="margin-bottom: 50px;">Keranjang Anda</h1>
            <div class="cart-items-keranjang">
                @if($carts->isEmpty())
                    <p style="text-align: center">Keranjang Anda kosong. Silakan tambahkan produk sebelum melakukan pemesanan.</p>
                @else
                    <table style="width: 100%;">
                        <tr class="cart-header-keranjang">
                            <td style="width: 20%;">Gambar</td>
                            <td style="width: 40%;">Item</td>
                            <td style="width: 15%;">Jumlah</td>
                            <td style="width: 15%;">Harga</td>
                            <td style="width: 10%;">Hapus</td>
                        </tr>

                        @foreach ($carts as $cart)
                        <tr class="cart-item-keranjang">
                            <td>
                                <img src="{{ asset($cart->product->image) }}" class="item-image-keranjang" alt="{{ $cart->product->product_name }}">
                            </td>
                            <td>
                                <div class="item-details-keranjang">
                                    <div class="item-name-keranjang">{{ $cart->product->product_name }}</div>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="quantity-form-keranjang">
                                    @csrf
                                    @method('PUT') <!-- Metode PUT untuk update -->
                                    <div class="quantity-container-keranjang">
                                        <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" class="quantity-input-keranjang" onchange="this.form.submit()">
                                    </div>
                                </form>
                            </td>
                            <td class="price-info-keranjang">Rp {{ number_format($cart->product->price) }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" class="remove-form-keranjang">
                                    @csrf
                                    @method('DELETE') <!-- Metode DELETE untuk menghapus -->
                                    <button type="submit" class="remove-btn-keranjang" onclick="return confirm('Hapus item ini dari keranjang?')">
                                        <i data-feather="x-circle"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <div class="card-bayar">
                            <div class="form-group-bayar">
                                <label class="bayar" for="alamat">Alamat:</label>
                                <textarea class="bayar" id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat Anda" required></textarea>
                            </div>
                            <div class="form-group-bayar">
                                <label class="bayar" for="telepon">Nomor Telepon:</label>
                                <input class="bayar" type="tel" id="telepon" name="telepon" placeholder="Masukkan nomor telepon Anda" required>
                            </div>
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}"> <!-- Asumsi user yang login -->
                            <input type="hidden" name="order_date" value="{{ now()->format('Y-m-d') }}"> <!-- Mengambil tanggal saat ini -->
                            <input type="hidden" name="total_price" value="{{ $carts->sum(fn($cart) => $cart->product->price * $cart->quantity) }}"> <!-- Total harga -->
                            <input type="hidden" name="cart_id" value="{{ $carts->first()->id }}"> <!-- Asumsi satu cart -->
                        </div><br>
                        <div class="summary-card-keranjang">
                            <div class="total-summary-keranjang">
                                <span>Total:</span>
                                <span>Rp {{ number_format($carts->sum(fn($cart) => $cart->product->price * $cart->quantity)) }}</span>
                            </div>
                            <div class="button-container-keranjang">
                                <a href="/product" class="continue-shopping-keranjang">Lanjut Belanja</a>
                                <button type="submit" class="checkout-btn-keranjang">Checkout</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
