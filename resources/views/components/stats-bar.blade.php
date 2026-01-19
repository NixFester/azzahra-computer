<div class="d-flex justify-content-around align-items-center text-center py-4 bg-white">

    {{-- Service Count --}}
    <div>
        <small class="text-uppercase fw-semibold">Jumlah Unit Selesai Service</small>
        <div class="fs-2 fw-bold">{{ number_format($serviceCount) }}</div>
    </div>

    {{-- Satisfaction --}}
    <div>
        <small class="text-uppercase fw-semibold">Kepuasan</small>
        <div class="fs-2 fw-bold">
            {{ number_format($satisfaction) }}/{{ number_format($maxSatisfaction) }}
        </div>
        <div class="text-warning fs-5">
            @for ($i = 1; $i <= 5; $i++)
                ★
            @endfor
        </div>
    </div>

    {{-- Customer Count --}}
    <div>
        <small class="text-uppercase fw-semibold">Jumlah Customer (2010–2023)</small>
        <div class="fs-2 fw-bold">{{ number_format($customerCount) }}</div>
    </div>

</div>
