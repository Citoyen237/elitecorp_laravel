@extends('admin.app')
@section('title', 'ajouter un cour')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Cours</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Cours</li>
                <li class="breadcrumb-item active">Ajouter un cour</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.cours.create-cours')
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
