@extends('dashboard_layout.main')

@section('title', 'Daftar Order Item')
@section('navOrderitem', 'active')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h5 class="mb-0" style="color: white">Daftar Order Item</h5>
                </div>
                <form action="#" method="GET" class="mt-4">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" class="form-control" placeholder="Cari Item..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="align-middle" data-feather="search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th><i class="align-middle me-1" data-feather="hash"></i> No</th>
                                <th><i class="align-middle me-1" data-feather="calendar"></i> Tanggal Order</th>
                                <th><i class="align-middle me-1" data-feather="user"></i> Nama Pembeli</th>
                                <th><i class="align-middle me-1" data-feather="box"></i> Produk</th>
                                <th><i class="align-middle me-1" data-feather="layers"></i> Jumlah Produk</th>
                                <th><i class="align-middle me-1" data-feather="dollar-sign"></i> Harga Produk</th>
                                <th><i class="align-middle me-1" data-feather="image"></i> Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderitems as $orderitem)
                                <tr class="text-center table-row-hover">
                                    <td>{{ $orderitems->firstItem() + $loop->index }}</td>
                                    <td>{{ \Carbon\Carbon::parse($orderitem->order->order_date)->format('d-m-Y') }}</td>
                                    <td>{{ $orderitem->order->user->name }}</td>
                                    <td>{{ $orderitem->product->product_name }}</td>
                                    <td><span class="badge bg-success">{{ $orderitem->quantity }}</span></td>
                                    <td>Rp {{ number_format($orderitem->product->price, 0, ',', '.') }}</td>
                                    <td>
                                        <img src="{{ asset($orderitem->product->image) }}" alt="{{ $orderitem->product->product_name }}" class="img-thumbnail shadow-sm" style="max-width: 70px; max-height: 70px;">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="d-flex justify-content-end mt-3">
                        {{ $orderitems->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
