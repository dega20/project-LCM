<?php

namespace App\View\Components\ProfilTim;

use Closure;
use App\Models\ProfilTim;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FormProfilTim extends Component
{
    /**
     * Create a new component instance.
     */
    public $id, $name, $position, $email, $phone, $photo;
    public function __construct($id = null)
    {
        if($id) {
            $profilTim = ProfilTim::find($id);
            $this->id = $profilTim->id;
            $this->name = $profilTim->name;
            $this->position = $profilTim->position;
            $this->email = $profilTim->email;
            $this->phone = $profilTim->phone;
            $this->photo = $profilTim->photo;
            
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profil-tim.form-profil-tim');
    }
}
