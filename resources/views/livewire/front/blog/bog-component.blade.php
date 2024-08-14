<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Blog</p>
            <h1>Nos actualités</h1>
        </div>
        {{-- {% comment %} <div class="row g-4"> {% endcomment %} --}}
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($articles as $article)
                <div class="col">
                    <div class="card h-100 wow fadeInUp" data-wow-delay="0.1s">
                        <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{ implode(' ', array_slice(explode(' ', $article->description), 0, 15))}} ...</p>
                            <p class="card-text">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans()}}</p>
                        </div>
                        <div class="card-footer bg-light">
                            <a href="{{route('blog.detail', $article)}}" class="text-center">
                               <h6>Lire la suite</h6> </a>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ article.image.url }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>{{article.titre}}</h5>
                            <p class="">Lorem ipsum dolor sit amet consectetur </p>
                            <div class="team-social text-center">
                                <a class="btn btn-warning" href="{% url 'ale.detail' %}">Lire la suite</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @endforeach
            </div>
        </div>
    </div>
</div>
