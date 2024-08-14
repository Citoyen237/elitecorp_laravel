<?php

namespace App\Livewire\Admin\Spack;

use App\Models\Spack;
use Livewire\Component;

class DeleteSpack extends Component
{
    public $spackId;
    public $spack;

    public function mount($spackId)
    {
        $spack = Spack::findOrFail($spackId);
        $this->spackId = $spack->id;
        $this->spack = $spack->title;
    }

    public function deleteCategory($spackId)
    {
        $spack = Spack::findOrFail($spackId);
        $spack->delete();

        session()->flash('message', 'Aboonement supprimée avec succès.');
        return redirect()->route('admin.spack.list');
    }
    
    public function render()
    {
        return view('livewire.admin.spack.delete-spack');
    }
}
