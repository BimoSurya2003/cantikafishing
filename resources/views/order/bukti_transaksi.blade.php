<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembayaran</title>

    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 12px;
            overflow: hidden;
        }
        .info-card {
            background: linear-gradient(135deg, #007bff, #6610f2);
            color: white;
        }
        .info-card h5 {
            font-size: 1.5rem;
        }
        .btn-primary {
            background: linear-gradient(135deg, #007bff, #6610f2);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #6610f2, #007bff);
        }
        .text-muted {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-4 text-center">Kirim Bukti Pembayaran</h2>

                <!-- Informasi tentang rekening dan metode pembayaran -->
                <div class="card p-4 shadow-sm mb-4 info-card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-3">Informasi Pembayaran</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent border-0 text-white"><strong>Nomor Dana:</strong> 089623153165</li>
                            <li class="list-group-item bg-transparent border-0 text-white"><strong>Nomor Gopay:</strong> 089623153165</li>
                        </ul>
                        <p class="text-white mt-3 text-center">Silakan transfer ke salah satu nomor di atas dan unggah bukti pembayaran.</p>
                    </div>
                </div>

                <!-- Informasi jumlah yang harus dibayar -->
                <div class="card p-4 shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3">Jumlah yang Harus Dibayar</h5>
                        <p class="h4 text-primary">Rp {{ number_format($total_price, 0, ',', '.') }}</p>
                        <p>Jika sudah Di Bayar Silahkan Upload Bukti Pembayaran</p>
                    </div>
                </div>

                <!-- Form untuk upload bukti pembayaran -->
                <form action="{{ route('pesanan.update', $bukti_bayar->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
                    @csrf
                    @method('PUT') <!-- Menggunakan method PUT untuk update -->

                    <div class="mb-3">
                        <label for="bukti_bayar" class="form-label">Unggah Bukti Pembayaran</label>
                        <input type="file" name="bukti_bayar" class="form-control" accept="image/png, image/jpeg, image/jpg" required>

                        <!-- Menampilkan error jika ada -->
                        @error('bukti_bayar')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Menampilkan gambar lama jika ada -->
                    @if($bukti_bayar->bukti_bayar)
                        <div class="mb-3">
                            <label class="form-label">File Sebelumnya:</label>
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $bukti_bayar->bukti_bayar) }}" alt="Bukti Bayar" class="img-thumbnail" width="200px">
                            </div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary px-4">Kirim Bukti</button>
                        <a href="{{ route('pesanan.index') }}" class="btn btn-secondary px-4">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Link ke Bootstrap JS dan Popper.js (opsional untuk fitur interaktif) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
