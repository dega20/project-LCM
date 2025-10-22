<?php

namespace App\View\Components\Profil;

use Closure;
use App\Models\Profil;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ShowProfil extends Component
{
    /**
     * Create a new component instance.
     */
     public $profil;
    public function __construct(Profil $profil)
    {
        {
        // Simpan data profil ke properti
        $this->profil = $profil;
    }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profil.show-profil');
    }
}
