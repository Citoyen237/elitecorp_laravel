@extends('admin.app')
@section('title', 'supprimer une filiere')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Les filiere</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Filiere</li>
                <li class="breadcrumb-item active">Supprimer une filiere</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.stream.delete-stream', ['streamId' => $stream->id])
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
