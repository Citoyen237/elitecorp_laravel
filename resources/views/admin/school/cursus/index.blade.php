@extends('admin.app')
@section('title', 'liste des cursus')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Cursus</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Cursus</li>
                <li class="breadcrumb-item active">liste des cursus</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    @livewire('admin.cursus.list-cursus')
                </div>

            </div>
        </div>
    </section>

</main>
@endsection
