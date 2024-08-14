<?php

namespace App\Livewire\Admin\Test;

use App\Models\Test;
use Livewire\Component;

class DeleteTest extends Component
{
    public $testId;
    public $test;

    public function mount($testId)
    {
        $test = Test::findOrFail($testId);
        $this->testId = $test->id;
        $this->test = $test->name;
    }

    public function deleteCategory($testId)
    {
        $test = Test::findOrFail($testId);
        $test->delete();

        session()->flash('message', 'Filiere supprimée avec succès.');
        return redirect()->route('admin.test.list');
    }
    public function render()
    {
        return view('livewire.admin.test.delete-test');
    }
}
