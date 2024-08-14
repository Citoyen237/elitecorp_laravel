@extends('admin.app')
@section('title', 'liste des cours')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Cours</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item">Cours</li>
          <li class="breadcrumb-item active">liste des cours</li>
        </ol>
      </nav>
    </div>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
            @livewire('admin.cours.list-cours')
            </div>

          </div>
        </div>
      </section>

    </main>
@endsection
