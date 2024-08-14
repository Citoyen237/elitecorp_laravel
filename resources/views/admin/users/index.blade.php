@extends('admin.app')
@section('title', 'gestion des utilisateurs')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Utilisateurs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item">Utilisateur</li>
          <li class="breadcrumb-item active">Gestion des utilisateurs</li>
        </ol>
      </nav>
    </div>
    <section class="section">
        <div class="row">
          <div class="col-lg-12">
           @livewire('admin.users.list-users')
          </div>
        </div>
      </section>

    </main>
@endsection
