<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $id;
    public $name;
    public $text;
    public $rows;
    public $placeholder;
    public $required;
    public $disabled;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $id,
        $name,
        $text = null,
        $rows = 3,
        $placeholder = null,
        $required = false,
        $disabled = false,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->text = $text;
        $this->rows = $rows;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.textarea');
    }
}
