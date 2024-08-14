@extends('admin.app')
@section('title', 'ajouter un temoignage')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Les Temoignages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Temoignages</li>
                <li class="breadcrumb-item active">Ajouter un temoignage</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.temoignage.create-temoignage')
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
