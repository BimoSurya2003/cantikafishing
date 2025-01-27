@extends('layout_order.main')

@section('addproduk')

    <div class="container-produkdetail">
        <div class="left-section">
            <div class="main-image">
                <!-- Menampilkan gambar produk dari database -->
                <img src="{{ asset($product->image) }}" alt="{{ $product->product_name }}">
            </div>
        </div>

        <div class="right-section">
            <h1>{{ $product->product_name }}</h1> <!-- Menampilkan nama produk -->
            <div class="price-detail">
                Rp{{ number_format($product->price, 0, ',', '.') }} <!-- Menampilkan harga produk dengan format rupiah -->
            </div>

            <!-- Spesifikasi Produk -->
            <div class="specs">
                <h2>Spesifikasi:</h2>
                <ul>
                    <li>Kategori: {{ $product->categorie->category_name }}</li> <!-- Menampilkan kategori produk -->
                    <li>Stok: {{ $product->stock }}</li> <!-- Menghitung stok berdasarkan data purchases -->
                </ul>
            </div>

            <!-- Deskripsi Produk -->
            <div class="description-detail">
                <h2>Deskripsi:</h2>
                <p>{{ $product->description }}</p> <!-- Menampilkan deskripsi produk -->
            </div>
            
            <!-- Form untuk menambahkan ke keranjang -->
            <form action="{{ route('cart.store') }}" method="POST" class="add-to-cart-form">
                @csrf <!-- Token CSRF untuk keamanan -->
                
                <div class="quantity-detail">
                    <label for="quantity">jumlah :</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" required>
                </div>
                
                <input type="hidden" name="product_id" value="{{ $product->id }}"> <!-- Input tersembunyi untuk product_id -->
            
                <div class="buttons-detail" style="text-align: center;">
                    @if ($product->stock > 0)
                        <button type="submit" class="add-to-cart">Masukkan Keranjang</button>
                    @else
                        <span class="produk-text-danger">Stok Habis</span>
                    @endif
                </div>
            </form>
        </div>
    </div>

@endsection
