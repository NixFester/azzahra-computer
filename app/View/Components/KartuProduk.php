<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KartuProduk extends Component
{
    public $badge;
    public $image;
    public $category;
    public $name;
    public $price;
    public $oldPrice;

    public function __construct(
        $image,
        $category,
        $name,
        $price,
        $badge = null,
        $oldPrice = null
    ) {
        $this->badge = $badge;
        $this->image = $image;
        $this->category = $category;
        $this->name = $name;
        $this->price = $price;
        $this->oldPrice = $oldPrice;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.kartu-produk');
    }
}
