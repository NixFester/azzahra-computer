<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatsBar extends Component
{
    public int $serviceCount;
    public int $satisfaction;
    public int $maxSatisfaction;
    public int $customerCount;

    public function __construct(
        int $serviceCount = 9000,
        int $satisfaction = 8500,
        int $maxSatisfaction = 9000,
        int $customerCount = 9500
    ) {
        $this->serviceCount = $serviceCount;
        $this->satisfaction = $satisfaction;
        $this->maxSatisfaction = $maxSatisfaction;
        $this->customerCount = $customerCount;
    }

    public function render()
    {
        return view('components.stats-bar');
    }
}
