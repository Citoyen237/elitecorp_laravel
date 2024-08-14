<?php

namespace App\Livewire\Admin\Cours;

use App\Models\Cours;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCours extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $image;
    public $file;
    public $user_id;

    protected $rules = [
        'name' => 'required|string|max:255|unique:cours,name',
        'description' => 'required|string',
        'image' => 'required|image',
        'file' => 'required|file|mimes:pdf',
        'user_id' => 'required|',
    ];

    public function submit()
    {
        $this->validate();

        $cour = new Cours();
        $cour->name = $this->name;
        $cour->description = $this->description;

        if ($this->image) {
            $cour->image = $this->image->store('images','public');
        }

        if ($this->file) {
            $cour->file = $this->file->store('pdfs', 'public');
        }

        $cour->user_id = $this->user_id;
        $cour->save();

        session()->flash('message', 'Cour créé avec succès.');

        return redirect()->route('admin.cour.list');
    }
    public function render()
    {
        return view('livewire.admin.cours.create-cours',[
            'users' => User::where('is_admin', 1)->get(),
        ]);
    }
}
