@props(['tabs'])

<!-- Tabs -->
<ul class="nav product-tabs">
    @foreach($tabs as $index => $tab)
        <li class="nav-item">
            <a class="nav-link @if($index === 0) active @endif" 
               data-bs-toggle="tab" 
               href="#tab-{{ $index }}"
               role="button">
                {{ $tab }}
            </a>
        </li>
    @endforeach
</ul>
