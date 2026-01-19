@php
    $colors = ['#1abc9c', '#3498db', '#9b59b6', '#e67e22', '#e74c3c', '#2ecc71', '#f39c12', '#16a085'];
    $index = crc32($name) % count($colors);
    $bgColor = $colors[$index];
@endphp

<div class="review-card">
    <div class="review-header">
        <div class="avatar">
            @if ($image)
                <img src="{{ $image }}" alt="{{ $name }}" class="avatar-img">
                @else
                    
                    <div class="avatar text-white fw-bold d-flex align-items-center justify-content-center"
                        style="background-color: {{ $bgColor }};">
                        {{ strtoupper(mb_substr($name, 0, 1)) }}
                    </div>
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