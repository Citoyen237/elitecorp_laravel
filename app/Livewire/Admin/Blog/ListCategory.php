<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Category;
use Livewire\Component;

class ListCategory extends Component
{

    public $categories;
    public $categoryToDelete;
    public $showDeleteModal = false;

    public function mount()
    {
        $this->categories = Category::all();
    }

    // public function confirmDelete($categoryId)
    // {
    //     $this->categoryToDelete = $categoryId;
    //     $this->showDeleteModal = true;
    // }

    // public function deleteCategory()
    // {
    //     $category = Category::findOrFail($this->categoryToDelete);
    //     $category->delete();

    //     session()->flash('message', 'Catégorie supprimée avec succès.');
    //     $this->showDeleteModal = false;
    //     $this->categories = Category::all(); // Refresh the categories list
    // }

    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        session()->flash('message', 'Catégorie supprimée avec succès.');

        return redirect()->route('admin.blog.category');
    }


    public function render()
    {
        return view('livewire.admin.blog.list-category',[
            'categories' => Category::all()
        ]);
    }
}
