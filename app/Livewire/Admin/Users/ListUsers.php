<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{

    public $users;

    public function isActive(User $user)
    {
        if ($user->is_active) {
            $user->is_active = 0;
            session()->flash('message', 'Le compte à été bloqué avec succès.');
        } else {
            $user->is_active = 1;
            session()->flash('message', 'Le compte à été activé avec succès.');
        }
        $user->save();
    }

    public function mount()
    {
        $this->users = User::all(); // Récupérer tous les utilisateurs
    }

    public function render()
    {
        return view(
            'livewire.admin.users.list-users',
            ['users' => User::all()]
        );
    }
}
