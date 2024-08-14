
<div class="card-body">
    <h4 class="card-title">Articles récents</h4>
    <hr>
   @foreach ($articles as $article)
    <div class="card mb-3" style="max-width: 700px;">
        <div class="row g-0">
            <div class="col-md-4 ml-1">
                <a href="{{route('blog.detail', $article)}}"><img src="{{Storage::url($article->image)}}"
                        class="img-fluid" alt="..."></a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h6><a href="{{route('blog.detail', $article)}}">{{$article->title}}</a></h6>
                    <p class="card-text">{{ implode(' ', array_slice(explode(' ', $article->description), 0, 8))}} ...</p>
                    <p class="card-text"><small class="text-body-secondary">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans()}}</small></p>
                </div>
            </div>
        </div>
    </div>



    @endforeach

</div>
