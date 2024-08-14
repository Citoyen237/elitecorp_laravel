<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <form wire:submit.prevent="submit">
        @csrf
        <div class="m-2">
            <label for="title" class="form-label">Titre:</label>
            <input type="text" id="title" wire:model="title" name="title" class="form-control">
            @error('title') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="description">Description:</label>
            <textarea id="description" wire:model.defer="description" class="form-control"></textarea>
            @error('description') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="school_id">Ecoles:</label>
            <select id="school_id" wire:model="school_id" class="form-select">
                <option value="">Sélectionner une ecole</option>
                @foreach($schools as $school)
                <option value="{{ $school->id }}">{{ $school->school }}</option>
                @endforeach
            </select>
            @error('school_id') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="title" class="form-label">Ancien prix(FCFA):</label>
            <input type="text" id="title" wire:model="old_prix" name="old_prix" class="form-control">
            @error('old_prix') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>

        <div class="m-2">
            <label for="title" class="form-label">Nouveau prix(FCFA):</label>
            <input type="text" id="title" name="prix" wire:model="prix" class="form-control">
            @error('prix') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>

        <div class="m-2">
            <label for="title" class="form-label">Duree (En moi):</label>
            <input type="text" id="title" name="duree" wire:model="duree" class="form-control">
            @error('duree') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="image">Image:</label>
            <input type="file" id="image" wire:model="image" class="form-control">
            @error('image') <span class="text-danger">*{{ $message }}</span> @enderror
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
</div>
