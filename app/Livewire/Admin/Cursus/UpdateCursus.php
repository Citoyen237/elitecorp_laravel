<?php

namespace App\Livewire\Admin\Cursus;

use App\Models\Curriculum;
use App\Models\School;
use Livewire\Component;

class UpdateCursus extends Component
{
    public $school_id, $name, $cursusId;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function submit()
    {
        $this->validate();

        // $cursus_exist=Curriculum::fin

        $cursus = Curriculum::findOrFail($this->cursusId);
        $cursus->name = $this->name;
        $cursus->school_id = $this->school_id;
        $cursus->save();
        session()->flash('message', 'Cursus mis a jour avec succès.');

        return redirect()->route('admin.cursus.list');
    }

    public function mount($cursusId){
        $cursus = Curriculum::findOrFail($cursusId);
        $this->name=$cursus->name;
        $this->school_id=$cursus->school_id;
     }

    public function render()
    {
        return view('livewire.admin.cursus.update-cursus',[
            'schools'=>School::all()
        ]);
    }
}
