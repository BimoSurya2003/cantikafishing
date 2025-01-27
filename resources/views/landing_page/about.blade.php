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
        <a href="/">Home ></a><p>About</p>
    </div>
    <div class="about-container">
        <!-- Bagian Banner -->
        <div class="about-banner">
          <img src="/images/pemancingbaner1.jpg" alt="Kolam Pemancingan Cantika">
        </div>
        
        <!-- Bagian Konten -->
        <div class="about-content">
          <h2>Selamat Datang di Kolam Pemancingan Cantika</h2>
          <p>
            Tempat ideal untuk menikmati hobi memancing di Kota Padang. Terletak di Koto Tangah, kami menawarkan 
            pemandangan asri dan suasana yang nyaman. Dilengkapi dengan alat pancing berkualitas dan profesional, 
            serta berbagai perlombaan memancing dengan hadiah menarik setiap harinya. Kami berkomitmen memberikan 
            pengalaman memancing yang menyenangkan dengan pelayanan ramah dan fasilitas yang mendukung kenyamanan Anda.
          </p>
          <p>
            Ayo, kunjungi <strong>Kolam Pemancingan Cantika</strong> dan nikmati pengalaman memancing yang seru!
          </p>
          <p><strong>Tempat:</strong> Kolam Pancing Cantika</p>
          <p><strong>Alamat:</strong> Jalan By Pass Km. 18, Kec. Koto Tangah, Kota Padang</p>
          <p><strong>Instagram:</strong> <a href="https://www.instagram.com/pondokpancingcantika" target="_blank">@pondokpancingcantika</a></p>
        </div>
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