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
      <nav>
        <a href="#home">Home</a>
        <a href="#category">category</a>
        <a href="#about">About</a>
        <a href="#products">Product</a>
        <a href="#event">Event</a>
        <a href="#contact">Contact</a>
        @auth
          <a href="/product">Transaksi</a>
        @else
          <a href="/login">Transaksi</a>
        @endauth
      </nav>
      <section class="banner" id="home">
        <img src="/images/baner.jpg" />
      </section>
  
      <section class="kategori-section" id="category">
        <h2>Kategori Produk</h2>
        <div class="kategori-card">
            <div class="kategori-container">
                <div class="kategori-item">
                    <a href="/kategori-produk" class="text-decoration-none text-dark">
                        <img src="/images/senar.jpeg" class="kategori-icon" alt="Senar Pancing" />
                        <p>Senar Pancing</p>
                    </a>
                </div>
                <div class="kategori-item">
                    <a href="/kategori-produk" class="text-decoration-none text-dark">
                        <img src="/images/katrol.jpeg" class="kategori-icon" alt="Katrol Pancing" />
                        <p>Katrol Pancing</p>
                    </a>
                </div>
                <div class="kategori-item">
                    <a href="/kategori-produk" class="text-decoration-none text-dark">
                        <img src="/images/kotak.jpeg" class="kategori-icon" alt="Kotak Ikan" />
                        <p>Kotak Pancing
                        </p>
                    </a>
                </div>
                <div class="kategori-item">
                    <a href="/kategori-produk" class="text-decoration-none text-dark">
                        <img src="/images/baju.jpeg" class="kategori-icon" alt="Pakaian" />
                        <p>Pakaian Custom</p>
                    </a>
                </div>
                <div class="kategori-item">
                    <a href="/kategori-produk" class="text-decoration-none text-dark">
                        <img src="/images/tas.png" class="kategori-icon" alt="Tas Pancing" />
                        <p>Tas Pancing</p>
                    </a>
                </div>
                <div class="kategori-item">
                    <a href="/kategori-produk" class="text-decoration-none text-dark">
                        <img src="/images/joran.jpg" class="kategori-icon" alt="Joran Pancing" />
                        <p>Joran Pancing</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
      <div class="container" id="about">
        <div class="image-section">
          <img src="/images/pemancingbaner1.jpg"/>
        </div>
        <div class="content-section">
          <h1>Kolam Pemancingan Cantika</h1>
          <p>
            Selamat datang di Kolam Pemancingan Cantika, tempat ideal untuk menikmati hobi memancing di Kota Padang. Terletak di Koto Tangah, kami menawarkan pemandangan asri dan suasana yang nyaman. Dilengkapi dengan alat pancing berkualitas dan profesional, serta berbagai perlombaan memancing dengan hadiah menarik setiap harinya. Kami berkomitmen memberikan pengalaman memancing yang menyenangkan dengan pelayanan ramah dan fasilitas yang mendukung kenyamanan Anda. Ayo, kunjungi Kolam Pemancingan Cantika dan nikmati pengalaman memancing yang seru!
          </p>
          <a href="/about" class="btn">Lihat Selengkapnya</a>
        </div>
      </div>
  
      <section id="products">
        <h2 style="text-align: center; margin-bottom: 38px">Pilihan Produk</h2>
        <div class="product-grid">
          <div class="product" id="product1">
            <img src="/images/baju.jpeg" />
            <h3><a href="/kategori-produk">Baju Custom</a></h3>
            <p>Menyediakan baju custom untuk memancing</p>
          </div>
          <div class="product" id="product2">
            <img src="/images/katrol.jpeg" />
            <h3><a href="/kategori-produk">Katrol Pancing</a></h3>
            <p>Katrol berkualitas internasional </p>
          </div>
          <div class="product" id="product3">
            <img src="/images/pemberat.jpeg" />
            <h3><a href="/kategori-produk">Pemberat</a></h3>
            <p>Menyediakan pemberat khusus untuk profesional</p>
          </div>
          <div class="product" id="product4">
            <img src="/images/senar.jpeg" />
            <h3><a href="/kategori-produk">Senar Pancing</a></h3>
            <p>Senar pancing berkualitas dan tepercaya</p>
          </div>
        </div>
      </section>
  
      <h2 style="text-align: center; margin-top: 55px" id="event">Event Pemancingan</h2>
  
      <div class="event-container">
        <div class="event-card">
          <img src="/images/pemancingbaner2.jpg" class="event-image" />
          <h3>Turnamen Memancing</h3>
          <p>
            Bergabunglah dengan kami untuk acara memancing yang penuh keseruan! Acara ini akan diadakan setiap minggu di cantika dan terbuka untuk semua kalangan.
          </p>
          <a href="/event" class="btn-event">Lihat Event</a>
        </div>
        <div class="event-card">
          <img src="/images/pemancingbaner3.jpg" class="event-image" />
          <h3>Turnamen Memancing</h3>
          <p>
            Bergabunglah dengan kami untuk acara memancing yang penuh keseruan! Acara ini akan diadakan setiap minggu di cantika dan terbuka untuk semua kalangan.
          </p>
          <a href="/event" class="btn-event">Lihat Event</a>
        </div>
        <div class="event-card">
          <img src="/images/pemancingbaner4.jpg" class="event-image" />
          <h3>Turnamen Memancing</h3>
          <p>
            Bergabunglah dengan kami untuk acara memancing yang penuh keseruan! Acara ini akan diadakan setiap minggu di cantika dan terbuka untuk semua kalangan.
          </p>
          <a href="/event" class="btn-event">Lihat Event</a>
        </div>
      </div>
  
      <div class="container-contact" id="contact">
        <h2
          style="
            text-align: center;
            margin-bottom: 38px;
            margin-top: 20px;
            color: white;
          "
        >
          Hubungi Kami
        </h2>
        <div class="contact-card">
          <div class="map-container">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2372.102512838616!2d100.35986831286519!3d-0.8446026927576479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4c6dabb5681ef%3A0x990b562e8a0f1ad0!2sKolam%20Pancing%20Cantika!5e0!3m2!1sid!2sid!4v1728722660226!5m2!1sid!2sid"
              width="600"
              height="450"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
          <div class="contact-form">
            <div class="contact-info">
              <h3>Informasi Kontak</h3>
              <p><strong>Instagram:</strong> <a href="https://www.instagram.com/pondokpancingcantika" target="_blank">@pondokpancingcantika</a></p>
              <p><strong>Telepon:</strong> 089623153165</p>
              <p>
                <strong>Alamat:</strong> Jalan batpass kec. koto tangah, kota padang, sumatra barat
              </p>
              <!-- Penambahan koordinat -->
            </div>
            <form action="/contact" method="POST">
              @csrf
              <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required />
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
              </div>
              <div class="form-group">
                <label for="pesan">Pesan:</label>
                <textarea id="pesan" name="pesan" rows="5" required></textarea>
              </div>
              <button type="submit" class="btn-submit">Kirim Pesan</button>
            </form>
          </div>
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