<?php

namespace App\Livewire\Front\Cours;

use App\Models\Cours;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class FrontCours extends Component
{
    public $id;

    public function download($id)
    {
        // Récupérer le fichier depuis la base de données ou un autre moyen
        $file = Cours::findOrFail($id);

        // Chemin vers le fichier sur le système de fichiers
        $filePath = storage_path('app/public/' . $file->file);

        // Téléchargement du fichier
        return response()->download($filePath, $file->name.'.pdf');
    }

    // public function download($id)
    // {
    //     // Récupérer le fichier depuis la base de données
    //     $file = Cours::findOrFail($id);

    //     // Créer un fichier temporaire pour le téléchargement
    //     $tempFilePath = tempnam(sys_get_temp_dir(), 'file');
    //     file_put_contents($tempFilePath, $file->file); // Assurez-vous que 'file' contient le contenu binaire du fichier

    //     // Préparer les headers pour le téléchargement
    //     $headers = [
    //         'Content-Type' => $file->mime_type, // Assurez-vous que mime_type est correct
    //     ];

    //     // Téléchargement du fichier
    //     return response()->download($tempFilePath, $file->name, $headers)->deleteFileAfterSend(true);
    // }

    public function render()
    {
        return view('livewire.front.cours.front-cours',[
          'cours'=>Cours::orderBy('name','asc')->get()
        ]);
    }
}
