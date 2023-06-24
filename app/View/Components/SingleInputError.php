<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class SingleInputError extends Component
{
    public ViewErrorBag $errors;
    public string $name;
    /**
     * Create a new component instance.
     */
    public function __construct($errors, $name)
    {
        $this->errors = $errors;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.single-input-error');
    }
}
