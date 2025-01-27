<header style="margin-bottom: 40px">
    <div class="navbar">
        <div class="logo">
            <span class="brand">Cantika<span class="highlight">Fishing</span></span>
        </div>
        <form action="{{ route('products.search') }}" method="GET">
            <div class="search-container">
                <input type="text" placeholder="Cari produk..." name="query" id="search" value="{{ request()->query('query') }}"/>
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
