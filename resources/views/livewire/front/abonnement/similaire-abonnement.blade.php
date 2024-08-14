<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Abonnements similaire</p>
            <h1>Choisissez un abonnement</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($spacks as $spack)
            <div class="col">
                <div class="card h-100">
                    <a href="{{route('abonnement.detail', $spack)}}"><img src="{{Storage::url($spack->image)}}" class="card-img-top"
                            alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('abonnement.detail', $spack)}}"
                                class="card-title">{{$spack->title }} </a> </h5>
                        <p class="card-text"><strike> {{number_format($spack->old_price, 2, ',', '.')}}FCFA</strike>
                            <a href="{{route('abonnement.detail', $spack)}}">{{number_format($spack->prix, 2, ',', '.')}}FCFA</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
