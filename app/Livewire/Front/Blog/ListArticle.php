<?php

namespace App\Livewire\Front\Blog;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ListArticle extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.front.blog.list-article', [
            'articles' => Article::with('user')
                ->orderBy('created_at', 'asc')
                ->paginate(10)
        ]);
    }
}
