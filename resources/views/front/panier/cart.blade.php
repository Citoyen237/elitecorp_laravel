@extends('front.appf')
@section('title', 'mon panier')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Panier</p>
            <h1>
                Abonnements selectionnes!
            </h1>
        </div>
    </div>
</div>
<div class="container">
    @livewire('front.panier')
</div>
@endsection
