<?php

namespace App\Livewire\Front\Abonnement;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserAbonnement extends Component
{
    public function render()
    {
        return view('livewire.front.abonnement.user-abonnement',[
            'orders'=>Order::where('user_id',Auth::user()->id)->with('items.spack.school')->orderBy("created_at", 'desc')->get()
        ]);
    }
}
