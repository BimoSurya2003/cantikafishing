@extends('layout_order.main')

@section('addproduk')
    <div class="checkout-container">
        <!-- Product List -->
        @foreach ($orders as $order)
            <div class="checkout-product-item">
                <div class="checkout-product-info">
                    <!-- Ensure image URL and name are correctly accessed from the product relationship -->
                    <img src="{{ $order->product->image_url }}" alt="{{ $order->product->name }}">
                    <div>
                        <p class="checkout-product-title">{{ $order->product->name }}</p>
                        <p class="checkout-product-category">Kategori: {{ $order->product->category->name }}</p>
                        <p class="checkout-product-price">Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="checkout-product-quantity">
                    <input type="number" value="{{ $order->jumlah }}" min="1" class="quantity-input-checkout" readonly>
                </div>
            </div>
        @endforeach

        <!-- Checkout Info -->
        <div class="checkout-info">
            <!-- Address Section -->
            <div class="checkout-address-section">
                <label>Alamat Pengiriman</label>
                <textarea rows="3" name="alamat" form="order-form" placeholder="Masukkan Alamat Pengiriman">{{ $orders->first()->alamat }}</textarea>
                <label>Nomor Telepon</label>
                <input type="text" id="phone" name="telepon" form="order-form" placeholder="Masukkan Nomor Telepon" value="{{ $orders->first()->telepon }}">
            </div>

            <!-- Summary Section -->
            <div class="checkout-summary-section">
                <h3>Ringkasan Belanja</h3>
                <div class="checkout-summary-row">
                    <span>Total Harga ({{ $orders->count() }} barang)</span>
                    <span>Rp{{ number_format($orders->sum('total_price'), 0, ',', '.') }}</span> <!-- Total Price Calculation -->
                </div>
                <div class="checkout-total">
                    <span>Total Tagihan</span>
                    <span>Rp{{ number_format($orders->sum('total_price'), 0, ',', '.') }}</span>
                </div>
                <button class="checkout-bayar-btn" onclick="event.preventDefault(); document.getElementById('order-form').submit();">Bayar</button>
            </div>
        </div>

        <!-- Hidden Form for Submitting Order -->
        <form id="order-form" action="{{ route('order.store') }}" method="POST" style="display: none;">
            @csrf
            <!-- Loop through orders to send individual data -->
            @foreach ($orders as $order)
                <input type="hidden" name="orders[{{ $loop->index }}][product_id]" value="{{ $order->product->id }}">
                <input type="hidden" name="orders[{{ $loop->index }}][jumlah]" value="{{ $order->jumlah }}">
                <input type="hidden" name="orders[{{ $loop->index }}][total_price]" value="{{ $order->total_price }}">
            @endforeach
            <input type="hidden" name="alamat" value="{{ $orders->first()->alamat }}">
            <input type="hidden" name="telepon" value="{{ $orders->first()->telepon }}">
            <input type="hidden" name="order_date" value="{{ now()->format('Y-m-d') }}">
        </form>
    </div>
@endsection
