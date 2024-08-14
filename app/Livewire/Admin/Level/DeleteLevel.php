<?php

namespace App\Livewire\Admin\Level;

use App\Models\Level;
use Livewire\Component;

class DeleteLevel extends Component
{
    public $levelId;
    public $level;

    public function mount($levelId)
    {
        $level = Level::findOrFail($levelId);
        $this->levelId = $level->id;
        $this->level = $level->name;
    }

    public function deleteCategory($levelId)
    {
        $level = Level::findOrFail($levelId);
        $level->delete();

        session()->flash('message', 'level supprimée avec succès.');
        return redirect()->route('admin.level.list');
    }
    public function render()
    {
        return view('livewire.admin.level.delete-level');
    }
}
