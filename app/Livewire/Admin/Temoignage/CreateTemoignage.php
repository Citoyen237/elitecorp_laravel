<?php

namespace App\Livewire\Admin\Temoignage;

use App\Models\Temoignage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateTemoignage extends Component
{
    public $name, $proffession, $message, $image;
    use WithFileUploads;

    protected $rules = [
        'name' => 'required|string|max:255',
        'message' => 'required|string',
        'image' => 'required|image',
        'proffession' => 'required|string|max:255',

    ];

    public function submit()
    {
        $this->validate();

        $spack = new Temoignage();
        $spack->name = $this->name;
        $spack->proffession = $this->proffession;
        $spack->message = $this->message;

        if ($this->image) {
            $spack->image = $this->image->store('images','public');
        }

        $spack->save();

        session()->flash('message', 'Temoignage créé avec succès.');

        return redirect()->route('admin.temoignage.list');
    }

    public function render()
    {
        return view('livewire.admin.temoignage.create-temoignage');
    }
}
