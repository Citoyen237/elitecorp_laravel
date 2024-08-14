@extends('admin.app')
@section('title', 'modifier un pack')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Les offres</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Offres</li>
                <li class="breadcrumb-item active">modifier un abonnement</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.spack.update-spack',['spackId' => $spack->id])
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
