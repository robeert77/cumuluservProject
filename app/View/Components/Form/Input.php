<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public $name;
    public $type;
    public $value;
    public $placeholder;
    public $required;
    public $disabled;
    public $checked;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $id,
        $name,
        $type = 'text',
        $value = null,
        $placeholder = null,
        $required = false,
        $disabled = false,
        $checked = false
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->value = $this->type !== 'checkbox' ? $value : 1;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
