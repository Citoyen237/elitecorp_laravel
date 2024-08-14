@extends('admin.app')
@section('title', 'modifier un pack')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Les temoignages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Temoignage</li>
                <li class="breadcrumb-item active">modifier un temoignage</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.temoignage.update-temoignage',['temoignageId' => $temoignage->id])
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
