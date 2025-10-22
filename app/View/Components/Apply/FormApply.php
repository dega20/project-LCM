<?php

namespace App\View\Components\Apply;

use App\Models\Apply;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormApply extends Component
{
    /**
     * Create a new component instance.
     */
    public $id, $nama, $email, $posisi, $deskripsi, $cv;
    public function __construct($id = null)
    {
        if($id) {
            $apply = Apply::find($id);
            $this->id = $apply->id;
            $this->nama = $apply->nama;
            $this->email = $apply->email;
            $this->posisi = $apply->posisi;
            $this->deskripsi = $apply->deskripsi;
            $this->cv = $apply->cv;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.apply.form-apply');
    }
}
