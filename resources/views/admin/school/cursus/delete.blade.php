@extends('admin.app')
@section('title', 'supprimer une ecole')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Cursus</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Cursus</li>
                <li class="breadcrumb-item active">supressions d'un cursus</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @livewire('admin.cursus.delete-cursus', ['cursusId' => $cursus->id])
            </div>
        </div>
    </section>

</main>
@endsection
