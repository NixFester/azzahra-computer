<a href="{{ route('products') }}?category={{ strtolower($kategori) }}" class="text-decoration-none text-dark">
    <div class="category-item">
        <div class="circle-bg">
            <img src="{{ $image }}" alt="{{ $kategori }}" class="product-img">
        </div>
        <p class="category-name">{{ $kategori }}</p>
    </div>
</a>
