<?php

namespace App\Livewire\Front\Abonnement;

use App\Models\Spack;
use Livewire\Component;
use Livewire\WithPagination;

class ListSpack extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.front.abonnement.list-spack',[
            'packs'=>Spack::orderBy('title','asc')->paginate(10)
        ]);
    }
}
