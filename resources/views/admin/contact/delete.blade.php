@extends('admin.app')
@section('title', 'supprimer un message')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Messages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Messages</a></li>
                <li class="breadcrumb-item active">supression des messages</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @livewire('admin.message.delete-message', ['messageId' => $message->id])
            </div>
        </div>
    </section>

</main>
