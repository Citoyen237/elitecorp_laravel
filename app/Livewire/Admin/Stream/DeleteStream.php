<?php

namespace App\Livewire\Admin\Stream;

use App\Models\Stream;
use Livewire\Component;

class DeleteStream extends Component
{
    public $streamId;
    public $stream;

    public function mount($streamId)
    {
        $stream = Stream::findOrFail($streamId);
        $this->streamId = $stream->id;
        $this->stream = $stream->name;
    }

    public function deleteCategory($streamId)
    {
        $stream = Stream::findOrFail($streamId);
        $stream->delete();

        session()->flash('message', 'Filiere supprimée avec succès.');
        return redirect()->route('admin.stream.list');
    }

    public function render()
    {
        return view('livewire.admin.stream.delete-stream');
    }
}
