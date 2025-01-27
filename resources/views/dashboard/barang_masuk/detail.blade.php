@extends('dashboard_layout.main')

@section('contents')

<div class="container">
    <div>
        <h1 class="mb-4 text-center">Detail Barang Masuk</h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="font-weight-bold text-primary"><i class="align-middle" data-feather="box"></i> <strong>Informasi Barang Masuk</strong></h5>
                    <table class="table">
                        <tr>
                            <td><strong>Nama Produk</strong></td>
                            <td>:</td>
                            <td>{{ $barangMasuk->product->product_name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Supplier</strong></td>
                            <td>:</td>
                            <td>{{ $barangMasuk->supplier }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Produk</strong></td>
                            <td>:</td>
                            <td>{{ $barangMasuk->quantity }}</td>
                        </tr>
                        <tr>
                            <td><strong>Harga Beli (Rp)</strong></td>
                            <td>:</td>
                            <td>Rp {{ number_format($barangMasuk->harga_beli, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Masuk</strong></td>
                            <td>:</td>
                            <td>{{ \Carbon\Carbon::parse($barangMasuk->tgl_masuk)->format('d-m-Y') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6 text-center">
                    <h5 class="font-weight-bold text-primary"><i class="align-middle" data-feather="image"></i> <strong>Foto Resi</strong></h5>
                    @if($barangMasuk->image)
                        <img src="{{ asset('storage/' . $barangMasuk->image) }}" alt="Gambar Produk" class="img-fluid rounded" style="max-width: 250px; max-height: 250px;">
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="font-weight-bold text-primary"><i class="align-middle" data-feather="edit"></i> <strong>Keterangan</strong></h5>
            <p>{{ $barangMasuk->keterangan }}</p>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="/dashboard-barang_masuk" class="btn btn-primary"><i class="align-middle" data-feather="arrow-left"></i> Kembali</a>
    </div>
</div>

@endsection
