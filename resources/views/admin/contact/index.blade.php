@extends('admin.app')
@section('title','liste des messages')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Messages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Message</li>
                <li class="breadcrumb-item active">liste des messages</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    @livewire('admin.message.list-message')
                </div>

            </div>
        </div>
    </section>

</main>

@endsection
