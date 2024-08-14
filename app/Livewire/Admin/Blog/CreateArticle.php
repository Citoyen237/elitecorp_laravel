<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticle extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $image;
    public $file;
    public $category_id;
    public $user_id;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image',
        'file' => 'nullable|file|mimes:pdf',
        'category_id' => 'required|integer|exists:categories,id',
        'user_id' => 'required|integer|exists:users,id',
    ];

    public function submit()
    {
        $this->validate();

        $article = new Article();
        $article->title = $this->title;
        $article->description = $this->description;

        if ($this->image) {
            $article->image = $this->image->store('images','public');
        }

        if ($this->file) {
            $article->file = $this->file->store('pdfs','public');
        }

        $article->category_id = $this->category_id;
        $article->user_id = $this->user_id;
        $article->save();

        session()->flash('message', 'Article créé avec succès.');

        return redirect()->route('admin.blog.article');
    }

    public function render()
    {
        return view('livewire.admin.blog.create-article',[
            'categories' => Category::all(),
            'users' => User::where('is_admin', 1)->get(),
        ]);
    }
}
