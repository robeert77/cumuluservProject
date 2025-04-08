<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    public $name;
    public $size;
    public $color;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $size = '6', $color = 'black')
    {
        $this->name = $name;
        $this->size = $size;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icon');
    }
}
