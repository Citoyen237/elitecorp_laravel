<div>
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            Confirmer la suppression
          </h5>
          <div class="card-body">
            <p>Êtes-vous sûr de vouloir supprimer l'élément "{{ $temoignage }}" ?</p>
                <button wire:click="deleteCategory({{$temoignageId}})" class="btn btn-success">Confirmer</button>
                <a href="{{ route('admin.temoignage.list') }}" class="btn btn-warning">Annuler</a>

          </div>
        </div>
      </div>
</div>
