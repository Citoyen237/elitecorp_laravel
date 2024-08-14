<?php

namespace App\Livewire\Front\Blog;

use App\Models\Article;
use Livewire\Component;


class BogComponent extends Component
{
    public function render()
    {
        return view('livewire.front.blog.bog-component',[
            'articles'=>Article::orderBy('created_at', 'desc')->take(4)->get()
        ]);
    }
}
