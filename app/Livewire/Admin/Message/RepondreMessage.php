<?php

namespace App\Livewire\Admin\Message;

use App\Mail\ResponseMail;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class RepondreMessage extends Component
{
    public $email, $messageId;
    public $message;
    public $reponse;


    protected $rules = [
        'email' => 'required|string|max:255',
        'message' => 'required|string',
        'message' => 'required|string',
    ];
    public function mount($messageId)
    {
        $message= Message::findOrFail($messageId);
        $this->messageId = $message->id;
        $this->email = $message->email;
        $this->message = $message->message;

    }

    public function submit()
    {
        $this->validate();

        $message=Message::findOrFail($this->messageId);
        $message->reponse = htmlspecialchars($this->reponse);
        $message->is_read = 1;


        $message->save();
        Mail::to($this->email)->send(new ResponseMail(htmlspecialchars($message->message), $this->reponse));

        session()->flash('message', 'Reponse envoyer avec succès.');

        return redirect()->route('admin.message.list');
    }

    public function render()
    {
        return view('livewire.admin.message.repondre-message');
    }
}
