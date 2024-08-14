<?php

namespace App\Livewire\Admin\School;

use App\Models\School;
use Livewire\Component;

class DeleteSchool extends Component
{
    public $schoolId;
    public $school;

    public function mount($schoolId)
    {
        $school = School::findOrFail($schoolId);
        $this->schoolId = $school->id;
        $this->school = $school->school;
    }

    public function deleteCategory($schoolId)
    {
        $school = School::findOrFail($schoolId);
        $school->delete();

        session()->flash('message', 'Ecole supprimée avec succès.');
        return redirect()->route('admin.school.list');
    }
    public function render()
    {
        return view('livewire.admin.school.delete-school');
    }
}
