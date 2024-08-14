@extends('admin.app')
@section('title', 'supprimer un temoignage')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Cours</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Cours</a></li>
                <li class="breadcrumb-item active">supression des cours</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @livewire('admin.cours.delete-cours', ['courId' => $cour->id])
            </div>
        </div>
    </section>

</main>
