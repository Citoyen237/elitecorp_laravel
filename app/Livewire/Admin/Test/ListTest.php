<?php

namespace App\Livewire\Admin\Test;

use App\Models\Test;
use Livewire\Component;

class ListTest extends Component
{
    public function render()
    {
        return view('livewire.admin.test.list-test',[
            'tests'=>Test::with('curriculum','school', 'level','stream')->orderBy('name','asc')->get()
        ]);
    }
}
