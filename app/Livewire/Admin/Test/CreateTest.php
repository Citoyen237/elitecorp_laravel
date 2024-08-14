<?php

namespace App\Livewire\Admin\Test;

use App\Models\Curriculum;
use App\Models\Level;
use App\Models\School;
use App\Models\Stream;
use App\Models\Test;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateTest extends Component
{
    use WithFileUploads;
    public $school_id, $cursus_id, $name, $status, $level_id, $stream_id, $file, $year;
    public $schools;
    public $cursuss = [];
    public $levels = [];
    public $streams = [];
    // public $selectedSchool = 0;
    public $libelle = 'Sélectionner une ecole';
    public $libelleCursus = 'Sélectionner un cursus';
    public $libelleLevel = 'Sélectionner un niveau';

    protected $rules = [
        'name' => 'required|string|max:255',
        'file' => 'required|file|mimes:pdf',
        'year' => 'required|string|max:255',
        'school_id' => 'required|integer|exists:schools,id',
        // 'cursus_id' => 'exists:curricula,id'
    ];

    public function submit()
    {
        $this->validate();
        $test = new Test();
        $test->name = $this->name;
        $test->school_id = $this->school_id;
        if ($this->file) {
            $test->file = $this->file->store('pdfs', 'public');
        }
        $test->curriculum_id = $this->cursus_id;
        $test->level_id = $this->level_id;
        $test->stream_id = $this->stream_id;
        $test->year = $this->year;
        $test->save();
        session()->flash('message', 'Epreuve créé avec succès.');
        return redirect()->route('admin.test.list');
    }

    public function mount()
    {
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
        $this->streams = Stream::where('school_id', $schoolId)->get();
        $school = School::findOrFail($schoolId);
        $this->libelle = $school->school . '_' . $school->city;;
    }

    public function testLevel($cursusId)
    {
        $this->cursus_id = $cursusId;
        $this->levels = Level::where('curriculum_id', $cursusId)->get();
        $this->streams = Stream::where('curriculum_id', $cursusId)->get();
        $cursus = Curriculum::findOrFail($cursusId);
        $this->libelleCursus = $cursus->name;
    }

    public function teststream($levelId)
    {
        $this->level_id = $levelId;
        $this->streams = Stream::where('level_id', $levelId)->get();
        $level = Level::findOrFail($levelId);
        $this->libelleLevel = $level->name;
    }

    public function render()
    {
        return view('livewire.admin.test.create-test');
    }
}
