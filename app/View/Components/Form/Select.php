<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $options;
    public $selected;
    public $placeholder;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $options = [], $selected = null, $placeholder = null)
    {
        $this->name = $name;
        $this->options = $options;
        $this->selected = $selected !== null ? (int) $selected : null;;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
