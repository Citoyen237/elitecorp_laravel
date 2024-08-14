@extends('admin.app')
@section('title', 'modifier un cours')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Cours</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Cours</li>
                <li class="breadcrumb-item active">modifier un cours</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.cours.update-cours',['courId' => $cour->id])
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
