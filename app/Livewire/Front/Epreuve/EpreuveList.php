<?php

namespace App\Livewire\Front\Epreuve;

use App\Models\Order;
use App\Models\School;
use App\Models\Spack;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class EpreuveList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $epreuves = [];
    public $orders = [];
    // public $schools = [];
    public $hasActiveProduct, $error_message;
    public $search, $searchSchool;

    public function get_school_cursus_level_stream($streamId){
       $this->epreuves = Test::where('stream_id',$streamId)->get();
       $this->error_message = "";
    }

    public function get_epreuve_cursus($cursusId){
        $this->epreuves = Test::where('curriculum_id',$cursusId)->get();
        $this->error_message = "";
    }

    public function get_epreuve_level($levelId){
        $this->epreuves = Test::where('level_id', $levelId)->get();
        $this->error_message = "";
    }

    public function get_epreuve_school($schoolId){
        $this->epreuves = Test::where('school_id', $schoolId)->get();
        $this->error_message = "";
    }


    public function get_search(){
        // dd('ok');
        $this->epreuves =Test::where('name', 'LIKE',"%{$this->search}%")->get();
        // $this->search='';
        $this->error_message = "";
    }

    public function get_search_school(){
        $this->schools =School::where('school', 'LIKE',"%{$this->searchSchool}%")
                               ->orWhere('slug', 'LIKE', "%{$this->searchSchool}%")->get();
        // $this->searchSchool='';
        $this->error_message = "";
    }

    // public function mount(){

    // }

    // Avec ces étapes, tu pourras vérifier et afficher si un produit est présent dans les commandes d'un utilisateur et s'il n'est pas encore expiré.
    public function download($id)
    {
        // Récupérer le fichier depuis la base de données ou un autre moyen
        $file = Test::findOrFail($id);
        $product=$file->school_id;
        $productId = Spack::where('school_id',$product)->first();
        if($productId){
             //on verifie si l'epreuve est dans les abonnements du user et vois si il n'a pas encore expirer
        $this->hasActiveProduct = Auth::user()->hasActiveProduct($productId->id);

        if($this->hasActiveProduct){
           $filePath = storage_path('app/public/' . $file->file);
           // Téléchargement du fichier
            $name = $file->name.'_'.$file->year;
       return response()->download($filePath, $name.'.pdf');

        // $document = Document::findOrFail($id);
        // $filePath = storage_path('app/' . $document->file_path);
        // return Respo::download($filePath, $name . '.pdf');
        }else{
           $this->error_message  = "Cette epreuve n'est pas presente dans vos abonnenements. Abonnez vous a l'ecole qui contient cette epreuve ou votre abonnement a cette ecole est expires";
        }
       // Chemin vers le fichier sur le système de fichiers

        }else{
            $this->error_message  = "Cette epreuve n'est pas presente dans vos abonnenements. Abonnez vous a l'ecole qui contient cette epreuve ou votre abonnement a cette ecole est expires";
        }


    }

    // public function mount(){
    //     $this->schools = School::with('curriculum','levels','streams')->orderBy('school','asc')->get();
    // }

    public function render()
    {
        return view('livewire.front.epreuve.epreuve-list',[
            'schools'=>School::with('curriculum','levels','streams')->orderBy('school','asc')->paginate(20)
        ]);
    }
}
