<?php

namespace App\Livewire\Admin\Stream;

use App\Models\Curriculum;
use App\Models\Level;
use App\Models\School;
use App\Models\Stream;
use Livewire\Component;

class UpdateStream extends Component
{
    public $school_id, $cursus_id, $name, $status, $level_id, $levelname;
    public $schools, $streamId;
    public $cursuss = [];
    public $levels = [];
    // public $selectedSchool = 0;
    public $libelle = 'Sélectionner une ecole';
    public $libelleCursus = 'Sélectionner un niveau';

    protected $rules = [
        'name' => 'required|string|max:255',
        'school_id' => 'required|integer|exists:schools,id',
        // 'cursus_id' => 'exists:curricula,id'
    ];

    public function submit()
    {
        $this->validate();

        if ($this->cursus_id) {
            if ($this->level_id) {
                $cursus = Stream::where('level_id', $this->level_id)->where('name', $this->name)->get();
                $this->status = 'ce niveau';
            } else {
                $cursus = Stream::where('curriculum_id', $this->cursus_id)->where('name', $this->name)->get();
                $this->status = 'ce cursus';
            }
        } elseif ($this->level_id) {
            $cursus = Stream::where('level_id', $this->level_id)->where('name', $this->name)->get();
            $this->status = 'ce niveau';
        } else {
            $this->status = 'cette ecole';
            $cursus = Stream::where('school_id', $this->school_id)->where('name', $this->name)->get();
        }

        if ($cursus->count() >= 1) {
            session()->flash('message', 'Cette filiere existe deja pour ' . $this->status);
        } else {
            $stream = Stream::findOrFail($this->streamId);
            $stream->name = $this->name;
            $stream->school_id = $this->school_id;
            $stream->curriculum_id = $this->cursus_id;
            $stream->level_id = $this->level_id;
            $stream->save();
            session()->flash('message', 'Filiere mise a jour avec succès.');
            return redirect()->route('admin.stream.list');
        }
    }

    public function mount()
    {
        $stream = Stream::with('curriculum', 'level')->findOrFail($this->streamId);
        $this->name = $stream->name;
        $this->cursus_id = $stream->cursus_id;
        $this->libelle = $stream->school->school;
        if ($stream->curriculum) {
            $this->libelleCursus = $stream->curriculum->name;
            $this->cursus_id = $stream->curriculum_id;
        }
        $this->school_id = $stream->school_id;
        $this->levelname = $stream->level;
        if ($this->levelname) {
            $this->level_id = $stream->level->id;
        }
        $this->schools = School::all();
    }

    // public function updatedSelectedSchool($schoolId)

    // {
    //     $this->cursuss = Curriculum::where('school_id', $schoolId)->get();
    // }

    //selectionne les cursus lier a l'ecole
    public function test($schoolId)
    {
        $this->school_id = $schoolId;
        $this->cursuss = Curriculum::where('school_id', $schoolId)->get();
        $this->levels = Level::where('school_id', $schoolId)->get();
        $school = School::findOrFail($schoolId);
        $this->libelle = $school->school.'_'.$school->city;;
    }

    public function testLevel($cursusId)
    {
        $this->cursus_id = $cursusId;
        $this->levels = Level::where('curriculum_id', $cursusId)->get();
        $cursus = Curriculum::findOrFail($cursusId);
        $this->libelleCursus = $cursus->name;
    }
    public function render()
    {
        return view('livewire.admin.stream.update-stream');
    }
}
