<?php

namespace App\Livewire\Front\Blog;

use App\Models\Article;
use Livewire\Component;

class RecentArticle extends Component
{
    public function render()
    {
        return view('livewire.front.blog.recent-article',[
            'articles'=>Article::orderBy('created_at', 'desc')->take(4)->get()
        ]);
    }
}
