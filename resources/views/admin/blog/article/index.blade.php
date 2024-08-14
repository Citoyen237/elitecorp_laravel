@extends('admin.app')

@section('title','liste article blog')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Blog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item">Articles</li>
                <li class="breadcrumb-item active">liste des articles</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

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
                            <a href="{{route('admin.blog.article.create')}}" class=' btn btn-primary'>Ajouter un
                                article</a>
                        </h5>
                        @livewire('admin.blog.list-article')
                    </div>

                </div>
            </div>
    </section>

</main><!-- End #main -->

@endsection
