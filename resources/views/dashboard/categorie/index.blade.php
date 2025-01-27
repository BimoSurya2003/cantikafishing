@extends('dashboard_layout.main')

@section('title', 'Daftar Kategori Produk')

@section('navCategorie', 'active')

@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h5 class="mb-0" style="color: white">Daftar Kategori Produk</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="GET" class="mt-2">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="search" class="form-control" placeholder="Cari Kategori Produk..." value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="align-middle" data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Tombol Tambah Kategori -->
                        <div class="d-flex justify-content-between mb-4">
                            <a href="/dashboard-categorie/create" class="btn btn-primary btn-lg shadow-sm rounded-pill">
                                <i class="align-middle me-2" data-feather="plus-circle"></i> Tambah Kategori
                            </a>
                        </div>
                        <!-- Tabel Kategori -->
                        <table class="table table-striped table-hover table-bordered align-middle">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th><i class="align-middle me-1" data-feather="hash"></i>No</th>
                                    <th><i class="align-middle me-1" data-feather="tag"></i>Nama Kategori</th>
                                    <th><i class="align-middle me-1" data-feather="info"></i>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $categorie)
                                    <tr class="text-center table-row-hover">
                                        <td>{{ $categories->firstItem() + $loop->index }}</td>
                                        <td><strong>{{ $categorie->category_name }}</strong></td>
                                        <td class="text-nowrap">
                                            <a href="/dashboard-categorie/{{ $categorie->id }}" class="btn btn-outline-success btn-sm me-2" title="Lihat Detail">
                                                <i class="align-middle" data-feather="eye"></i>
                                            </a>
                                            <a href="/dashboard-categorie/{{ $categorie->id }}/edit" class="btn btn-outline-warning btn-sm me-2" title="Edit">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </a>
                                            <form action="/dashboard-categorie/{{ $categorie->id }}" method="POST" class="d-inline">
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
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
