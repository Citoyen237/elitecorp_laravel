<?php

namespace App\Livewire\Front;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithFileUploads;

class SendMessage extends Component
{
    public $email,$message;
    use WithFileUploads;

    protected $rules = [
        'email' => 'required|email',
        'message' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        $contact = new Message();
        $contact->email = $this->email;
        $contact->message = $this->message;


        $contact->save();

        session()->flash('message', 'Votre message a ete recu avec succès, une reponse vous sera envoye par email.');

        return redirect()->route('contact');
    }


    public function render()
    {
        return view('livewire.front.send-message');
    }
}
