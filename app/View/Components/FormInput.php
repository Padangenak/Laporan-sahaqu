<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $name, $title, $type, $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(String $name, String $title, String $type = null, String $placeholder = null)
    {
        $this->name = $name;
        $this->title = $title;
        $this->type = $type;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-input');
    }
}
