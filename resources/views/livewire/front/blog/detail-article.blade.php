<div class="card mb-3">
    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$article->title}}</h5>
        <p class="card-text">{{$article->description}}</p>
    </div>
    <div class="card-footer text-primary">
        <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
            <!-- Checkbox -->
            <p>
                Auteur {{$article->user->name}}
            </p>
            {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans()}}
            <button wire:click.prevent='download({{$article->id}})' class="text-center btn btn-link"><i class="fas fa-download" style="font-size:30px"></i>
                Telecharger</button>
        </div>

    </div>
</div>
