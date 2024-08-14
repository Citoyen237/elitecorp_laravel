<?php

namespace App\Livewire\Front;

use App\Models\Temoignage as ModelsTemoignage;
use Livewire\Component;

class Temoignage extends Component
{
    public function render()
    {
        return view('livewire.front.temoignage',[
            'temoignages'=>ModelsTemoignage::all()
        ]);
    }
}
