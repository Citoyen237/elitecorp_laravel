<?php

namespace App\Livewire\Admin\Level;

use App\Models\Curriculum;
use App\Models\Level;
use App\Models\School;
use Livewire\Component;

class CreateLevel extends Component
{
    public $school_id, $cursus_id, $name, $status;
    public $schools;
    public $cursuss = [];
    public $selectedSchool = 0;
    public $libelle = 'Sélectionner une ecole';

    protected $rules = [
        'name' => 'required|string|max:255',
        'school_id' => 'required|integer|exists:schools,id',
        // 'cursus_id' => 'exists:curricula,id'
    ];

    public function submit()
    {
        $this->validate();

        if($this->cursus_id){
            $cursus = Level::where('curriculum_id', $this->cursus_id)->where('name', $this->name)->get();
            $this->status = 'ce cursus';
        }else{
            $this->status = 'cette ecole';
            $cursus = Level::where('school_id', $this->school_id)->where('name', $this->name)->get();
        }

        if ($cursus->count() >= 1) {
            session()->flash('message', 'Ce niveau existe deja pour '.$this->status);

        } else {
            $level = new Level();
            $level->name = $this->name;
            $level->school_id = $this->school_id;
            $level->curriculum_id = $this->cursus_id;
            $level->save();
            session()->flash('message', 'Niveau créé avec succès.');
            return redirect()->route('admin.level.list');
        }
    }

    public function mount()
    {
        $this->schools = School::all();
    }

    public function updatedSelectedSchool($schoolId)

    {
        $this->cursuss = Curriculum::where('school_id', $schoolId)->get();
    }

    //selectionne les cursus lier a l'ecole
    public function test($schoolId)
    {
        $this->school_id = $schoolId;
        $this->cursuss = Curriculum::where('school_id', $schoolId)->get();
        $school = School::findOrFail($schoolId);
        $this->libelle = $school->school.'_'.$school->city;
    }

    public function render()
    {

        return view('livewire.admin.level.create-level', []);
    }
}
