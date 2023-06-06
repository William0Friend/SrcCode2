<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MyCategoryDropdown extends Component
{
    // Not needed in this case...
    /**
     * Create a new component instance.
    //  */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Get the view / contents that represent the component.
     */
    // public function render(): View|Closure|string
    // {
    //     return view('components.my-category-dropdown');
    // }
    public function render()//: View|Closure|string
    {
        return view('components.my-category-dropdown', [
            'categories' => Category::all()
        ]);
    }
}
