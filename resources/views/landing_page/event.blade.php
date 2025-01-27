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
        <a href="/">Home ></a><p>Event</p>
    </div>
    <div class="event-lomba">
        <div class="lomba">
            <img src="/images/pemancingbaner2.jpg" alt="Pemancingan Cantika 1">
            <img src="/images/pemancingbaner3.jpg" alt="Pemancingan Cantika 2">
            <img src="/images/pemancingbaner4.jpg" alt="Pemancingan Cantika 3">
        </div>
        <div class="lomba-text">
            <h2>Event Pemancingan Cantika 2021</h2>
            <p>
                Pada tanggal <strong>14 November 2021</strong>, Pemancingan Cantika dengan bangga menyelenggarakan event tahunan yang selalu dinanti-nantikan oleh para penggemar olahraga memancing. Acara ini tidak hanya menjadi ajang kompetisi, tetapi juga momen kebersamaan yang penuh kehangatan di tengah suasana alam yang asri dan menenangkan.
            </p>
            <p>
                Event ini dimulai dengan registrasi peserta yang membludak sejak pagi hari, menunjukkan antusiasme tinggi dari komunitas pemancing di berbagai wilayah. Setelah sesi pembukaan dan pengarahan oleh panitia, lomba memancing dimulai dengan semangat kompetisi yang sehat. Peserta berlomba-lomba untuk mendapatkan hasil tangkapan terbaik, baik dari segi ukuran maupun bobot, dalam batas waktu yang telah ditentukan.
            </p>
            <p>
                Selain lomba memancing, acara ini juga diramaikan dengan berbagai kegiatan pendukung seperti bazar kuliner, pameran alat-alat pancing terbaru, dan area bermain anak yang menjadikan event ini cocok untuk keluarga. Tidak ketinggalan, sesi workshop singkat tentang teknik memancing yang efektif dan ramah lingkungan menarik perhatian peserta dari berbagai kalangan, baik pemula maupun profesional.
            </p>
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