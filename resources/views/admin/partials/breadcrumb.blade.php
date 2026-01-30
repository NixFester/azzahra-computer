<div class="topbar">
    <button class="mobile-toggle" id="mobileToggle" type="button">
        <i class="bi bi-list"></i>
    </button>

    <div class="breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                @php
                    $breadcrumbText = trim($__env->yieldContent('breadcrumb', 'Dashboards / Overview'));
                    $breadcrumbs = explode('/', $breadcrumbText);
                    $totalCrumbs = count($breadcrumbs);
                @endphp

                @foreach ($breadcrumbs as $index => $crumb)
                    @php
                        $isLast = $index === $totalCrumbs - 1;
                    @endphp
                    <li class="breadcrumb-item {{ $isLast ? 'active' : '' }}">
                        {{ trim($crumb) }}
                    </li>
                @endforeach
            </ol>
        </nav>
    </div>
</div>
