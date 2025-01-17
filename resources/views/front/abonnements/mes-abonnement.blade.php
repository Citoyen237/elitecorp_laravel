@extends('front.appf')
@section('title', 'mes abonnements')
@section('content')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Mes abonnements</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="{{route('indexF')}}" href="#">Accueil</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Mes abonnements</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    @livewire('front.abonnement.user-abonnement')
</div>
@endsection
