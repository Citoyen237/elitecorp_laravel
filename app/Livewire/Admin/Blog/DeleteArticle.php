<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Article;
use Livewire\Component;

class DeleteArticle extends Component
{
    public $articleId;
    public $name;

    public function mount($articleId)
    {
        $article = Article::findOrFail($articleId);
        $this->articleId = $article->id;
        $this->name = $article->title;
    }

    public function deletearticle($articleId)
    {
        $article = Article::findOrFail($articleId);
        $article->delete();

        session()->flash('message', 'Article supprimée avec succès.');
        return redirect()->route('admin.blog.article');
    }
    public function render()
    {
        return view('livewire.admin.blog.delete-article');
    }
}
