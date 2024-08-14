<?php

namespace App\Livewire\Admin\Temoignage;

use App\Models\Temoignage;
use Livewire\Component;

class DeleteTemoignage extends Component
{

    public $temoignageId;
    public $temoignage;

    public function mount($temoignageId)
    {
        $temoignage = Temoignage::findOrFail($temoignageId);
        $this->temoignageId = $temoignage->id;
        $this->temoignage = $temoignage->name;
    }

    public function deleteCategory($temoignageId)
    {
        $temoignage = Temoignage::findOrFail($temoignageId);
        $temoignage->delete();

        session()->flash('message', 'Temoignage supprimée avec succès.');
        return redirect()->route('admin.temoignage.list');
    }
    public function render()
    {
        return view('livewire.admin.temoignage.delete-temoignage');
    }
}
