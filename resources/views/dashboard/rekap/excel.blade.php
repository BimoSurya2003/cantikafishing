<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Pesanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h5>Penjualan Produk</h5>
    <table>
        <thead>
            <tr>
                <th><strong>Tanggal Pesanan</strong></th>
                <th><strong>Nama Produk</strong></th>
                <th><strong>Nama Pembeli</strong></th>
                <th><strong>Email Pembeli</strong></th>
                <th><strong>Jumlah Produk</strong></th>
                <th><strong>Harga Produk</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderitems as $orderitem)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($orderitem->order->order_date)->format('d-m-Y') }}</td>
                    <td>{{ $orderitem->product->product_name }}</td>
                    <td>{{ $orderitem->order->user->name }}</td>
                    <td>{{ $orderitem->order->user->email }}</td>
                    <td>{{ $orderitem->quantity }}</td>
                    <td>Rp {{ number_format($orderitem->product->price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5>Pemancingan</h5>
    <table>
        <thead>
            <tr>
                <th><strong>Tanggal Booking</strong></th>
                <th><strong>Nama</strong></th>
                <th><strong>Kolam</strong></th>
                <th><strong>Jenis</strong></th>
                <th><strong>Tipe</strong></th>
                <th><strong>Harga</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($booking->tgl_booking)->format('d-m-Y') }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->kolam }}</td>
                    <td>{{ $booking->jenis_pemesanan }}</td>
                    <td>{{ $booking->harian_duration ?? '-' }}</td>
                    <td>Rp {{ number_format($booking->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th><strong>Produk Terjual</strong></th>
                <th><strong>Total Penjualan Produk</strong></th>
                <th><strong>Pemboking</strong></th>
                <th><strong>Total Pembokingan</strong></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $produkTerjual }}</td>
                <td>Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</td>
                <td>{{ $totalBookings }}</td>
                <td>Rp {{ number_format($totalPembokingan, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>
