<?php

namespace App\Livewire\Admin\Cours;

use App\Models\Cours;
use Livewire\Component;

class DeleteCours extends Component
{
    public $courId;
    public $name;

    public function mount($courId)
    {
        $cour = Cours::findOrFail($courId);
        $this->courId = $cour->id;
        $this->name = $cour->name;
    }

    public function deleteCategory($courId)
    {
        $cour = Cours::findOrFail($courId);
        $cour->delete();

        session()->flash('message', 'Cour supprimée avec succès.');
        return redirect()->route('admin.cour.list');
    }
    public function render()
    {
        return view('livewire.admin.cours.delete-cours');
    }
}
