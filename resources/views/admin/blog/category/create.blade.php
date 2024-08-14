@extends('admin.app')
@section('title', 'ajouter une categorie')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Blog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Blog</li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active">Ajouter une categorie d'article</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.blog.create-category')
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
