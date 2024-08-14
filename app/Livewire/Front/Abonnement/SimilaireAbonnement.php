<?php

namespace App\Livewire\Front\Abonnement;

use App\Models\Spack;
use Livewire\Component;

class SimilaireAbonnement extends Component
{
    public function render()
    {
        return view('livewire.front.abonnement.similaire-abonnement',[
            'spacks'=>Spack::orderBy('created_at', 'desc')->take(4)->get()
        ]);
    }
}
