@extends('dashboard_layout.main')

@section('contents')
<div class="container">
    <div class="mb-4 text-center">
        <h2>Edit Data Kategori</h2>
    </div>
    
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-body">
                <!-- Pastikan action mengarah ke URL dengan ID kategori -->
                <form action="/dashboard-categorie/{{ $categorie->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Menggunakan PUT untuk update -->
                    
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Nama Kategori</label>
                        <!-- Tampilkan nilai lama jika ada, jika tidak gunakan data dari kategori yang di-edit -->
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" 
                            value="{{ old('category_name', $categorie->category_name) }}" 
                            name="category_name" aria-describedby="category_name" 
                            placeholder="Masukkan nama Kategori" required>
                        @error('category_name')
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
