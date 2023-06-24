<?php

namespace App\View\Components;

use App\Models\FarmType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FarmTypeForm extends Component
{
    public FarmType $farmType;
    /**
     * Create a new component instance.
     */
    public function __construct($farmType)
    {
        $this->farmType = $farmType;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.farm-type-form');
    }
}
