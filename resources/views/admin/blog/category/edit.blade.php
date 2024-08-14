@extends('admin.app')
@section('title', 'modifier')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Blog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Blog</li>
                <li class="breadcrumb-item">Categorie</li>
                <li class="breadcrumb-item active">modifier</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card">
              <div class="card-body">
                @livewire('admin.blog.edit-category',['categoryId' => $category->id])
                </div>
            </div>

          </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
