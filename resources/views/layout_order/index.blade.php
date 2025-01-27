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
          <div class="search-container">
            <input type="text" placeholder="Cari..." id="search" />
            <button id="search-btn"><i data-feather="search"></i></button>
          </div>
          <div class="auth-buttons">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="/"><i data-feather="log-out"></i></a>
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
      </nav>

      <div class="container-order">
        <div class="sidebar">
          <h5 class="category-title">Browse Categories</h5>
          <ul class="list-group">
            <li class="list-group-item">Frozen Fish</li>
            <li class="list-group-item">Dried Fish</li>
            <li class="list-group-item">Fresh Fish</li>
            <li class="list-group-item">Meat Alternatives</li>
            <li class="list-group-item">Meat</li>
          </ul>
  
          <h5 class="category-title">Product Brand</h5>
          <ul class="list-group">
            <li class="list-group-item">Apple</li>
            <li class="list-group-item">Asus</li>
            <li class="list-group-item">Gionee</li>
            <li class="list-group-item">Micromax</li>
          </ul>
        </div>
  
        <div class="main-content">
          <div class="search-bar">
            <input
              type="text"
              id="searchInput"
              placeholder="Search products..."
            />
            <button id="searchButton">Search</button>
          </div>
  
          <div class="product-list" id="productList">
            <a href="product_detail.html" class="card"> <!-- Menggunakan tag <a> -->
              <img src="/images/tas.png" alt="Product 1" />
              <h5 class="card-title">Latest Men's Sneaker</h5>
              <p class="price">$25.00 <span class="original-price">$35.00</span></p>
              <button class="btn-cart">Add to Cart</button>
            </a>
  
            <a href="product_detail.html" class="card"> <!-- Menggunakan tag <a> -->
              <img src="/images/joran.jpg" alt="Product 2" />
              <h5 class="card-title">Latest Men's Sneaker</h5>
              <p class="price">$25.00 <span class="original-price">$35.00</span></p>
              <button class="btn-cart">Add to Cart</button>
            </a>
  
            <a href="product_detail.html" class="card"> <!-- Menggunakan tag <a> -->
              <img src="/images/kotak.jpeg" alt="Product 3" />
              <h5 class="card-title">Latest Men's Sneaker</h5>
              <p class="price">$25.00 <span class="original-price">$35.00</span></p>
              <button class="btn-cart">Add to Cart</button>
            </a>
  
            <a href="product_detail.html" class="card"> <!-- Menggunakan tag <a> -->
              <img src="/images/kotak.jpeg" alt="Product 4" />
              <h5 class="card-title">Latest Men's Sneaker</h5>
              <p class="price">$25.00 <span class="original-price">$35.00</span></p>
              <button class="btn-cart">Add to Cart</button>
            </a>
          </div>
        </div>
      </div>














    
    <script>
        feather.replace();
    </script>

    <script src="/style/styleku.js"></script>

</body>
</html>