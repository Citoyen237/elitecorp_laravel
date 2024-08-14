<?php

namespace App\Livewire\Admin\School;

use App\Models\School;
use Livewire\Component;

class UpdateSchool extends Component
{
    public $school, $city, $slug, $schoolId;

    protected $rules = [
        'school' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
    ];

    public function submit()
    {
        $this->validate();

        $school = School::findOrFail($this->schoolId);
        $school->school = $this->school;
        $school->city = $this->city;
        $school->slug = $this->slug;

        $school->save();
        session()->flash('message', 'Ecole modifier avec succès.');

        return redirect()->route('admin.school.list');
    }

    public function mount($schoolId)
    {
        $school= School::findOrFail($schoolId);
        $this->schoolId = $school->id;
        $this->school = $school->school;
        $this->city = $school->city;
        $this->slug = $school->slug;

    }

    public function render()
    {
        return view('livewire.admin.school.update-school');
    }
}
