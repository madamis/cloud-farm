<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageTittle extends Component
{
    public String $h1;
    public String $p;
    /**
     * Create a new component instance.
     */
    public function __construct($h1,$p)
    {
        $this->h1 = $h1;
        $this->p = $p;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page-tittle');
    }
}
