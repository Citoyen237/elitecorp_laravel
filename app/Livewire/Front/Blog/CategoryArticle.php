<?php

namespace App\Livewire\Front\Blog;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryArticle extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.front.blog.category-article',[
            'categories'=>Category::orderBy('name','asc')->paginate(6)
        ]);
    }
}
