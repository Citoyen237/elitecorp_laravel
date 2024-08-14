<form wire:submit.prevent="submit">
    @csrf
    <div class="m-2">
        <label for="title" class="form-label">Libelle de la categorie:</label>
        <input type="text" id="title" wire:model="name" class="form-control">
        @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
    </div>
    <div class="m-2">
        <button type="submit" class="form-control btn btn-primary">Enregistrer</button>
    </div>
</form>
