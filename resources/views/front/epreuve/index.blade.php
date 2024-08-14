@extends('front.appf')
@section('title', 'epreuve')
@section('content')
<style>
    /* styles.css */
    .tree ul {
        list-style-type: none;
    }

    .tree ul,
    .tree li {
        margin: 0;
        padding: 0;
    }

    .tree .caret {
        cursor: pointer;
        user-select: none;
    }

    .tree .caret::before {
        content: "\25B6";
        /* Triangle pointing right */
        color: black;
        display: inline-block;
        margin-right: 6px;
    }

    .tree .caret-down::before {
        transform: rotate(90deg);
        /* Triangle pointing down */
    }

    .tree .nested {
        display: none;
    }

    .tree .active {
        display: block;
    }
</style>
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5  justify-content-center">
        <h5 class="display-3 text-warning mb-3 animated slideInDown text-center">
            Téléchargez gratuitement les EPREUVES des CONCOURS liés a votre
            ABONNEMENT ! </h5>
        <form action="" method="get">
            {{-- <div class="input-group mb-3">
                <input placeholder="" type="text" class="justify-content-center form-control"
                    aria-label="Example text with button addon" aria-describedby="button-addon1">
                <button class="btn btn-primary" type="button" id="button-addon1"><i class="fa fa-search"></i></button>
            </div> --}}
        </form>
        <h5 class="text-center text-warning text-lg">
        </h5>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Epreuves</p>
            <h4 class="text-danger">
                Vous pouvez uniquement VOIR et TÉLÉCHARGER que les ÉPREUVES liées à votre ABONNEMENT !
            </h4>
        </div>
    </div>
    @livewire('front.epreuve.epreuve-list')
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toggler = document.getElementsByClassName("caret");
        for (var i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function () {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    });
</script>
