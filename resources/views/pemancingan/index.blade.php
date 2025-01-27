<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cantika Fishing</title>
    <link rel="stylesheet" href="/style/pemancingan.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <span class="brand">Cantika<span class="highlight">Fishing</span></span>
            </div>
            <nav>
                <a href="/">Home</a>
                <a href="/">Category</a>    
                <a href="/">About</a>
                <a href="/">Product</a>
                <a href="/">Event</a>
                <a href="/">Contact</a>
                @auth
                    <a href="/product">Belanja</a>
                @else
                    <a href="/login">Belanja</a>
                @endauth
            </nav>
            <div class="auth-buttons">
                @auth
                    <a href="/logout" title="keluar"><i data-feather="log-out"></i></a> 
                @else
                    <a href="/login" title="masuk"><i data-feather="log-in"></i></a>
                @endauth
            </div>
        </div>
    </header>

    <div class="main-container">
        <!-- Card pertama -->
        <div class="card">
            <img src="/images/baner.jpg" alt="Image cap" class="card-img">
            <h2>Selamat Datang Di Kolam Pemancingan Cantika </h2>
            <p>Silahkan Daftar Dan Melakukan Pembokingan di bagian Bawah Sini.</p>
            <a href="/booking/create" class="card-button">Datar / Booking</a>
        </div>

        <div class="table-container mt-5">
            <h3>Riwayat Pembokingan Anda</h3><br>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tempat</th>
                        <th>Tanggal Booking</th>
                        <th>Jenis Pemancingan</th>
                        <th>Tipe pemancingan</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $booking->kolam)) }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->tgl_booking)->format('d-m-Y') }}</td>
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
                            <td>
                                @if($booking->status == 'pending')
                                    <form action="/pemancingan/{{ $booking->id }}/cancel" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" style="background-color: #dc3545; border: none; color: white; border-radius: 4px; padding: 3px 11px;">Batal</button>
                                    </form>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada pemesanan.</td>
                        </tr>
                    @endforelse
                </tbody>                
            </table>
        </div>
        
    </div>

    <script>
        feather.replace(); // Mengganti ikon feather
    </script>
    
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session("success") }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
    @endif
</body>
</html>
