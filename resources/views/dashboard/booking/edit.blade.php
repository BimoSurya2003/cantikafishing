@extends('dashboard_layout.main')

@section('title', 'Edit Booking')
@section('navOrder', 'active')

@section('contents')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0" style="color: white">Edit Status Booking {{ $booking->id }}</h5>
        </div>
        <div class="card-body">
            <h6 class="card-title">Informasi Booking</h6>
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Nama Pembeli:</strong> {{ $booking->user->name }}</li>
                <li class="list-group-item"><strong>Tanggal Booking:</strong> {{ $booking->tgl_booking }}</li>
                <li class="list-group-item"><strong>Kolam:</strong> {{ ucfirst(str_replace('_', ' ', $booking->kolam)) }}</li>
                <li class="list-group-item"><strong>Jenis Pemesanan:</strong> {{ ucfirst($booking->jenis_pemesanan) }}</li>
                <li class="list-group-item"><strong>Harga:</strong> Rp {{ number_format($booking->harga, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Status:</strong> 
                    <span class="badge 
                        {{ $booking->status == 'confirmed' ? 'bg-success' : ($booking->status == 'canceled' ? 'bg-danger' : 'bg-warning') }}">
                        {{ 
                            $booking->status == 'pending' ? 'Menunggu' : 
                            ($booking->status == 'confirmed' ? 'Terkonfirmasi' : 
                            ($booking->status == 'canceled' ? 'Dibatalkan' : 'Status Tidak Dikenali')) }}
                    </span>
                </li>
            </ul>

            <h6 class="mt-4">Edit Status Booking</h6>
            <form action="/booking/{{ $booking->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Terkonfirmasi</option>
                        <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Booking</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            Pastikan data sudah benar sebelum memperbarui booking.
        </div>
    </div>
</div>
@endsection
