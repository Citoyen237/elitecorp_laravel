<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Category;
use Livewire\Component;

class DeleteCategory extends Component
{
    public $categoryId;
    public $name;

    public function mount($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        session()->flash('message', 'Catégorie supprimée avec succès.');
        return redirect()->route('admin.blog.category');
    }

    public function render()
    {
        return view('livewire.admin.blog.delete-category');
    }
}
