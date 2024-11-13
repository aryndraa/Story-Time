<?php

namespace App\View\Components\Template\Navigation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ProfileIcon extends Component
{

    public $user;


    /**
     * Create a new component instance.
     */
    public function __construct($user=null)
    {
        $this->user = $user ?? Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.template.navigation.profile-icon');
    }
}
