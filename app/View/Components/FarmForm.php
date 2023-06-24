<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class FarmForm extends Component
{
    public Collection $farmTypes;
    public Collection $farms;
    /**
     * Create a new component instance.
     */
    public function __construct($farms, $farmTypes)
    {
        $this->farmTypes = $farmTypes;
        $this->farms = $farms;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.farm-form');
    }
}
