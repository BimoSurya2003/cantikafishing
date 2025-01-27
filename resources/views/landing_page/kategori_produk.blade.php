<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CantikaFishing</title>

    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="/style/styleku.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <span class="brand"
                    >Cantika<span class="highlight">Fishing</span></span
                >
            </div>
            <form action="{{ route('products.search') }}" method="GET">
                <div class="search-container">
                    <input type="text" placeholder="Cari produk..." name="query" id="search"  value="{{ request()->query('query') }}"/>
                    <button type="submit" id="search-btn"><i data-feather="search"></i></button>
                </div>
            </form>
            <div class="auth-buttons">
                <a href="/cart" title="keranjang"><i data-feather="shopping-cart"></i></a>
                @auth
                    <a href="/logout" title="keluar"><i data-feather="log-out"></i></a>
                @else
                    <a href="/login" title="masuk"><i data-feather="log-in"></i></a>
                @endauth
            </div>
        </div>
    </header>
    <div class="nav-about">
        <a href="/">Home ></a><p>Produk</p>
    </div>

    <div class="landing-produk">
        @if($products->isEmpty())
            <p>Produk tidak ada</p>
        @else
            @foreach($products as $product)
                <div class="landing-card">
                    <a href="{{ route('product.show', $product->id) }}">
                        <img src="{{ asset($product->image) }}" alt="Image of {{ $product->product_name }}" class="card-img-top" />
                        <div class="landing-body">
                            <h5 class="landing-title">{{ $product->product_name }}</h5>
                            <p class="landing-stok">
                                Tersedia: 
                                {{ $product->stock > 0 ? $product->stock : 'Habis' }}
                            </p>                        
                            <p class="-landing-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
    <footer>
        <div class="footer-bottom">
            <p>&copy; 2024 CantikaFishing. All rights reserved.</p>
        </div>
    </footer>




    <script>
        feather.replace();
    </script>

    <script src="/style/styleku.js"></script>
</body>
</html>