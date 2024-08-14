@extends('admin.app')
@section('title', 'ajouter une filiere')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Les niveaux</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Niveau</li>
                <li class="breadcrumb-item active">supprimer un niveau</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.level.delete-level',['levelId' => $level->id])
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
