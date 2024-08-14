@extends('admin.app')
@section('title', 'liste des packs')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Les offres</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item">Offres</li>
          <li class="breadcrumb-item active">liste des Pack</li>
        </ol>
      </nav>
    </div>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
            @livewire('admin.spack.list-spack')
            </div>

          </div>
        </div>
      </section>

    </main>
@endsection
