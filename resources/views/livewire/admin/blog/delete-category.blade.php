<div class="card-body">
    <h1>Confirmer la suppression</h1>
    <p>Êtes-vous sûr de vouloir supprimer l'élément "{{ $name }}" ?</p>

        <button wire:click="deleteCategory({{$categoryId}})" class="btn btn-success">Confirmer</button>
        <a href="{{ route('admin.blog.category') }}" class="btn btn-warning">Annuler</a>
    
  </div>
