<div>
    <style>
        /* styles.css */
        .tree ul {
            list-style-type: none;
        }

        .tree ul,
        .tree li {
            margin: 0;
            padding: 0;
        }

        .tree .caret {
            cursor: pointer;
            user-select: none;
        }

        .tree .caret::before {
            content: "\25B6";
            /* Triangle pointing right */
            color: black;
            display: inline-block;
            margin-right: 6px;
        }

        .tree .caret-down::before {
            transform: rotate(90deg);
            /* Triangle pointing down */
        }

        .tree .nested {
            display: none;
        }

        .tree .active {
            display: block;
        }

        li.item:hover{
            background-color: blue;
          /* color: blue; */
        }
    </style>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @if (session()->has('message'))
    <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">

        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!-- Debugging -->
    <div class="m-2">
        <label for="school_id">Ecoles:</label>
        {{-- <select id="school_id" wire:model='school_id' name="school_id" class="form-select"> --}}
            {{-- <option value="">Sélectionner une ecole</option> --}}
            <div class="tree border p-2">
                <ul>

                    <li>
                        <span class="caret"><i class="fa fa-folder">{{$libelle}}</i>

                            <ul class="nested form-control">
                                @foreach($schools as $school)
                                <li class="item"><button class="btn btn-lick" wire:model='cursus_id' wire:click='test({{ $school->id }})'>{{
                                    $school->school }}_{{
                                        $school->city }}
                                </button></li>
                                @endforeach
                            </ul>
                        </span>
                    </li>

                </ul>
            </div>
            {{-- <option value="{{ $school->id }}"> {{ $school->school }}</option> --}}

            {{--
        </select> --}}
        @error('school_id') <span class="text-danger">*{{ $message }}</span> @enderror
    </div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="m-2">
            <label for="cursus_id">Cursus:</label>
            <select id="school_id" wire:model="cursus_id" class="form-select">
                <option value="">Sélectionner un cursus</option>
                @foreach($cursuss as $cursus)
                <option value="{{ $cursus->id }}">{{ $cursus->name }}</option>
                @endforeach
            </select>
            @error('cursus_id') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="m-2">
            <label for="title" class="form-label">Nom du niveau:</label>
            <input type="text" id="title" wire:model="name" name="name" class="form-control">
            @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>

        <div class="m-2">
            <button type="submit" class="form-control btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toggler = document.getElementsByClassName("caret");
        for (var i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function () {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    });
</script>
