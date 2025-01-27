<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert2 for custom alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Optional: Custom styles -->
    <style>
        .card-custom {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header-custom {
            background-color: #007bff;
            color: white;
        }
        .container-custom {
            max-width: 900px;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="container mt-5 container-custom">
        <h2 class="mb-4 text-center">Form Daftar / Booking</h2>

        <!-- Form untuk input booking -->
        <div class="card card-custom">
            <div class="card-header card-header-custom">
                <h5 class="card-title mb-0">Silahkan Isikan Data Untuk Melakukan Daftar / Booking</h5>
            </div>
            <div class="card-body">
                <form action="/booking" method="POST" onsubmit="handleFormSubmit()">
                    @csrf
                    <div class="form-group">
                        <label for="kolam">Pilih Kolam:</label>
                        <select name="kolam" id="kolam" class="form-control" onchange="calculatePrice()">
                            <option disabled selected value="">--Pilih--</option>
                            <option value="kolam_1">Kolam 1</option>
                            <option value="kolam_2">Kolam 2</option>
                            <option value="kolam_3">Kolam 3</option>
                        </select>
                    </div>
                
                    <div class="form-group mt-3">
                        <label for="jenis_pemesanan">Jenis Pemesanan:</label>
                        <select name="jenis_pemesanan" id="jenis_pemesanan" class="form-control" onchange="toggleDurationOption(); calculatePrice();">
                            <option disabled selected value="">--Pilih--</option>
                            <option value="harian">Harian</option>
                            <option value="jam">2 Jam 7kg</option>
                            <option value="kiloan">Kiloan 3 kg</option>
                        </select>
                    </div>
                
                    <!-- Pilihan Durasi untuk Harian -->
                    <div id="harian_duration" class="form-group mt-3 hidden">
                        <label for="durasi">Pilih Durasi:</label>
                        <select name="harian_duration" id="durasi" class="form-control" onchange="calculatePrice()">
                            <option disabled selected value="">--Pilih Durasi--</option>
                            <option value="setengah_hari">Setengah Hari</option>
                            <option value="seharian">Seharian</option>
                        </select>
                    </div>
                
                    <div class="form-group mt-3">
                        <label for="tgl_booking">Tanggal Booking:</label>
                        <input type="date" name="tgl_booking" id="tgl_booking" class="form-control" required>
                    </div>

                    <!-- Menampilkan harga -->
                    <div class="form-group mt-3">
                        <label for="harga">Harga:</label>
                        <input type="text" id="harga" class="form-control" readonly>
                    </div>
                
                    <button type="submit" class="btn btn-primary mt-3">Pesan Sekarang</button>
                </form>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-3 text-center">
            <a href="/pemancingan" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 Script -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                timer: 3000,
                showConfirmButton: false,
                willClose: () => {
                    window.location.reload(); // Reload page after alert
                }
            });
        </script>
    @endif

    <script>
        // Fungsi untuk menghitung harga
        function calculatePrice() {
            var jenisPemesanan = document.getElementById('jenis_pemesanan').value;
            var harga = 0;

            // Menentukan harga berdasarkan jenis pemesanan
            if (jenisPemesanan == 'harian') {
                var durasi = document.getElementById('durasi') ? document.getElementById('durasi').value : null;
                if (durasi == 'setengah_hari') {
                    harga = 36000; // Harga setengah hari
                } else if (durasi == 'seharian') {
                    harga = 72000; // Harga seharian
                } else {
                    harga = 0; // Belum memilih durasi
                }
            } else if (jenisPemesanan == 'jam') {
                harga = 252000; // Harga per jam
            } else if (jenisPemesanan == 'kiloan') {
                harga = 108000; // Harga kiloan
            }

            // Menampilkan harga di input harga
            document.getElementById('harga').value = 'Rp ' + harga.toLocaleString();
        }

        // Fungsi untuk menampilkan atau menyembunyikan pilihan durasi untuk harian
        function toggleDurationOption() {
            var jenisPemesanan = document.getElementById('jenis_pemesanan').value;
            var durasiDiv = document.getElementById('harian_duration');

            if (jenisPemesanan == 'harian') {
                durasiDiv.classList.remove('hidden');
            } else {
                durasiDiv.classList.add('hidden');
            }

            calculatePrice(); // Update harga saat jenis pemesanan berubah
        }

        // Fungsi untuk menghapus nilai durasi jika jenis pemesanan bukan harian
        function handleFormSubmit() {
            var jenisPemesanan = document.getElementById('jenis_pemesanan').value;

            // Jika jenis pemesanan bukan 'harian', kosongkan nilai durasi
            if (jenisPemesanan !== 'harian') {
                document.getElementById('durasi').value = '';
            }
        }

        // Inisialisasi harga saat pertama kali halaman dimuat
        window.onload = calculatePrice;
    </script>
</body>
</html>
