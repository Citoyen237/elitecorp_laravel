<div class="row">

    @foreach ($articles as $article)
    <div class="card col-md-5 m-1">
        <a href="{{route('blog.detail', $article)}}">
            <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
        </a>
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('blog.detail', $article)}}">{{$article->title}}</a></h5>
            <p class="card-text">{{ implode(' ', array_slice(explode(' ', $article->description), 0, 15))}} ...</p>
            <p class="card-text"><small class="text-body-secondary">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans()}}</small></p>
        </div>
    </div>
    @endforeach

    <div class="pagination pagination-sm pull-right">
        {{ $articles->links() }}
    </div>
</div>

