<?php

namespace App\Livewire\Admin\Level;

use App\Models\Curriculum;
use App\Models\Level;
use App\Models\School;
use Livewire\Component;

class UpdateLevel extends Component
{
    public $school_id,$cursus_id, $name, $levelId, $cursusname;
    public $schools;
    public $cursuss = [];
    public $selectedSchool = 0;
    public $libelle='Sélectionner une ecole';


    public function mount()
    {
        $level = Level::with('curriculum')->findOrFail($this->levelId);
        $this->name=$level->name;
        $this->cursus_id=$level->cursus_id;
        $this->libelle=$level->school->school;
        $this->school_id=$level->school_id;
        $this->cursusname = $level->curriculum;
        if($this->cursusname ){
            $this->cursus_id = $level->curriculum->id;
        }
        $this->schools = School::all();

    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'school_id' => 'required|integer|exists:schools,id',
        // 'cursus_id' => 'exists:curricula,id'
    ];

    public function submit()
    {
        $this->validate();

            $level = Level::findOrFail($this->levelId);
            $level->name = $this->name;
            $level->school_id = $this->school_id;
            $level->curriculum_id = $this->cursus_id;
            $level->save();
            session()->flash('message', 'Niveau mise a jour avec succès.');
            return redirect()->route('admin.level.list');

    }

    public function test($schoolId){
        $this->school_id = $schoolId;
        $this->cursuss = Curriculum::where('school_id', $schoolId)->get();
        $school = School::findOrFail($schoolId);
        $this->libelle = $school->school.'_'.$school->city;
    }

    public function render()
    {
        return view('livewire.admin.level.update-level');
    }
}
