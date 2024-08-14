<div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
    @foreach ($temoignages as $temoignage )
    <div class="testimonial-item text-center">
        <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4"
            src="{{Storage::url($temoignage->image)}}" style="width: 100px; height: 100px;">
        <div class="testimonial-text rounded text-center p-4">
            <p>{{$temoignage->message}}</p>
            <h5 class="mb-1">{{$temoignage->name}}</h5>
            <span class="fst-italic">{{$temoignage->proffession}}</span>
        </div>
    </div>
    @endforeach
</div>

