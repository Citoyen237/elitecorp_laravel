<?php

namespace App\Livewire\Admin\Temoignage;

use App\Models\Temoignage;
use Livewire\Component;

class ListTemoignage extends Component
{
    public function render()
    {
        return view('livewire.admin.temoignage.list-temoignage',[
            'temoignages'=>Temoignage::orderBy('created_at','asc')->get()
        ]);
    }
}
