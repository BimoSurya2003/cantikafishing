@extends('dashboard_layout.main')

@section('contents')
<div class="container">
    <div class="mb-4 text-center">
        <h2>Edit Data Produk</h2>
    </div>
    
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="/dashboard-product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Metode untuk mengedit data -->
                    
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" 
                            value="{{ old('product_name', $product->product_name) }}" name="product_name" 
                            aria-describedby="product_name" placeholder="Masukkan nama produk" required>
                        @error('product_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Jumlah Produk</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" 
                            value="{{ old('stock', $product->stock) }}" name="stock" 
                            aria-describedby="stock" placeholder="Masukkan jumlah pembelian">
                        @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga Produk (IDR)</label>
                        <input type="number" min="0" class="form-control @error('price') is-invalid @enderror" 
                            value="{{ old('price', $product->price) }}" name="price" 
                            aria-describedby="price" placeholder="Masukkan harga produk" required>
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                name="description" rows="4" placeholder="Masukkan deskripsi produk" required>{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select name="category_id" class="form-select" required>
                            <option disabled selected>-- Piliihan Kategori --</option>
                                @foreach ($categories as $categorie)
                                    @if (old('category_id',$product->category_id) == $categorie->id)
                                    <option value="{{ $categorie->id }}" selected>{{ $categorie->category_name }}</option>
                                    @else
                                    <option value="{{ $categorie->id }}">{{ $categorie->category_name }}</option>
                                    @endif
                                @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                            name="image" id="image">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                        
                        <!-- Menampilkan gambar sebelumnya -->
                        @if($product->image)
                            <div class="mt-2">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->product_name }}" 
                                    style="max-width: 150px; max-height: 150px; border: 1px solid #ddd; border-radius: 5px;">
                                <p class="mt-2">Gambar sebelumnya</p>
                            </div>
                        @endif
                        
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
