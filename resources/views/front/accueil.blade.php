@extends('front.appf')
@section('title', 'Accueil')
@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">AMÉLIORE TES
                    <span class="text-primary"> CONNAISSANCES </span>ET <span class="text-primary"> RÉUSSIS
                        TON CONCOURS !!!</span>
                </h1>
                <p>Parce que toi aussi tu mérites d’atteindre tes objectifs nous
                    mettons à ta disposition Tout le nécessaire pour apprendre
                    efficacement et Intergre un cursus Académique D’ÉLITE grâce
                    a notre SUIVI! ainsi être la voie par excellence!!</p>
               <center><a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="{{route('abonnement.abonnement')}}">S'abonner</a></center>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <img class="img-fluid rounded w-75 align-self-end" src="{{ asset( 'front/img/banner2.png')}}" alt="">
                    <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="{{ asset( 'front/img/banner1.png')}}"
                        alt="" style="margin-top: -25%;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Services</p>
            <h1>ELITECORP VOUS OFFRE</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-light rounded h-100 p-5 text-center">
                    <div class="d-inline-flex align-items-center  justify-content-center bg-white rounded-circle mb-4"
                        style="width: 65px; height: 65px;">
                        <i class="fa fa-graduation-cap text-primary fs-4"></i>
                    </div>
                    <h5 class="borber mb-3 text-center">PRÉPARATION INTENSIVE</h5>
                    <h6>Par nos <span class="text-primary"> ÉQUIPES</span> </h6>
                    <p class="mb-4">Groupes WhatsApp de préparation intensive aux CONCOURS avec nos enseignants et
                        les autres élèves et étudiant(e)s de votre niveau en nombre limité !</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-light rounded h-100 p-5 text-center">
                    <div class="d-inline-flex align-items-center  justify-content-center bg-white rounded-circle mb-4"
                        style="width: 65px; height: 65px;">
                        <i class="fa fa-file-pdf text-primary fs-4"></i>
                    </div>
                    <h5 class="borber mb-3 text-center">ÉPREUVES ET CORRIGES</h5>
                    <h6>des <span class="text-primary">ÉCOLES & FACULTÉS</span></h6>
                    <p class="mb-4">
                        ÉPREUVES des différents établissements du pays avec les CORRECTIONS des anciens sujets du
                        CONCOURS.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item bg-light rounded h-100 p-5 text-center">
                    <div class="d-inline-flex align-items-center  justify-content-center bg-white rounded-circle mb-4"
                        style="width: 65px; height: 65px;">
                        <i class="fa fas fa-file-video text-primary fs-4"></i>
                    </div>
                    <h5 class="borber mb-3 text-center">COURS DÉTAILLÉS</h5>
                    <h6>en <span class="text-primary">PDF et VIDEOS</span></h6>
                    <p class="mb-4">
                        ÉPREUVES des différents établissements du pays avec les CORRECTIONS des anciens sujets du
                        CONCOURS.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
<!-- Appointment Start -->
<div class="container-xxl py-5">
    <div class="container bg-light rounded">
        <div class="row g-5">
            <div class="col-md-12 text-center">
                <h1>Qu'attends-tu pour rejoindre les autres ?</h1>
                <h4>Rejoins sans plus tarde les autres élèves et étudiant(e)s du pays</h4>
                <h6 class="text-center">
                    Ton <b>NOM</b> en <b>NOIR sur la liste</b>, <span class="text-primary"><b>NOTRE MISSION</b></span>!
                    Nous t’accompagnons dans cette mission !
                </h6>
                <h6><a href="{{route('abonnement.abonnement')}}" class="btn btn-warning mb-3">Je m'abonne maintenant</a></h6>
            </div>
        </div>

    </div>
</div>
<!-- Appointment End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Témoignages</p>
            <h1>Ce qui nos etudiants disent !</h1>
        </div>
        @livewire('front.temoignage')
    </div>
</div>
@livewire('front.blog.bog-component')
<!-- Testimonial End -->

<!-- Team Start -->
{{-- <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Blog</p>
            <h1>Nos actualités</h1>
        </div>
        {% comment %} <div class="row g-4"> {% endcomment %}
            <div class="row row-cols-1 row-cols-md-4 g-4">
                {% for article in articles %}

                <div class="col">
                    <div class="card h-100 wow fadeInUp" data-wow-delay="0.1s">
                        <img src="{{ article.image.url }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{article.titre}}</h5>
                            <p class="card-text">{{article.description|truncatewords:10}}</p>
                            <p class="card-text">Publié il y’ à {{article.created_at|timesince}}</p>
                        </div>
                        <div class="card-footer bg-light">
                            <a href="{% url 'article.detail' article.id %}" class="text-center">
                               <h6>Lire la suite</h6> </a>
                        </div>
                    </div>
                </div>
                {% empty %}

                {% endfor %}
            </div>
        </div>
    </div>
</div> --}}
    <!-- Team End -->
@endsection
