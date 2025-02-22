<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class NavItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Menu $menu)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-item');
    }
}
