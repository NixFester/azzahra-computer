@props(['categories'])

<section class="container py-5">
    <h5 class="fw-semibold mb-3">Top Categories</h5>
    <div class="row text-center">
        @foreach($categories as $category)
            <div class=" col-2">
                <x-kategori image="{{ asset($category['image']) }}" kategori="{{ $category['name'] }}" />
            </div>
        @endforeach
    </div>
</section>
