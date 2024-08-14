<?php

namespace App\Livewire\Admin\Level;

use App\Models\Level;
use Livewire\Component;

class ListLevel extends Component
{
    public function render()
    {
        return view('livewire.admin.level.list-level',[
            'levels'=>Level::with('curriculum')->orderBy('name','asc')->get()
        ]);
    }
}
