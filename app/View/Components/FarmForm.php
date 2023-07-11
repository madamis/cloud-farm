<?php

namespace App\View\Components;

use App\Models\Farm;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class FarmForm extends Component
{
    public Collection $farmTypes;
    public Farm $farm;
    /**
     * Create a new component instance.
     */
    public function __construct($farm, $farmTypes)
    {
        $this->farmTypes = $farmTypes;
        $this->farm = $farm;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.farm-form');
    }
}
