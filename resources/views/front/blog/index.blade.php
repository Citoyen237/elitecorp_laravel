@extends('front.appf')
@section('title', 'blog')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Blog</p>
            <h1>
                Actualites de categories
            </h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            @livewire('front.blog.list-article')
        </div>
        <div class="col-md-4">
            <div class="card  bg-light mb-2">

                <div class="card-body">
                    <form action="" method="get">
                        <div class="input-group mb-3">
                            <input placeholder="rechercher article" type="text"
                                class="justify-content-center form-control" aria-label="Example text with button addon"
                                aria-describedby="button-addon1">
                            <button class="btn btn-primary" type="button" id="button-addon1"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card bg-light mb-2">

                @livewire('front.blog.category-article')
            </div>

            <div class="card bg-light mb-2">
                @livewire('front.blog.recent-article')
            </div>
        </div>
    </div>
</div>
@endsection
