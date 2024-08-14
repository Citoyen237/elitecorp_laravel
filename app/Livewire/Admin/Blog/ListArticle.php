<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Article;
use Livewire\Component;

class ListArticle extends Component
{
    public function render()
    {
        return view('livewire.admin.blog.list-article',[
            'articles'=>Article::with('category')->get()
        ]);
    }
}
