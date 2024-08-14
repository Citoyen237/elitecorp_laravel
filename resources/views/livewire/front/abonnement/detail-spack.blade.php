<div class="row gx-4 gx-lg-5 align-items-center">
    @if (session()->has('success'))
    <p>{{ session('success') }}</p>
@endif
    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{Storage::url($spack->image)}}"></div>
    <div class="col-md-6">
        <h4 class="display-5 fw-bolder">{{$spack->title}}</h4>
        <div class="mb-1">Duree {{$spack->duree}} mois</div>
        <div class="fs-5 mb-5">
            <span class="text-decoration-line-through">{{number_format($spack->old_price, 2, ',', '.')}}FCFA</span>
             <span class="text-dark">{{number_format($spack->prix, 2, ',', '.')}}FCFA</span>
        </div>
        <p class="lead">{{$spack->description}}</p>
        <div class="d-flex">
            @auth
            <button wire:click="addToCart({{ $spack->id }})" class="btn btn-outline-warning flex-shrink-0" href="{% url 'add_to_cart' pack.id %}">
                <i class="bi-cart-fill me-1"></i>
                Ajouter au panier
            </button>
            @else
            <h6><a href="{{ route('login')}}">Connectez-vous</a> avant d’ajouter au panier</a></h6>
            @endauth
        </div>
    </div>
</div>
