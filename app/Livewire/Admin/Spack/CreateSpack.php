<?php

namespace App\Livewire\Admin\Spack;

use App\Models\School;
use App\Models\Spack;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateSpack extends Component
{
    public $title, $prix, $duree, $old_prix, $user_id, $description, $image, $school_id;
    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string|max:255|unique:spacks,title',
        'description' => 'required|string',
        'image' => 'required|image',
        'duree' => 'required|integer',
        'prix' => 'required|integer',
        'old_prix' => 'required|integer',
        'school_id' => 'required|integer|exists:schools,id',
        'user_id' => 'required|integer|exists:users,id',
    ];

    public function submit()
    {
        $this->validate();

        $spack = new Spack();
        $spack->title = $this->title;
        $spack->prix = $this->prix;
        $spack->old_price = $this->old_prix;
        $spack->duree = $this->duree;
        $spack->description = $this->description;

        if ($this->image) {
            $spack->image = $this->image->store('images','public');
        }

        $spack->school_id = $this->school_id;
        $spack->user_id = $this->user_id;
        $spack->save();

        session()->flash('message', 'Abonnement créé avec succès.');

        return redirect()->route('admin.spack.list');
    }

    

    public function render()
    {
        return view('livewire.admin.spack.create-spack',[
            'schools'=>School::orderBy('school', 'asc')->get(),
            'users'=>User::where('is_admin', 1)->get()
        ]);
    }
}
