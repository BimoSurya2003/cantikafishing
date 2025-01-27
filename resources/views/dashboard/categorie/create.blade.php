@extends('dashboard_layout.main')

@section('contents')
<div class="container">
    <div class="mb-4 text-center">
        <h2>Input Data Categorie</h2>
    </div>
    
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="/dashboard-categorie" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" 
                            value="{{ old('category_name') }}" name="category_name" 
                            aria-describedby="category_name" placeholder="Masukkan nama Kategori">
                        @error('category_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
