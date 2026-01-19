<div class="card position-relative h-100 shadow-sm">

    @if($badge)
        <span class="badge bg-danger position-absolute top-0 start-0 m-2">
            {{ $badge }}
        </span>
    @endif

    <img src="{{ asset($image) }}" class="card-img-top" alt="{{ $name }}">

    <div class="card-body d-flex flex-column">
        <small class="text-muted">{{ $category }}</small>
        <h5 class="card-title mt-1">{{ $name }}</h5>

        <div class="mb-3">
            <span class="fw-bold text-primary">{{ $price }}</span>
            @if($oldPrice)
                <span class="text-muted text-decoration-line-through ms-2">
                    {{ $oldPrice }}
                </span>
            @endif
        </div>

        <button class="btn btn-primary mt-auto">Add To Cart</button>
    </div>
</div>
