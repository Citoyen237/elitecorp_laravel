<div>
    <div>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                Confirmer la suppression
              </h5>
              <div class="card-body">
                <p>Êtes-vous sûr de vouloir supprimer l'élément "{{ $message }}" ?</p>
                    <button wire:click="deleteCategory({{$messageId}})" class="btn btn-success">Confirmer</button>
                    <a href="{{ route('admin.message.list') }}" class="btn btn-warning">Annuler</a>

              </div>
            </div>
          </div>
    </div>

</div>
