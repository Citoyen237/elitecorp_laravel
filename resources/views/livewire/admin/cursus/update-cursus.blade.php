<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <form wire:submit.prevent="submit">
        @csrf
        <div class="m-2">
            <label for="title" class="form-label">Nom du cursus:</label>
            <input type="text" id="title" wire:model="name" name="name" class="form-control">
            @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="school_id">Ecoles:</label>
            <select id="school_id" wire:model="school_id" class="form-select">
                <option value="">Sélectionner une ecole</option>
                @foreach($schools as $school)
                <option value="{{ $school->id }}">{{ $school->school }}_{{ $school->city }}</option>
                @endforeach
            </select>
            @error('school_id') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <button type="submit" class="form-control btn btn-primary">Mettre a jour</button>
        </div>
    </form>
</div>
