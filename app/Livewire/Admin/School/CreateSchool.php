<?php

namespace App\Livewire\Admin\School;

use App\Models\School;
use Livewire\Component;

class CreateSchool extends Component
{
    public $school, $city, $slug;

    protected $rules = [
        'school' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:schools,slug',
    ];

    public function submit()
    {
        $this->validate();

        $school = new School();
        $school->school = $this->school;
        $school->city = $this->city;
        $school->slug = $this->slug;

        $school->save();
        session()->flash('message', 'Ecole créé avec succès.');

        return redirect()->route('admin.school.list');
    }

    public function render()
    {
        return view('livewire.admin.school.create-school');
    }
}
