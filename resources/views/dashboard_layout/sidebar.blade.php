<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">CantikaFishing</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Menu Dashboard</li>

            <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard">
                    <i class="align-middle" data-feather="home"></i> 
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">Menu Product</li>

            <li class="sidebar-item {{ request()->is('dashboard-product') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard-product">
                    <i class="align-middle" data-feather="box"></i> 
                    <span class="align-middle">Product</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('dashboard-categorie') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard-categorie">
                    <i class="align-middle" data-feather="layers"></i> 
                    <span class="align-middle">Categori</span>
                </a>
            </li>

            <li class="sidebar-header">Menu Order</li>

            <li class="sidebar-item {{ request()->is('dashboard-order') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard-order">
                    <i class="align-middle" data-feather="dollar-sign"></i> 
                    <span class="align-middle">Order</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('dashboard-orderitem') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard-orderitem">
                    <i class="align-middle" data-feather="shopping-bag"></i> 
                    <span class="align-middle">Order Item</span>
                </a>
            </li>

            <li class="sidebar-header">Menu Barang</li>

            <li class="sidebar-item {{ request()->is('dashboard-barang_masuk*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard-barang_masuk">
                    <i class="align-middle" data-feather="package"></i> 
                    <span class="align-middle">Barang Masuk</span>
                </a>
            </li>
            

            <li class="sidebar-header">Menu Pemancingan</li>

            <li class="sidebar-item {{ request()->is('booking') ? 'active' : '' }}">
                <a class="sidebar-link" href="/booking">
                    <i class="align-middle" data-feather="calendar"></i> 
                    <span class="align-middle">Booking</span>
                </a>
            </li>

            <li class="sidebar-header">Menu User</li>

            <li class="sidebar-item {{ request()->is('dashboard-user') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard-user">
                    <i class="align-middle" data-feather="user"></i> 
                    <span class="align-middle">User</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('contact') ? 'active' : '' }}">
                <a class="sidebar-link" href="/contact">
                    <i class="align-middle" data-feather="mail"></i> 
                    <span class="align-middle">Kotak Pesan</span>
                </a>
            </li>

            <li class="sidebar-header">Keluar</li>

            <li class="sidebar-item {{ request()->is('product') ? 'active' : '' }}">
                <a class="sidebar-link" href="/product">
                    <i class="align-middle" data-feather="arrow-left-circle"></i> 
                    <span class="align-middle">Menu Product</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('logout') ? 'active' : '' }}">
                <a class="sidebar-link" href="/logout">
                    <i class="align-middle" data-feather="log-out"></i> 
                    <span class="align-middle">Log out</span>
                </a>
            </li>
        </ul>    
    </div>
</nav>

{{-- <style>
    /* Gaya untuk sidebar */
    .sidebar {
        background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%); /* Warna latar belakang gradien */
        transition: background-color 0.3s ease, transform 0.3s ease;
        border-right: 2px solid #2980b9; /* Garis pemisah di sisi kanan sidebar */
    }

    .sidebar-brand {
        padding: 20px;
        font-size: 1.25rem;
        font-weight: bold;
        color: #ecf0f1; /* Warna teks terang */
        text-align: center;
        transition: transform 0.2s;
    }

    .sidebar-brand:hover {
        transform: scale(1.05); /* Memperbesar saat hover */
    }

    .sidebar-link {
        color: #ecf0f1; /* Warna teks */
        padding: 12px 20px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .sidebar-item.active .sidebar-link {
        background: linear-gradient(90deg, #2980b9, #3498db); /* Warna gradien untuk item aktif */
        box-shadow: 0 4px 15px rgba(41, 128, 185, 0.5); /* Bayangan saat aktif */
    }

    .sidebar-item:hover .sidebar-link {
        background: rgba(236, 240, 241, 0.2); /* Efek latar belakang saat hover */
        box-shadow: 0 0 10px rgba(41, 128, 185, 0.5); /* Bayangan saat hover */
        transform: translateX(5px); /* Menggeser sedikit saat hover */
    }

    .sidebar-link i {
        margin-right: 10px;
        transition: color 0.3s;
    }

    .sidebar-item.active .sidebar-link i {
        color: #ffdd57; /* Mengubah warna ikon saat aktif */
    }

    .sidebar-item:hover .sidebar-link i {
        color: #2980b9; /* Mengubah warna ikon saat hover */
    }
</style> --}}
