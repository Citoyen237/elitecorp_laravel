@extends('front.appf')
@section('title', 'apprentissage')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <img class="img-fluid rounded w-75 align-self-end" src="{{asset('front/img/learning_img.PNG' )}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">
                    QUELLE COMPETENCE?
                </h1>
                <p>Au-delà des connaissances livresques n’oublier pas d’apprendre une compétence que tu pourras
                    monétiser plus tard pour avoir des revenus et pourquoi pas faire un second métier </p>
            </div>

        </div>
        <div class="row g-5 mt-1">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">
                    DÉVELOPPEMENT WEB, MOBILE,PROGRAMMATION OU JUSTE PROTOCOLE RÉSEAU ?
                </h1>
                <p>Rend toi sur ses sites pour suivre des cours dans le but d’avoir dans un premier temps des bases
                    solides
                    par la suite fait tes recherches et surtout ne doute pas a mettre des fonds si tu juges
                    important la
                    CONNAISSANCE délivré et exerce toi en permanence pour être au TOP!</p>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">S'abonner</a>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <img class="img-fluid rounded w-75 align-self-end" src="{{ asset('front/img/draw1.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
<!-- Appointment Start -->
<div class="container-xxl py-5">
    <div class="container bg-light rounded">
        <div class="row g-5">
            <div class="col-md-12 text-center">
                <p>Rends-toi sur des sites tels que <b>Coursera</b>, <b>OpenClassroom</b>, il en existe des
                    centaines mais celles-ci sont gratuites.

                    Pour suivre des cours en fonction de tes préférences et petit anecdote Si tu veux juste un
                    document prouvant que tu as suivi tel ou tel cours, tu cesses d'apprendre et tu recherches
                    uniquement le papier, tout comme à l'université où l'on obtient un diplôme sans forcément avoir
                    acquis les compétences nécessaires. Ne tombe pas dans le piège du diplôme !</p>

                <h6><a href="" class="btn btn-warning mb-3">Je m'abonne maintenant</a></h6>
            </div>
        </div>

    </div>
</div>
@livewire('front.blog.bog-component')
@endsection
