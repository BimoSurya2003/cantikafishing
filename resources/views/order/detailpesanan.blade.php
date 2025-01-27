@extends('layout_order.main')

@section('addproduk')
<h1 style="margin-bottom: 30px; text-align: center; font-size: 2rem; font-weight: 700; color: #333;">Rincian Pesanan Anda</h1>

<section class="main-card_rincian">
    @foreach ($orderitems as $orderitem)
        <article class="card_rincian">
            <img src="{{ asset($orderitem->product->image) }}" class="rincian-image" alt="{{ $orderitem->product->product_name }}">
            <div class="details">
                <h5 class="nama-rincian">{{ $orderitem->product->product_name }}</h5>
                <p><strong>Quantity:</strong> {{ $orderitem->quantity }}</p>
                <p><strong>Harga:</strong> Rp {{ number_format($orderitem->product->price, 0, ',', '.') }}</p>
            </div>
        </article>
    @endforeach

    

    <div class="tujuan">
        <p><strong>Tanggal Order :</strong> {{ \Carbon\Carbon::parse($orderitem->order->order_date)->format('d-m-Y') }}</p>
        <p><strong>No Telepon :</strong> {{ $orderitem->order->telepon }}</p>
        <p><strong>Alamat :</strong> {{ $orderitem->order->alamat }}</p>
    </div>

    <div style="margin-bottom: 10px; display: flex; justify-content: center; align-items: center; margin-top:20px; margin-bottom:20px;">
        <div class="card shadow-none" style="max-width: 100%; width: 100%; max-height: 300px; border-radius: 15px; overflow: hidden; text-align: center; padding: 20px;">
            @if($order->bukti_bayar)
                <img src="{{ asset('storage/' . $order->bukti_bayar) }}" class="img-fluid rounded shadow" style="max-width: 100%; max-height: 250px; border-radius: 10px;">
            @else
                <p class="text-muted" style="font-style: italic; color: #6c757d;">Belum ada bukti pembayaran.</p>
            @endif
        </div>
    </div>
    

    <div class="total-price">
        <p>Total Harga: Rp {{ number_format($orderitems->first()->order->total_price, 0, ',', '.') }}</p>
    </div>
</section>

<div class="kembali-button">
    <a href="{{ url()->previous() }}" class="btn">Kembali</a>
</div>
@endsection
