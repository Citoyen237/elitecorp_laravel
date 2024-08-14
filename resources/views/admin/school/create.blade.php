@extends('admin.app')
@section('title', 'ajouter une ecole')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Les ecoles</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Ecole</li>
                <li class="breadcrumb-item active">Ajouter une ecole</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.school.create-school')
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
