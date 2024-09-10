<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $id;
    public $name;
    public $value;
    public $label;
    public $error;
    public $type;
    public $min;
    public $step;
    public $checked;
    public $options;


    public function __construct($id, $name, $value = null, $label = null, $error = null, $min = 0, $step = 0.01, $type = 'text',$checked = false, $options=[])
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->error = $error;
        $this->type = $type;
        $this->min = $min;
        $this->step = $step;
        $this->checked = $checked;
        $this->options = $options;
    
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form-input');
    }
}
