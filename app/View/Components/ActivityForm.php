<?php

namespace App\View\Components;

use App\Models\Activity;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ActivityForm extends Component
{
    public Activity $activity;
    public Collection $parentActivities;
    public Collection $previousActivities;
    /**
     * Create a new component instance.
     */
    public function __construct($activity, $parentActivities, $previousActivities)
    {
        $this->activity = $activity;
        $this->parentActivities = $parentActivities;
        $this->previousActivities = $previousActivities;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.activity-form');
    }
}
