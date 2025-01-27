<div class="sidebar">
    @can('IsAdmin')
    <h5 class="category-title">Menu Admin</h5>
    <ul class="list-group">
        <a href="/dashboard"><li class="list-group-item">Dashboad</li></a>
    </ul>
    @endcan
    <h5 class="category-title">Pilihan Menu</h5>
    <ul class="list-group">
        <a href="/"><li class="list-group-item">Home</li></a>
        <a href="/product"><li class="list-group-item">Produk</li></a>
        <a href="/pesanan"><li class="list-group-item">Pesanan</li></a>
    </ul>
    <h5 class="category-title">Menu Pemacingan</h5>
    <ul class="list-group">
        <a href="/pemancingan"><li class="list-group-item">Pemancingan</li></a>
    </ul>
    

    {{-- <h5 class="category-title">Browse Categories</h5>
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item">
                <a href="{{ route('products.category', ['category' => $category->category_name]) }}">
                    {{ $category->category_name }}
                </a>
            </li>
        @endforeach
    </ul> --}}
    
    {{-- <h5 class="category-title">Pilihan Kategori</h5>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('products.category', ['category' => 'Benang Pancing']) }}">Benang Pancing</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('products.category', ['category' => 'Katrol Pancing']) }}">Katrol Pancing</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('products.category', ['category' => 'Joran Pancing']) }}">Joran Pancing</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('products.category', ['category' => 'Tas Pancing']) }}">Tas Pancing</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('products.category', ['category' => 'Baju Pancing']) }}">Baju Pancing</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('products.category', ['category' => 'Umpan Pancing']) }}">Umpan Pancing</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('products.category', ['category' => 'Kotak Pancing']) }}">Kotak Pancing</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('products.category', ['category' => 'Pelampung']) }}">Pelampung</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('products.category', ['category' => 'Pemberat']) }}">Pemberat</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('products.category', ['category' => 'Jaring Pancing']) }}">Jaring Pancing</a>
        </li>
    </ul> --}}

    {{-- <h5 class="category-title">Product Brand</h5>
    <ul class="list-group">
        <li class="list-group-item">Apple</li>
        <li class="list-group-item">Asus</li>
        <li class="list-group-item">Gionee</li>
        <li class="list-group-item">Micromax</li>
    </ul> --}}
</div>
