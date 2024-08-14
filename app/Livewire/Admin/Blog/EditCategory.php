<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    public $categoryId;
    public $name;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255|unique:categories,name',
        'description' => 'nullable|string',
    ];

    public function mount($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function submit()
    {
        $this->validate();

        $category = Category::findOrFail($this->categoryId);
        $category->name = $this->name;
        $category->libelle = $this->description;
        $category->save();

        session()->flash('message', 'Catégorie mise à jour avec succès.');

        return redirect()->route('admin.blog.category');
    }

    public function render()
    {
        return view('livewire.admin.blog.edit-category');
    }
}
