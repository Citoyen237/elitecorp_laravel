@extends('admin.app')
@section('title', 'liste des subscriptions')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Subscriptions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item">Subscriptions</li>
          <li class="breadcrumb-item active">liste des subscriptions</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            @livewire('admin.subscription')
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
