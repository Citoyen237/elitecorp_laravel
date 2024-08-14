<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Subscription extends Component
{
    public function render()
    {
        return view('livewire.admin.subscription',[
            'orders'=>Order::with('user','items.spack.school')->orderBy('created_at', 'desc')->get()
        ]);
    }
}
