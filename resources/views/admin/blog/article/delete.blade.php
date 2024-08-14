@extends('admin.app')
@section('title', 'supprimer une categorie')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Blog</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="#">Blog</a></li>
          <li class="breadcrumb-item">Article</li>
          <li class="breadcrumb-item active">supressions des articles</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            @livewire('admin.blog.delete-article',['articleId' => $article->id])
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
