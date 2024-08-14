<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="m-2">
            <label for="title" class="form-label">Nom:</label>
            <input type="text" id="title" wire:model="name" name="name" class="form-control">
            @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="title" class="form-label">Proffession:</label>
            <input type="text" id="title" wire:model="proffession" name="proffession" class="form-control">
            @error('proffession') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="image">Image:</label>
            <input type="file" id="image" wire:model="image" class="form-control">
            @error('image') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="title" class="form-label">Message:</label>
            <textarea id="description" wire:model.defer="message" class="form-control"></textarea>
            @error('message') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <button type="submit" class="form-control btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
