@extends('admin.app')
@section('title', 'Repondre a un message')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Messages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Messages</li>
                <li class="breadcrumb-item active">Repondre a un message</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.message.repondre-message',['messageId' => $message->id])
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
