<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="m-2">
            <label for="title" class="form-label">Email:</label>
            <input type="email" id="email" wire:model="email" class="form-control" readonly>
            @error('email') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="description">Message:</label>
            <textarea readonly id="description" wire:model.defer="message" class="form-control"></textarea>
            @error('message') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="description">Votre reponse:</label>
            <textarea id="reponse" wire:model.defer="reponse" class="form-control"></textarea>
            @error('reponse') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>

        <div class="m-2">
            <button type="submit" class="form-control btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
