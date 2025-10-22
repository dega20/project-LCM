<?php

namespace App\View\Components\Profil;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormProfil extends Component
{
    /**
     * Create a new component instance.
     */
    public $profil;
    public function __construct($profil)
    {   
        $this->profil = $profil;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profil.form-profil');
    }
}
