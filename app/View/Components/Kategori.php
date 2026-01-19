<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Kategori extends Component
{
    /**
     * Create a new component instance.
     */
    public ?string $image = null;
    public string $kategori;
    public function __construct(?string $image = null, string $kategori = '')
    {
        $this->image = $image;
        $this->kategori = $kategori;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.kategori');
    }
}
