<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
    public $libelle;
    protected $rules = [
        'libelle' => 'required|string|max:255|unique:categories,name',
    ];
    public function submit()
    {
        $this->validate();

        $categori = new Category();
        $categori->name = $this->libelle;

        $categori->save();
        session()->flash('message', 'categorie créé avec succès.');

        return redirect()->route('admin.blog.category');
    }
    public function render()
    {
        return view('livewire.admin.blog.create-category');
    }
}

// use WithFileUploads;

//     public $title;
//     public $description;
//     public $image;
//     public $pdf;
//     public $category_id;
//     public $user_id;

//     protected $rules = [
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//         'image' => 'nullable|image',
//         'pdf' => 'nullable|file|mimes:pdf',
//         'category_id' => 'required|integer|exists:categories,id',
//         'user_id' => 'required|integer|exists:users,id',
//     ];

    // public function submit()
    // {
    //     $this->validate();

    //     $article = new Article();
    //     $article->title = $this->title;
    //     $article->description = $this->description;

    //     if ($this->image) {
    //         $article->image = $this->image->store('images');
    //     }

    //     if ($this->pdf) {
    //         $article->pdf = $this->pdf->store('pdfs');
    //     }

    //     $article->category_id = $this->category_id;
    //     $article->user_id = $this->user_id;
    //     $article->save();

    //     session()->flash('message', 'Article créé avec succès.');

    //     return redirect()->route('articles.index');
    // }

//     public function render()
//     {
//         return view('livewire.article-form', [
//             'categories' => Category::all(),
//             'users' => User::all(),
//         ]);
//     }
// }
