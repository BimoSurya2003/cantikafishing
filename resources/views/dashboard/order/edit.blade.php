@extends('dashboard_layout.main')
@section('title', 'Detail Order')
@section('navOrder', 'active')
@section('contents')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0" style="color: white">Detail Order {{ $order->id }}</h5>
        </div>
        <div class="card-body">
            <h6 class="card-title">Informasi Order</h6>
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Nama Pembeli:</strong> {{ $order->user->name }}</li>
                <li class="list-group-item"><strong>Tanggal Order:</strong> {{ $order->order_date }}</li>
                <li class="list-group-item"><strong>Total Harga:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Telepon:</strong> {{ $order->telepon }}</li>
                <li class="list-group-item"><strong>Status:</strong> 
                    <span class="badge 
                        {{ $order->status == 'Completed' ? 'bg-success' : ($order->status == 'Canceled' ? 'bg-danger' : 'bg-warning') }}">
                        {{ 
                            $order->status == 'Completed' ? 'Selesai' : 
                            ($order->status == 'Canceled' ? 'Dibatalkan' : 
                            ($order->status == 'Unpaid' ? 'Belum Dibayar' : 
                            ($order->status == 'Paid' ? 'Sudah Dibayar' : 
                            ($order->status == 'Processing' ? 'Diproses' : 
                            ($order->status == 'Shipped' ? 'Dikirim' : 'Status Tidak Dikenali')))))
                        }}
                    </span>
                </li>
                
            </ul>

            <h6 class="mt-4">Edit Status</h6>
            <form action="/dashboard-order/{{ $order->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">Pilih Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="unpaid" {{ $order->status == 'Unpaid' ? 'selected' : '' }}>Belum Dibayar</option>
                        <option value="paid" {{ $order->status == 'Paid' ? 'selected' : '' }}>Sudah Dibayar</option>
                        <option value="processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Diproses</option>
                        <option value="shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Dikirim</option>
                        <option value="completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Selesai</option>
                        <option value="canceled" {{ $order->status == 'Canceled' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Status</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            Silakan periksa kembali informasi order sebelum memperbarui status.
        </div>
    </div>
</div>
@endsection
