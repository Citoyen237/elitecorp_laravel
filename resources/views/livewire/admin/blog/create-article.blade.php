<form wire:submit.prevent="submit">
    @csrf
    <div class="m-2">
        <label for="title" class="form-label">Titre:</label>
        <input type="text" id="title" wire:model="title" class="form-control">
        @error('title') <span class="text-danger">*{{ $message }}</span> @enderror
    </div>
    <div class="m-2">
        <label for="description">Description:</label>
        <textarea id="description" wire:model.defer="description" class="form-control" rows="5"></textarea>
        @error('description') <span class="text-danger">*{{ $message }}</span> @enderror
    </div>

    <div class="m-2">
        <label for="image">Image:</label>
        <input type="file" id="image" wire:model="image" class="form-control">
        @error('image') <span class="text-danger">*{{ $message }}</span> @enderror
    </div>

    <div class="m-2">
        <label for="pdf">Fichier pdf:</label>
        <input type="file" id="pdf" wire:model="file" class="form-control">
        @error('file') <span class="text-danger">*{{ $message }}</span> @enderror
    </div>

    <div class="m-2">
        <label for="category_id">Catégorie:</label>
        <select id="category_id" wire:model="category_id" class="form-select">
            <option value="">Sélectionner une catégorie</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <span class="text-danger">*{{ $message }}</span> @enderror
    </div>

    <div class="m-2">
        <label for="user_id">Utilisateur:</label>
        <select id="user_id" wire:model="user_id" class="form-select">
            <option value="">Sélectionner un utilisateur</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error('user_id') <span class="text-danger">*{{ $message }}</span> @enderror
    </div>

    <div class="m-2">
        <button type="submit" class="form-control btn btn-primary">Enregistrer</button>
    </div>
</form>

