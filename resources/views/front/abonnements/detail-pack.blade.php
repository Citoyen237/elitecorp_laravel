@extends('front.appf')
@section('title', 'detail de sur abonnemnt')
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">


        @livewire('front.abonnement.detail-spack', ['spack' => $spack])

    </div>
    @livewire('front.abonnement.similaire-abonnement')
</section>
@endsection
