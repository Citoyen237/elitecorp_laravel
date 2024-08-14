<?php

namespace App\Livewire\Admin\Cours;

use App\Models\Cours;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateCours extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $image;
    public $file;
    public $user_id, $courId;


    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image',
        'file' => 'required|file|mimes:pdf',
        'user_id' => 'required|integer|exists:users,id',
    ];
    public function mount($courId)
    {
        $cour= Cours::findOrFail($courId);
        $this->courId = $cour->id;
        $this->name = $cour->name;
        $this->description = $cour->description;
        $this->image = $cour->image;
        $this->user_id = $cour->user_id;
        $this->file = $cour->file;

    }

    public function submit()
    {
        $this->validate();

        $cour= Cours::findOrFail($this->courId);
        $cour->name = $this->name;
        $cour->description = $this->description;

        if ($this->image) {
            $cour->image = $this->image->store('images', 'public');
        }

        if ($this->file) {
            $cour->file = $this->file->store('pdfs', 'public');
        }

        $cour->user_id = $this->user_id;
        $cour->save();

        session()->flash('message', 'Cour modifie avec succès.');

        return redirect()->route('admin.cour.list');
    }

    public function render()
    {
        return view('livewire.admin.cours.update-cours',[
            'users' => User::where('is_admin', 1)->get(),
        ]);
    }
}
