@php
use App\Models\Article;
$articles = Article::orderBy('created_at', 'desc')->take(10)->get();
@endphp
  <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
        class="bi bi-arrow-up"></i></a>
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <img class="text-light" src="{{ asset('front/img/logo.PNG') }}" alt="" width="60%" height="30%">
                    <p class="mb-2">Parce que toi aussi tu mérites d’atteindre tes objectifs nous  mettons à ta disposition Tout le nécessaire pour apprendre efficacement et Intergre un cursus Académique D’ÉLITE grâce a notre SUIVI! ainsi être la voie par excellence!!</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Dernières actualités</h5>
                    @foreach ($articles as $article)
                    <a class="btn btn-link" href="{{route('blog.detail', $article)}}">{{$article->title}}</a>
                    @endforeach


                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Contact</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Douala, Cameroun</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+237 659 151 405</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>contact@elitecorp.org</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Suivez-nous !</h5>
                    <div class="d-flex pt-2">
                        {{-- <a class="btn btn-outline-light btn-social rounded-circle" href=""><i
                                class="fab fa-twitter"></i></a> --}}
                        <a class="btn btn-outline-light btn-social rounded-circle" target="_blank" href="https://www.facebook.com/profile.php?id=61557162144371"><i
                                class="fab fa-facebook-f"></i></a>
                        {{-- <a class="btn btn-outline-light btn-social rounded-circle" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i
                                class="fab fa-linkedin-in"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                        <center>Copyright © 2024 elitecorp.org</center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
