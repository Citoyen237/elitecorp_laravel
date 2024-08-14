@extends('admin.app')
@section('title', 'supprimer un temoignage')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Temoignage</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Temoignages</a></li>
                <li class="breadcrumb-item active">supression des temoignages</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @livewire('admin.temoignage.delete-temoignage', ['temoignageId' => $temoignage->id])
            </div>
        </div>
    </section>

</main>
