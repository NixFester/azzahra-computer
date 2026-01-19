<div class="review-card">
    <div class="review-header">
        <div class="avatar">
            @if ($image)
                <img src="{{ $image }}" alt="{{ $name }}" class="avatar-img">
            @else
                {{ strtoupper(mb_substr($name, 0, 1)) }}
            @endif
        </div>

        <div class="user-info">
            <h4>{{ $name }}</h4>
            <div class="stars">
                {{ str_repeat('★', $rating) }}
            </div>
        </div>
    </div>

    <p class="review-text">
        {{ $review }}
    </p>
</div>