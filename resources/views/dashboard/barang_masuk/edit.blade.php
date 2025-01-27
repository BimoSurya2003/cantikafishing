@extends('dashboard_layout.main')

@section('contents')
<div class="container">
    <div class="mb-4 text-center">
        <h2>Edit Data Barang Masuk</h2>
    </div>

    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="/dashboard-barang_masuk/{{ $barangMasuk->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Menandakan bahwa ini adalah permintaan update -->

                    <!-- Pilih Produk -->
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Nama Produk</label>
                        <select name="product_id" class="form-select @error('product_id') is-invalid @enderror" required>
                            <option disabled selected value="">--Pilih Produk--</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $barangMasuk->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->product_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Nama Supplier -->
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control @error('supplier') is-invalid @enderror" 
                            value="{{ old('supplier', $barangMasuk->supplier) }}" name="supplier" 
                            placeholder="Masukkan nama supplier">
                        @error('supplier')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Jumlah Barang Masuk -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah Barang Masuk</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" 
                            value="{{ old('quantity', $barangMasuk->quantity) }}" name="quantity" min="1" 
                            placeholder="Masukkan jumlah barang masuk">
                        @error('quantity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Harga Barang Masuk -->
                    <div class="mb-3">
                        <label for="harga_beli" class="form-label">Harga Barang Masuk (Rp)</label>
                        <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" 
                            value="{{ old('harga_beli', $barangMasuk->harga_beli) }}" name="harga_beli" 
                            min="0" placeholder="Masukkan harga barang masuk">
                        @error('harga_beli')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Tanggal Masuk -->
                    <div class="mb-3">
                        <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" 
                            value="{{ old('tgl_masuk', \Carbon\Carbon::parse($barangMasuk->tgl_masuk)->format('Y-m-d')) }}" 
                            name="tgl_masuk" placeholder="Masukkan tanggal barang masuk">
                        @error('tgl_masuk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>                    

                    <!-- Keterangan -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                            name="keterangan" rows="4" placeholder="Masukkan keterangan produk">{{ old('keterangan', $barangMasuk->keterangan) }}
                        </textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Gambar Produk (Opsional) -->
                    <div class="mb-4">
                        <label for="image" class="form-label">Bukti Resi</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                    
                        @if(isset($barangMasuk->image) && $barangMasuk->image)  <!-- Mengecek apakah ada gambar sebelumnya -->
                            <div class="mt-2">
                                <label>Gambar Sebelumnya:</label>
                                <img src="{{ asset('storage/'.$barangMasuk->image) }}" alt="Bukti Resi" class="img-fluid" style="max-width: 200px;">
                            </div>
                        @endif
                    
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>                    

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
