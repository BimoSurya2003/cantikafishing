@extends('dashboard_layout.main')
@section('title', 'Daftar Order Item')
@section('navOrderitem', 'active')

@section('contents')
<div class="container">
    <!-- Informasi Order -->
    <div class="row mb-4">
        <!-- Kolom Kiri (Informasi Order) -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-primary text-white rounded-top">
                    <h5 class="mb-0 text-center" style="color: white">Informasi Order</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td><strong>Nama Pembeli</strong></td>
                            <td class="text-muted">:</td>
                            <td>{{ $order->user->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tgl Order</strong></td>
                            <td class="text-muted">:</td>
                            <td>{{ \Carbon\Carbon::parse($order->order_date ?? '-')->format('d-m-y') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td class="text-muted">:</td>
                            <td>{{ $order->alamat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>No Telepon</strong></td>
                            <td class="text-muted">:</td>
                            <td>{{ $order->telepon ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Total Harga</strong></td>
                            <td class="text-muted">:</td>
                            <td><span class="badge bg-success">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td class="text-muted">:</td>
                            <td>
                                @switch($order->status)
                                    @case('Unpaid')
                                        <span class="badge bg-danger">Belum Dibayar</span>
                                        @break
                                    @case('Paid')
                                        <span class="badge bg-success">Sudah Dibayar</span>
                                        @break
                                    @case('Processing')
                                        <span class="badge bg-warning text-dark">Sedang Diproses</span>
                                        @break
                                    @case('Shipped')
                                        <span class="badge bg-primary">Dikirim</span>
                                        @break
                                    @case('Completed')
                                        <span class="badge bg-info">Selesai</span>
                                        @break
                                    @case('Canceled')
                                        <span class="badge bg-secondary">Dibatalkan</span>
                                        @break
                                    @default
                                        <span class="badge bg-light text-dark">Tidak Diketahui</span>
                                @endswitch
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan (Gambar Bukti Pembayaran) -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-primary text-white rounded-top">
                    <h5 class="mb-0 text-center" style="color: white">Bukti Pembayaran</h5>
                </div>
                <div class="card-body text-center">
                    @if($order->bukti_bayar)
                        <img src="{{ asset('storage/' . $order->bukti_bayar) }}" class="img-fluid rounded shadow" style="max-width: 100%; max-height: 250px;">
                    @else
                        <p class="text-muted">Belum ada bukti pembayaran.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Order Items -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top">
                    <h5 class="mb-0 text-center" style="color: white">Daftar Item Order</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered align-middle">
                        <thead class="bg-light text-primary text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Produk</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderitems as $orderitem)
                                <tr class="text-center table-row-hover">
                                    <td>{{ $orderitems->firstItem() + $loop->index }}</td>
                                    <td>{{ $orderitem->product->product_name }}</td>
                                    <td>{{ $orderitem->quantity }}</span></td>
                                    <td class="text-primary">Rp {{ number_format($orderitem->product->price, 0, ',', '.') }}</td>
                                    <td>
                                        <img src="{{ asset($orderitem->product->image) }}" class="img-thumbnail rounded" style="max-width: 70px; max-height: 70px;">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-3">
                        {{ $orderitems->links() }}
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="mt-3 text-center">
                        <a href="/dashboard-order" class="btn btn-outline-primary px-4 py-2 rounded-pill"><i class="fas fa-arrow-left me-2"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
