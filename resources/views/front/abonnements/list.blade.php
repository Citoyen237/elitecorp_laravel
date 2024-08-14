@extends('front.appf')
@section('title', 'abonnement')
@section('content')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Abonnements</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="{% url 'front.index' %}" href="#">Accueil</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Abonnements</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Abonnements</p>
            <h1>Choisissez un abonnement</h1>
        </div>
        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show m-2" role="alert">

            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @livewire('front.abonnement.list-spack')
        

    </div>
</div>
@endsection
