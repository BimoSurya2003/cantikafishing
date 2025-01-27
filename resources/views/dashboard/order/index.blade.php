@extends('dashboard_layout.main')

@section('title', 'Daftar Order')
@section('navOrder', 'active')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h5 class="mb-0" style="color: white">Daftar Order</h5>
                </div>
                <form action="#" method="GET" class="mt-4">
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

                <div class="card-body">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th><i class="align-middle me-1" data-feather="hash"></i>No</th>
                                <th><i class="align-middle me-1" data-feather="calendar"></i>Tanggal Order</th>
                                <th><i class="align-middle me-1" data-feather="user"></i> Nama Pembeli</th>
                                {{-- <th><i class="align-middle me-1" data-feather="map-pin"></i> Alamat</th> --}}
                                {{-- <th><i class="align-middle me-1" data-feather="phone"></i> No Telepon</th> --}}
                                <th><i class="align-middle me-1" data-feather="dollar-sign"></i> Total Harga</th>
                                <th><i class="align-middle me-1" data-feather="dollar-sign"></i> Bukti pembayaran</th>
                                <th><i class="align-middle me-1" data-feather="truck"></i>Status Pesanan</th>
                                <th><i class="align-middle me-1" data-feather="eye"></i>Detail Pesanan</th>
                                <th><i class="align-middle me-1" data-feather="info"></i>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="text-center table-row-hover">
                                    <td>{{ $orders->firstItem() + $loop->index }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d-m-Y') }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    {{-- <td>{{ $order->alamat }}</td> --}}
                                    {{-- <td>{{ $order->telepon }}</td> --}}
                                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td><img src="{{ asset('storage/' . $order->bukti_bayar) }}" alt="-" class="img-fluid rounded" width="150px"></td>
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
                                    <td>
                                        <a href="/dashboard-order/{{ $order->id }}" class="btn btn-outline-success btn-sm shadow-sm rounded-pill" title="Lihat Detail">
                                            <i class="align-middle" data-feather="eye"></i> Lihat
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/dashboard-order/{{ $order->id }}/edit" class="btn btn-outline-warning btn-sm shadow-sm rounded-pill" title="Edit Order">
                                            <i class="align-middle" data-feather="edit"></i> Edit
                                        </a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="d-flex justify-content-end mt-3">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
