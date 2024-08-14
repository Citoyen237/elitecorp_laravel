<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{

    /**
     * Log the current user out of the application.
     */
    public function logout(){
        Auth::logout();
    }
}; ?>
@php
$currentUrl = url()->current();
@endphp
@php
// Récupère ou crée un panier pour l'utilisateur connecté
$cart = Auth::check() ? \App\Models\Cart::with('items')->firstOrCreate(['user_id' => Auth::id()]) : null;
$itemCount = $cart ? $cart->items->sum('quantity') : 0;
@endphp
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
    <a href="" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h1 class="m-0 text-primary"><img src="{{ asset('front/img/logo1.PNG') }}" alt="" width=" @auth 100%  @else 31% @endauth "></h1>
    </a>

    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{route('indexF')}}" class="nav-item nav-link
            {{ $currentUrl == route('indexF') ? 'active':''}}
            ">Accueil</a>
            <a href="{{route('abonnement.abonnement')}}" class="nav-item nav-link
            {{ $currentUrl == route('abonnement.abonnement') ? 'active':''}}
            ">Abonnements</a>
            <a href="{{route('epreuve.index')}}" class="nav-item nav-link
            {{ $currentUrl == route('epreuve.index') ? 'active':''}}
            ">Epreuves</a>
            @auth
            <a href="{{route('abonnement.mes-abonnement')}}" class="nav-item nav-link
            {{ $currentUrl == route('abonnement.mes-abonnement') ? 'active':''}}
            ">Mes_abonnements</a></p>
            @endauth
            <a href="{{route('cart')}}" class="nav-item nav-link">
               <i class="fa fa-shopping-cart text-warning">_0{{$itemCount}} </i>
                </a>
            <a href="{{ route('cours')}}" class="nav-item nav-link
             {{ $currentUrl == route('cours') ? 'active':''}}
            ">Cours</a>
            <a href="{{route('apprentissage')}}" class="nav-item nav-link
              {{ $currentUrl == route('apprentissage') ? 'active':''}}
            ">Apprentissage</a>
            <a href="{{route('blog.articles')}}" class="nav-item nav-link
            {{ $currentUrl == route('blog.articles') ? 'active':''}}
            ">Blog</a>
            <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->

            <a href="{{route('contact')}}" class="nav-item nav-link
            {{ $currentUrl == route('contact') ? 'active':''}}
            ">Contact</a>

        </div>
        <!-- Vos liens de navigation
        {{-- @guest
        <p>Vous êtes un visiteur. Veuillez vous inscrire ou vous connecter.</p>
     @endguest --}}
        <span>Bonjour,user.last_name!</span> -->
        @auth
        <button wire:click.prevent="lgout" type="submit" class="text-dark btn btn-link">
            <i class="fa fa-user  text-center" style="font-size:25px"></i>
        <span> {{ Auth::user()->name }} </span>
           <p class="text-warning">Se_déconnecter</p>
        </button>
        @else
        <a href="{{route('login')}}" class="text-dark">
            <i class="fa fa-user  text-center" style="font-size:25px"></i>
            <p>S'identifier</p>
        </a>
        @endauth
    </div>
</nav>
<!-- Navbar End -->
