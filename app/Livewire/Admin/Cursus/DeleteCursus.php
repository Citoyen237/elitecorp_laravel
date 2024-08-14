<?php

namespace App\Livewire\Admin\Cursus;

use App\Models\Curriculum;
use Livewire\Component;

class DeleteCursus extends Component
{
    public $cursusId;
    public $cursus;

    public function mount($cursusId)
    {
        $cursus = Curriculum::findOrFail($cursusId);
        $this->cursusId = $cursus->id;
        $this->cursus = $cursus->name;
    }

    public function deleteCategory($cursusId)
    {
        $cursus = Curriculum::findOrFail($cursusId);
        $cursus->delete();

        session()->flash('message', 'cursus supprimée avec succès.');
        return redirect()->route('admin.cursus.list');
    }
    public function render()
    {
        return view('livewire.admin.cursus.delete-cursus');
    }
}
