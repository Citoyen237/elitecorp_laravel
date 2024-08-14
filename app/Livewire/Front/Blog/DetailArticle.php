<?php

namespace App\Livewire\Front\Blog;

use App\Models\Article;
use Livewire\Component;

class DetailArticle extends Component
{
   public $articleId;

   public $id;

    public function download($id)
    {
        // Récupérer le fichier depuis la base de données ou un autre moyen
        $file = Article::findOrFail($id);

        // Chemin vers le fichier sur le système de fichiers
        $filePath = storage_path('app/public/' . $file->file);

        // Téléchargement du fichier
        return response()->download($filePath, $file->title.'.pdf');
    }

    public function render()
    {
        return view('livewire.front.blog.detail-article',[
            'article'=>Article::findOrFail($this->articleId->id)
        ]);
    }
}
