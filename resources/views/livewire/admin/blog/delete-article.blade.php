<div class="card-body">
    <h1>Confirmer la suppression</h1>
    <p>Êtes-vous sûr de vouloir supprimer l'élément "{{ $name }}" ?</p>

        <button wire:click="deletearticle({{$articleId}})" class="btn btn-success">Confirmer</button>
        <a href="{{ route('admin.blog.article') }}" class="btn btn-warning">Annuler</a>

  </div>
