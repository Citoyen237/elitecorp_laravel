<div class="row row-cols-1 row-cols-md-4 g-4">
    <div class="col">
        @forelse ($cours as $cour)
        <div class="card h-100">
            <img src="{{Storage::url($cour->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$cour->name}}</h5>
                <p class="card-text">{{$cour->description}}</p>
                <button wire:click='download({{$cour->id}}) 'class="text-center btn btn-link"><i class="fas fa-download" style="font-size:30px"></i>
                    Telecharger</button>
            </div>
        </div>
    </div>
    @empty
</div>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
    Aucun cours n'a ete trouver
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforelse
</div>
