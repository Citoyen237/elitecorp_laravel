<div class="card">
    <div class="card-body">
      <h5 class="card-title">
        Confirmer la suppression
      </h5>
      <div class="card-body">
        <p>Êtes-vous sûr de vouloir supprimer l'élément "{{ $level }}" ?</p>
            <button wire:click="deleteCategory({{$levelId}})" class="btn btn-success">Confirmer</button>
            <a href="{{ route('admin.level.list') }}" class="btn btn-warning">Annuler</a>

      </div>
    </div>
  </div>
