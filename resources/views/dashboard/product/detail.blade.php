@extends('dashboard_layout.main')

@section('contents')

<div class="container">
    <div>
        <h1 class="mb-4 text-center">Detail Data Produk</h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="font-weight-bold text-primary"><i class="align-middle" data-feather="box"></i> <strong>Informasi Produk</strong></h5>
                    <table class="table">
                        <tr>
                            <td><strong>Nama Produk</strong></td>
                            <td>:</td>
                            <td>{{ $product->product_name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Harga Produk</strong></td>
                            <td>:</td>
                            <td>Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Stok Produk</strong></td>
                            <td>:</td>
                            <td>
                                @if($product->stock > 0)
                                    {{ $product->stock }}
                                @else
                                    Tidak ada stok
                                @endif
                            </td>
                            
                        </tr>                        
                        <tr>
                            <td><strong>Kategori</strong></td>
                            <td>:</td>
                            <td>{{ $product->categorie->category_name }}</td>
                        </tr>
                        
                        
                    </table>
                </div>
                <div class="col-md-6 text-center">
                    <h5 class="font-weight-bold text-primary"><i class="align-middle" data-feather="image"></i> <strong>Gambar</strong></h5>
                    <img src="{{ asset($product->image) }}" alt="{{ $product->product_name }}" class="img-fluid rounded" style="max-width: 250px; max-height: 250px;">
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="font-weight-bold text-primary"><i class="align-middle" data-feather="edit"></i> <strong>Deskripsi Produk</strong></h5>
            <p>{{ $product->description }}</p>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="/dashboard-product/" class="btn btn-primary"><i class="align-middle" data-feather="arrow-left"></i> Kembali</a>
    </div>
</div>
@endsection
