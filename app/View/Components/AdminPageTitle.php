<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminPageTitle extends Component
{
    public string $pageTitle;
    public Array $breadCrumbs;
    /**
     * Create a new component instance.
     */
    public function __construct($pageTitle, $breadCrumbs)
    {
        $this->pageTitle = $pageTitle;
        $this->breadCrumbs = $breadCrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-page-title');
    }
}
