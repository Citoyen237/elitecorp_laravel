@extends('admin.app')
@section('title', 'liste des categories')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Blog</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="#">Blog</a></li>
          <li class="breadcrumb-item">Cartegory</li>
          <li class="breadcrumb-item active">liste des categories</li>
        </ol>
      </nav>
    </div
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
                <h5 class="card-title">
                  <a href="{{route('admin.blog.category.create')}}" class=' btn btn-primary'>Ajouter une categorie</a>
                </h5>
                @livewire('admin.blog.list-category')
                </div>
            </div>

          </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
