<?php

namespace App\Livewire\Admin\Message;

use App\Models\Message;
use Livewire\Component;

class DeleteMessage extends Component
{
    public $messageId;
    public $message;

    public function mount($messageId)
    {
        $message = Message::findOrFail($messageId);
        $this->messageId = $message->id;
        $this->message = $message->message;
    }

    public function deleteCategory($messageId)
    {
        $message = Message::findOrFail($messageId);
        $message->delete();

        session()->flash('message', 'Message supprimée avec succès.');
        return redirect()->route('admin.message.list');
    }
    public function render()
    {
        return view('livewire.admin.message.delete-message');
    }
}
