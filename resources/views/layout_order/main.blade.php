<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CantikaFishing</title>

    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="/style/styleku.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('layout_order.header')  <!-- Menyertakan header -->
    <main>
        <div class="container-order">
            @include('layout_order.sidebar')  <!-- Menyertakan sidebar -->
            <div class="main-content">
                @yield('addproduk')  <!-- Bagian untuk konten produk -->
            </div>
        </div>
    </main>

    <script>
        feather.replace();  // Mengganti ikon feather
    </script>
    <script src="/style/styleku.js"></script>

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
