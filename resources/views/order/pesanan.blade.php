@extends('layout_order.main')
@section('addproduk')

<h1 class="judul-rincian">Pesanan Anda</h1>
@if ($orders->isEmpty())
    <p class="pesanan-kosong">Pesanan Anda kosong. Silakan melakukan pemesanan.</p>
@else
    <div class="pesanan-container">
        <div class="pesanan-list">
            @foreach ($orders as $order)
                <div class="pesanan-item">
                    <a href="/pesanan/{{ $order->id }}" class="pesanan-summary">
                        <div class="pesanan-details">
                            <div class="pesanan-date-item">
                                <label>Tanggal Pesanan:</label>
                                <span id="order-date">{{ \Carbon\Carbon::parse($order->order_date)->format('d-m-Y') }}</span>
                            </div>
                            <div class="pesanan-status-item">
                                <label>Status Pesanan:</label>
                                <span id="order-status">
                                    @switch($order->status)
                                        @case('Unpaid')
                                            <span style="color: red">Belum Dibayar</span>
                                        @break
                                        @case('Paid')
                                            <span style="color: green">Sudah Dibayar</span>
                                        @break
                                        @case('Processing')
                                            <span style="color: orange">Sedang Diproses</span>
                                        @break
                                        @case('Shipped')
                                            <span style="color: blue">Dikirim</span>
                                        @break
                                        @case('Completed')
                                            <span style="color: cornflowerblue">Selesai</span>
                                        @break
                                        @case('Canceled')
                                            <span style="color: grey">Dibatalkan</span>
                                        @break
                                        @default
                                            <span style="color: black">Tidak Diketahui</span>
                                    @endswitch
                                </span>
                            </div>
                        </div>
                    </a>
                    <div class="bukti-transaksi">
                        <a href="/pesanan/{{ $order->id }}/edit" class="btn-transaksi">Kirim Bukti Transaksi</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
@endsection
