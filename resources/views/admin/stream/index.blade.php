@extends('admin.app')
@section('title', 'liste de filiere')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Les filiere</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">filiere</li>
                <li class="breadcrumb-item active">Liste des filieres</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.stream.list-stream')
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
