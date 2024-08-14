<?php

namespace App\Livewire\Admin\Spack;

use App\Models\Spack;
use Livewire\Component;

class ListSpack extends Component
{

    //afficher uniquement les utilisateur admin
    public function render()
    {
        return view('livewire.admin.spack.list-spack',[
            'spacks'=>Spack::with('user','school')->paginate(100)
        ]);
    }
}
