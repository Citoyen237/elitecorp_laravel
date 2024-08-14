<?php

namespace App\Livewire\Admin\School;

use Livewire\Component;
use \App\Models\School;

class ListSchool extends Component
{
    public function render()
    {
        return view('livewire.admin.school.list-school',[
            'schools' => School::orderBy('school', 'asc')->get()
        ]);
    }
}
