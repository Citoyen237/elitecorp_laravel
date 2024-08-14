@extends('admin.app')
@section('title', 'supprimer un pack')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pack</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Pack</a></li>
                <li class="breadcrumb-item active">supression des packs</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @livewire('admin.spack.delete-spack', ['spackId' => $spack->id])
            </div>
        </div>
    </section>

</main>
