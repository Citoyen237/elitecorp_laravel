<?php

namespace App\Livewire\Admin\Cours;

use App\Models\Cours;
use Livewire\Component;

class ListCours extends Component
{


    public function render()
    {
        return view('livewire.admin.cours.list-cours', [
            'cours' => Cours::with('user','category')->get()
        ]);
    }
}
