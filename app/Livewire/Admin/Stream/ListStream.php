<?php

namespace App\Livewire\Admin\Stream;

use App\Models\Stream;
use Livewire\Component;

class ListStream extends Component
{
    public function render()
    {
        return view('livewire.admin.stream.list-stream',[
            'streams'=>Stream::with('curriculum','school', 'level')->orderBy('name','asc')->get()
        ]);
    }
}
