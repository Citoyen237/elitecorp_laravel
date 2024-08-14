@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show m-2" role="alert">

    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
    <div class="col-md-7">
        <div class="row">
            @if ($cart->items->isEmpty())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Votre panier est vide
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @else
            @foreach($cart->items as $item)
            <div class="card mb-3" style="max-width: 700px;">
                <div class="row g-0">
                    <div class="col-md-4 ml-1">
                        <img src="{{Storage::url($item->spack->image)}}" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6>{{$item->spack->title}}</h6>
                            <p class="card-text">Prix:&nbsp;{{number_format($item->spack->prix, 2, ',', '.')}}FCFA
                                &nbsp; <button wire:click='removeItem({{$item->id}})' class="btn btn-danger"><i
                                        class="fas fa-trash"></i></button></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="col-md-5">
        @if ($cart->items->isEmpty())
        @else
        <div class="card bg-light mb-2">
            <div class="card-body">
                <h4 class="card-title">Valider la commande</h4>
                <hr>
                <form action="" method="get">
                    <div class="input mb-3">
                        <a class=""><img src="{{ asset('front/img/mtn.jpg')}}" alt="Profile" class="mr-2"
                                style="height:3%;width:30%"></a>
                        <a class=""><img src="{{ asset('front/img/orange.png')}}" alt="Profile" class="p-2 m-2"
                                style="width:21%"></a>

                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <h6>Total</h6>
                        </div>
                        <a class="text-dark">{{number_format($total, 2, ',', '.')}} FCFA</a>
                    </div>
                    <div class="input mb-3">
                        <button wire:click.prevent='validateOrder'
                            class="btn btn-primary form-control text-dark">Confirmer</button>
                    </div>
            </div>

            </form>
        </div>
        @endif
    </div>
</div>
