<?php

namespace App\View\Components;

use Illuminate\View\Component;

class KartuReview extends Component
{
    public string $name;

    public string $review;

    public int $rating;

    public ?string $image;

    public function __construct(
        string $name,
        string $review,
        int $rating = 5,
        ?string $image = null
    ) {
        $this->name = $name;
        $this->review = $review;
        $this->rating = $rating;
        $this->image = $image;
    }

    public function render()
    {
        return view('components.kartu-review');
    }
}
