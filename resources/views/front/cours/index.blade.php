@extends('front.appf')
@section('title', 'cours')
@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Epreuves</p>
            <h1>
                Les Cours Les Plus Populaires!
            </h1>
        </div>
        @livewire('front.cours.front-cours')
    
</div

@endsection
