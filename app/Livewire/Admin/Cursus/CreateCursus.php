<?php

namespace App\Livewire\Admin\Cursus;

use App\Models\Curriculum;
use App\Models\School;
use Livewire\Component;

class CreateCursus extends Component
{
    public $school_id, $name;

    protected $rules = [
        'name' => 'required|string|max:255',
        'school_id'=>'required|integer|exists:schools,id'
    ];

    public function submit()
    {
        $this->validate();

        $cursus = Curriculum::where('school_id', $this->school_id)->where('name',$this->name);
        if($cursus->count() >= 1){
            session()->flash('message', 'Ce cursus existe deja pour cette ecole.');
        }else{
            $cursus = new Curriculum();
            $cursus->name = $this->name;
            $cursus->school_id = $this->school_id;
            $cursus->save();
            session()->flash('message', 'Cursus créé avec succès.');
            return redirect()->route('admin.cursus.list');
        }
    }



    public function render()
    {
        return view('livewire.admin.cursus.create-cursus',[
            'schools'=>School::all()
        ]);
    }
}
