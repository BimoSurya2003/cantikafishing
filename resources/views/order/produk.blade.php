@extends('layout_order.main')
@section('addproduk')

<div class="product-list">
    @if($products->isEmpty())
        <p>Produk tidak ada</p>
    @else
        @foreach($products as $product)
            <div class="card">
                <a href="{{ route('product.show', $product->id) }}">
                    <img src="{{ asset($product->image) }}" alt="Image of {{ $product->product_name }}" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="produk-stok">
                            Tersedia: 
                            {{ $product->stock > 0 ? $product->stock : 'Habis' }}
                        </p>                        
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </a>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="form-control mb-2" style="width: 100px;">
                
                    @if ($product->stock > 0)
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    @else
                        <span class="produk-text-danger">Produk Habis</span>
                    @endif
                </form>
                
            </div>
        @endforeach
    @endif
</div>

{{ $products->links() }} 

@endsection
