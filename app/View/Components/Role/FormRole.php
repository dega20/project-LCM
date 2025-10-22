<?php

namespace App\View\Components\Role;

use Closure;
use App\Models\Role;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FormRole extends Component
{
    /**
     * Create a new component instance.
     */
    public $id, $name;
    public function __construct($id = null)
    {
        if ($id){
            $role = Role::find($id);
            $this->id = $role->id;
            $this->name = $role->name;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.role.form-role');
    }
}
