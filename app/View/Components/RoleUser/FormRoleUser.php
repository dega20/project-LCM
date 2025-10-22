<?php

namespace App\View\Components\RoleUser;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User;
use App\Models\Role;

class FormRoleUser extends Component
{
    public $user;
    public $allRoles;

    public function __construct(User $user, $allRoles)
    {
        $this->user = $user;
        $this->allRoles = $allRoles;
    }

    public function render(): View|Closure|string
    {
        return view('components.role-user.form-role-user');
    }
}