<?php

namespace App\Livewire\Admin\Temoignage;

use App\Models\Temoignage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateTemoignage extends Component
{
    public $name, $proffession, $message, $image, $temoignageId;
    use WithFileUploads;

    protected $rules = [
        'name' => 'required|string|max:255',
        'message' => 'required|string',
        'image' => 'required|image',
        'proffession' => 'required|string|max:255',

    ];

    public function mount($temoignageId)
    {
        $temoignage= Temoignage::findOrFail($temoignageId);
        $this->temoignageId = $temoignage->id;
        $this->name = $temoignage->name;
        $this->proffession = $temoignage->proffession;
        $this->message = $temoignage->message;
        $this->image = $temoignage->image;

    }


    public function submit()
    {
        $this->validate();

        $temoignage= Temoignage::findOrFail($this->temoignageId);
        $temoignage->name = $this->name;
        $temoignage->proffession = $this->proffession;
        $temoignage->message = $this->message;

        if ($this->image) {
            $temoignage->image = $this->image->store('images','public');
        }

        $temoignage->save();

        session()->flash('message', 'Temoignage mise a jour avec succès.');

        return redirect()->route('admin.temoignage.list');
    }
    public function render()
    {
        return view('livewire.admin.temoignage.update-temoignage');
    }
}
