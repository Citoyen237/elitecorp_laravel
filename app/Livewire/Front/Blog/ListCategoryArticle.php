<?php

namespace App\Livewire\Front\Blog;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ListCategoryArticle extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $categoriId;
    public function render()
    {
        return view('livewire.front.blog.list-category-article', [

            'articles' => Article::with('user')
                ->where('category_id', $this->categoriId->id)
                ->orderBy('created_at', 'asc')
                ->paginate(10)
        ]);
    }
}
