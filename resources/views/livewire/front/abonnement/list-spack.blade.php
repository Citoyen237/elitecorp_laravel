<div class="row row-cols-1 row-cols-md-3 g-4">
@forelse ($packs as $spack)
<div class="col">
    <div class="card h-100">
        <a href="{{route('abonnement.detail', $spack)}}"><img src="{{Storage::url($spack->image)}}" class="card-img-top" alt="..."></a>
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('abonnement.detail', $spack)}}" class="card-title">{{$spack->title }} </a> </h5>
            <p class="card-text"><strike> {{number_format($spack->old_price, 2, ',', '.')}}</strike>FCFA
                <a href="{{route('abonnement.detail', $spack)}}">{{number_format($spack->prix, 2, ',', '.')}}FCFA</a>
            </p>
        </div>
    </div>
    <div class="pagination pagination-sm pull-right">
        {{ $packs->links() }}
    </div>
</div>
@empty
@endforelse
</div>

