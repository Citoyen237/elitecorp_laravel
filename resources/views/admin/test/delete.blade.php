@extends('admin.app')
@section('title', 'ajouter une filiere')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Epreuves</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Filiere</li>
                <li class="breadcrumb-item active">Supprimer une epreuve</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.test.delete-test',['testId'=>$test->id])
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
