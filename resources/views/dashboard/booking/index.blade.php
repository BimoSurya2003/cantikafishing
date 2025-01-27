@extends('dashboard_layout.main')
@section('title', 'Daftar Booking')
@section('navBooking', 'active')

@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h5 class="mb-0" style="color: white">Daftar Pemboking</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="GET" class="mt-2 mb-4">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="search" class="form-control" placeholder="Cari Nama..." value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="align-middle" data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Tabel Booking -->
                        <table class="table table-striped table-hover table-bordered align-middle">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th><i class="align-middle me-1" data-feather="hash"></i>No</th>
                                    <th><i class="align-middle me-1" data-feather="user"></i>Nama Pemboking</th>
                                    <th><i class="align-middle me-1" data-feather="calendar"></i>Tanggal Booking</th>
                                    <th><i class="align-middle me-1" data-feather="square"></i>Kolam</th>
                                    <th><i class="align-middle me-1" data-feather="menu"></i>Jenis</th>
                                    <th><i class="align-middle me-1" data-feather="box"></i>Tipe</th>
                                    <th><i class="align-middle me-1" data-feather="dollar-sign"></i>Harga</th>
                                    <th><i class="align-middle me-1" data-feather="layers"></i>Status</th>
                                    <th><i class="align-middle me-1" data-feather="info"></i>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr class="text-center table-row-hover">
                                        <td>{{ $bookings->firstItem() + $loop->index }}</td>
                                        <td><strong>{{ $booking->user->name }}</strong></td>
                                        <td>{{ \Carbon\Carbon::parse($booking->tgl_booking)->format('d-m-Y') }}</td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $booking->kolam)) }}</td>
                                        <td>{{ ucfirst($booking->jenis_pemesanan) }}</td>
                                        <td>{{ $booking->harian_duration ? ucfirst(str_replace('_', ' ', $booking->harian_duration)) : '-' }}</td>
                                        <td>Rp{{ number_format($booking->harga, 0, ',', '.') }}</td>
                                        <td>
                                            @if($booking->status == 'confirmed')
                                                <span class="badge bg-success">Terkonfirmasi</span>
                                            @elseif($booking->status == 'pending')
                                                <span class="badge bg-warning">Menunggu</span>
                                            @else
                                                <span class="badge bg-danger">Dibatalkan</span>
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="/booking/{{ $booking->id }}/edit" class="btn btn-outline-warning btn-sm me-2" title="Edit">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </a>
                                            <form action="/booking/{{ $booking->id }}" method="POST" class="d-inline">
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
                            {{ $bookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
