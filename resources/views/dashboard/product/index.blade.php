@extends('dashboard_layout.main')
@section('title', 'Daftar Produk')
@section('navProduct', 'active')

@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h5 class="mb-0" style="color: white">Daftar Produk</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="GET" class="mt-2">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="search" class="form-control" placeholder="Cari Product..." value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="align-middle" data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Tombol Tambah Produk -->
                        <div class="d-flex justify-content-between mb-4">
                            <a href="/dashboard-product/create" class="btn btn-primary btn-lg shadow-sm rounded-pill">
                                <i class="align-middle me-2" data-feather="plus-circle"></i> Tambah Produk
                            </a>
                        </div>
                        <!-- Tabel Produk -->
                        <table class="table table-striped table-hover table-bordered align-middle">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th><i class="align-middle me-1" data-feather="hash"></i>No</th>
                                    <th><i class="align-middle me-1" data-feather="box"></i>Nama Produk</th>
                                    <th><i class="align-middle me-1" data-feather="dollar-sign"></i>Harga Product</th>
                                    <th><i class="align-middle me-1" data-feather="layers"></i>Stok Tersedia</th>
                                    <th><i class="align-middle me-1" data-feather="file-text"></i>Deskripsi</th>
                                    <th><i class="align-middle me-1" data-feather="image"></i>Gambar</th>
                                    <th><i class="align-middle me-1" data-feather="info"></i>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="text-center table-row-hover">
                                        <td>{{ $products->firstItem() + $loop->index }}</td>
                                        <td><strong>{{ $product->product_name }}</strong></td>
                                        <td class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($product->stock > 0)
                                                <span class="badge bg-success">{{ $product->stock }}</span>
                                            @else
                                                <span class="badge bg-danger">Habis</span>
                                            @endif
                                        </td>
                                        
                                        <td>{{ Str::limit($product->description, 50) }}</td>
                                        <td>
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->product_name }}" class="img-thumbnail rounded" style="max-width: 70px; max-height: 70px;">
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="/dashboard-product/{{ $product->id }}" class="btn btn-outline-success btn-sm me-2" title="Lihat Detail">
                                                <i class="align-middle" data-feather="eye"></i>
                                            </a>
                                            <a href="/dashboard-product/{{ $product->id }}/edit" class="btn btn-outline-warning btn-sm me-2" title="Edit">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </a>
                                            <form action="/dashboard-product/{{ $product->id }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')" title="Hapus">
                                                    <i class="align-middle" data-feather="trash-2"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-end mt-3">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
