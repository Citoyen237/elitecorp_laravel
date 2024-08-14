<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="m-2">
            <label for="title" class="form-label">Nom:</label>
            <input type="text" id="title" wire:model="school" name="school" class="form-control">
            @error('school') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="title" class="form-label">Ville:</label>
            <input type="text" id="title" wire:model="city" name="city" class="form-control">
            @error('city') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="title" class="form-label">Abreviation:</label>
            <input type="text" id="title" name="slug" wire:model="slug" class="form-control">
            @error('slug') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <button type="submit" class="form-control btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
