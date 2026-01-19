@props(['products', 'tabs' => ['Power Deals', 'New Arrival', 'Top Rate', 'Best Selling']])

<section class="container py-5">
    <ul class="nav nav-tabs mb-4">
        @foreach($tabs as $index => $tab)
            <li class="nav-item">
                <a class="nav-link @if($index === 0) active @endif">{{ $tab }}</a>
            </li>
        @endforeach
    </ul>

    <div class="row g-4">
        @foreach($products as $product)
            <div class="col-md-3">
                <x-kartu-produk 
                    image="{{ $product['image'] }}" 
                    category="{{ $product['category'] }}"
                    name="{{ $product['name'] }}"
                    price="{{ $product['price'] }}"
                    badge="{{ $product['badge'] ?? null }}"
                    old-price="{{ $product['oldPrice'] ?? null }}" />
            </div>
        @endforeach
    </div>
</section>
