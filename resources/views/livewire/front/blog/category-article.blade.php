<div class="card-body">
    <h4 class="card-title">Categories</h4>
    <hr>

    @foreach ($categories as $item)
    <p class="text-primary">
        <a href="{{route('blog.categori', $item)}}">
            {{$item->name}} ({{$item->articles->count()}})
        </a>
    </p>
    @endforeach
    <div class="pagination pagination-sm pull-right">
        {{ $categories->links() }}
    </div>
</div>
