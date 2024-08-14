
<form wire:submit.prevent="submit">
    @csrf
    <div class="m-2">
        <label for="title" class="form-label">Libelle de la categorie:</label>
        <input type="text" id="title" wire:model="libelle" class="form-control">
        @error('libelle') <span class="text-danger">*{{ $message }}</span> @enderror
    </div>
    <div class="m-2">
        <button type="submit" class="form-control btn btn-primary">Enregistrer</button>
    </div>
</form>

    {{-- <div>
        <label for="description">Description:</label>
        <textarea id="description" wire:model.defer="description"></textarea>
        @error('description') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="image">Image:</label>
        <input type="file" id="image" wire:model="image">
        @error('image') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="pdf">PDF:</label>
        <input type="file" id="pdf" wire:model="pdf">
        @error('pdf') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="category_id">Catégorie:</label>
        <select id="category_id" wire:model="category_id">
            <option value="">Sélectionner une catégorie</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="user_id">Utilisateur:</label>
        <select id="user_id" wire:model="user_id">
            <option value="">Sélectionner un utilisateur</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error('user_id') <span class="error">{{ $message }}</span> @enderror
    </div> --}}



<!-- Inclure TinyMCE depuis le CDN -->
{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener('livewire:load', function () {
        tinymce.init({
            selector: 'textarea#description',
            setup: function (editor) {
                editor.on('Change', function (e) {
                    @this.set('description', editor.getContent());
                });
            }
        });

        window.livewire.on('contentChanged', content => {
            tinymce.get('description').setContent(content);
        });
    });
</script> --}}

