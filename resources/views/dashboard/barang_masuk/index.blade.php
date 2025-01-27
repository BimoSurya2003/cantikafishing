@extends('dashboard_layout.main')
@section('title', 'Daftar Barang Masuk')
@section('navBarangMasuk', 'active')

@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h5 class="mb-0" style="color: white">Daftar Barang Masuk</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="GET" class="mt-2">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="align-middle" data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Tombol Tambah barang -->
                        <div class="d-flex justify-content-between mb-4 mt-3">
                            <a href="/dashboard-barang_masuk/create" class="btn btn-primary btn-lg shadow-sm rounded-pill">
                                <i class="align-middle me-2" data-feather="plus-circle"></i> Tambah Barang Masuk
                            </a>
                        </div>
                        <!-- Tabel barang masuk -->
                        <table class="table table-striped table-hover table-bordered align-middle">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th><i class="align-middle me-1" data-feather="hash"></i>No</th>
                                    <th><i class="align-middle me-1" data-feather="calendar"></i>Tanggal Masuk</th>
                                    <th><i class="align-middle me-1" data-feather="box"></i>Nama Produk</th>
                                    <th><i class="align-middle me-1" data-feather="box"></i>Suplier</th>
                                    <th><i class="align-middle me-1" data-feather="layers"></i>Jumlah Stok</th>
                                    <th><i class="align-middle me-1" data-feather="dollar-sign"></i>Harga beli</th>
                                    <th><i class="align-middle me-1" data-feather="info"></i>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangMasuks as $barangMasuk)
                                    <tr class="text-center table-row-hover">
                                        <td>{{ $barangMasuks->firstItem() + $loop->index }}</td>
                                        <td>{{ \Carbon\Carbon::parse($barangMasuk->tgl_masuk)->format('d-m-Y') }}</td>
                                        <td><strong>{{ $barangMasuk->product->product_name }}</strong></td>
                                        <td><strong>{{ $barangMasuk->supplier }}</strong></td>
                                        <td><span class="badge bg-success">{{ $barangMasuk->quantity }}</span></td>
                                        <td class="text-primary">Rp {{ number_format($barangMasuk->harga_beli, 0, ',', '.') }}</td>
                                        <td class="text-nowrap">
                                            <a href="/dashboard-barang_masuk/{{ $barangMasuk->id }}" class="btn btn-outline-success btn-sm me-2" title="Lihat Detail">
                                                <i class="align-middle" data-feather="eye"></i>
                                            </a>
                                            {{-- <a href="/dashboard-barang_masuk/{{ $barangMasuk->id }}/edit" class="btn btn-outline-warning btn-sm me-2" title="Edit">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </a> --}}
                                            <form action="/dashboard-barang_masuk/{{ $barangMasuk->id }}" method="POST" class="d-inline">
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
                            {{ $barangMasuks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
