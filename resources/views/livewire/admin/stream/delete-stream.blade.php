<div class="card">
    <div class="card-body">
      <h5 class="card-title">
        Confirmer la suppression
      </h5>
      <div class="card-body">
        <p>Êtes-vous sûr de vouloir supprimer l'élément "{{ $stream }}" ?</p>
            <button wire:click="deleteCategory({{$streamId}})" class="btn btn-success">Confirmer</button>
            <a href="{{ route('admin.stream.list') }}" class="btn btn-warning">Annuler</a>
      </div>
    </div>
  </div>
