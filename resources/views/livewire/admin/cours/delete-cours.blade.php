<div>
    <div>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                Confirmer la suppression
              </h5>
              <div class="card-body">
                <p>Êtes-vous sûr de vouloir supprimer l'élément "{{ $name }}" ?</p>
                    <button wire:click="deleteCategory({{$courId}})" class="btn btn-success">Confirmer</button>
                    <a href="{{ route('admin.cour.list') }}" class="btn btn-warning">Annuler</a>

              </div>
            </div>
          </div>
    </div>

</div>
