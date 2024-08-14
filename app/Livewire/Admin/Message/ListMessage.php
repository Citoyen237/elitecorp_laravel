<?php

namespace App\Livewire\Admin\Message;

use App\Models\Message;
use Livewire\Component;

class ListMessage extends Component
{
    public $message;

    public function isRead(Message $message)
    {
        if ($message->is_read) {
        } else {
            $message->is_read = 1;
        }
        $message->save();
    }

    public function render()
    {
        return view('livewire.admin.message.list-message',[
            'messages'=>Message::orderBy('is_read', 'asc')->get()
        ]);
    }
}
