<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $name;
    public $description;
    public $href;

    public function __construct($name, $description , $href)
    {
        $this->name = $name;
        $this->description = $description;
        $this->href = $href;
    }

    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
