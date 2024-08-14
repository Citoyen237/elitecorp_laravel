<?php

namespace App\Livewire\Admin\Cursus;

use App\Models\Curriculum;
use Livewire\Component;

class ListCursus extends Component
{
    public function render()
    {
        return view('livewire.admin.cursus.list-cursus',[
            'cursuss'=>Curriculum::orderBy('name','asc')->get()
        ]);
    }
}
