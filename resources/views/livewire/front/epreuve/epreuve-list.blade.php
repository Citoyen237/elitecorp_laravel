<div class="row">
    <div class="col-md-4 border p-4">
        {{-- <form wire:submit.prevent="get_search_school">
            <div class="input-group mb-3">
                <input wire:model='searchSchool' name="searchSchool" placeholder="Rechercher une ecole..." type="text" class="justify-content-center form-control"
                    aria-label="Example text with button addon" aria-describedby="button-addon1">
                <button class="btn btn-primary" id="button-addon1"><i class="fa fa-search"></i></button>
            </div>
        </form> --}}
        @forelse ($schools as $school)
        <div class="tree">
            <ul>
                <li>
                    {{-- school-cursus --}}
                    @if (!$school->curriculum->isEmpty())
                    <span class="caret"><i class="fa fa-folder"></i> {{$school->school}}_{{$school->city}} </span>
                    <ul class="nested">
                        @foreach ($school->curriculum as $cursus)
                        @if (!$cursus->levels->isEmpty())
                        {{-- school-cursus-level --}}
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"><i class="fa fa-folder"></i>{{$cursus->name}}</span>
                            <ul class="nested">
                                @foreach ($cursus->levels as $level)
                                @if (!$level->streams->isEmpty())
                                     {{-- school-cursus-level-stream --}}
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"><i
                                    class="fa fa-folder"></i> {{$level->name}}</span>
                                    <ul class="nested">
                                        @foreach ($level->streams as $stream)
                                        {{-- school-cursus-level-stream-test --}}
                                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="caret text-primary"> <i class="fa fa-folder"></i>
                                                <button wire:click.prevent='get_school_cursus_level_stream({{$stream->id}})' class="btn btn-lick text-primary">
                                                    {{$stream->name}}
                                                </button>
                                            </span>
                                        </li>
                                        @endforeach
                                    </ul>
                                @else
                                    {{-- school-cursus-level-test --}}
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret text-primary"><i
                                        class="fa fa-folder"></i>
                                        <button class="btn btn-lick text-primary" wire:click.prevent='get_epreuve_level({{$level->id}})'>
                                            {{$level->name}}
                                        </button>
                                    </span>
                                @endif
                                @endforeach
                            </ul>
                        @else
                           @if (!$cursus->streams->isEmpty())
                             {{-- school-cursus-stream --}}
                             <li>&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"><i class="fa fa-folder"></i>{{$cursus->name}}</span>
                                <ul class="nested">
                                    @foreach ($cursus->streams as $stream)
                                    {{-- school-cursus-stream-test --}}
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret text-primary"><i
                                        class="fa fa-folder"></i>
                                        <button wire:click.prevent='get_school_cursus_level_stream({{$stream->id}})' class="btn btn-lick text-primary">
                                            {{$stream->name}}
                                        </button>
                                    </span>
                                    @endforeach
                                </ul>
                           @else
                             {{-- school-cursus-test --}}
                             <li>&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret text-primary"><i class="fa fa-folder"></i>
                                <button class="btn btn-lick text-primary" wire:click.prevent='get_epreuve_cursus({{$cursus->id}})'>
                                    {{$cursus->name}}
                                </button>
                            </span>
                           @endif
                        @endif
                        @endforeach

                </li>
            </ul>
            @else
                @if (!$school->levels->isEmpty())
                {{-- school-level --}}
                <span class="caret"><i class="fa fa-folder"></i> {{$school->school}}_{{$school->city}} </span>
                <ul class="nested">
                    @foreach ($school->levels as $level)
                    @if (!$level->streams->isEmpty())
                    {{-- school-level-stream --}}
                    <li>&nbsp;&nbsp;&nbsp;
                        <span class="caret"> <i class="fa fa-folder"></i> {{$level->name}}</span>
                        <ul class="nested">
                            @foreach ($level->streams as $stream)
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret text-primary"><i
                                class="fa fa-folder text-primary"></i>
                                <button class="btn btn-lick text-primary" wire:click.prevent='get_school_cursus_level_stream({{$stream->id}})'>
                                    {{$stream->name}}
                                </button>
                            </span>
                            @endforeach
                        </ul>
                    </li>
                    @else
                    {{-- school-level-test --}}
                    <li>&nbsp;&nbsp;&nbsp;
                        <span class="caret text-primary"> <i class="fa fa-folder"></i>
                            <button class="btn btn-lick text-primary" wire:click.prevent='get_epreuve_level({{$level->id}})'>
                                {{$level->name}}
                            </button>
                        </span>
                    </li>
                    @endif
                    @endforeach
                </ul>
                @else
                {{-- school-test --}}
                <span class="caret text-primary"><i class="fa fa-folder"></i>
                    <button class="btn btn-lick text-primary" wire:click.prevent='get_epreuve_school({{$school->id}})'>
                        {{$school->school}}_{{$school->city}}
                    </button>
                </span>
                @endif
            @endif
        </div>
        @empty
        <img  class="text-center" src="{{asset('nodata.svg')}}" alt="" height="100px">
        <br>
        <span class="text-center">Acun ecole n'a ete trouver</span>
        @endforelse
        <div class="pagination pagination-sm">
            {{ $schools->links() }}
        </div>
    </div>
    <div class="col-md-8 border p-4">
        <form wire:submit.prevent="get_search">
            <div class="input-group mb-3">
                <input wire:model='search' name="search" placeholder="Rechercher une epreuve..." type="text" class="justify-content-center form-control"
                    aria-label="Example text with button addon" aria-describedby="button-addon1">
                <button class="btn btn-primary" id="button-addon1"><i class="fa fa-search"></i></button>
            </div>
        </form>
        <div class="row p-1">
            @if ($error_message)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h5>{{$error_message}}!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @else
            @forelse ($epreuves as $epreuve)
             <div class="col-md-4">
                 <div class="card mb-3" style="max-width: 540px;">
                     <div class="row g-0">
                         <div class="col-md-4">
                             <img src="{{ asset('front/img/PDF_file.png' )}}" class="img-fluid rounded-start"
                                 alt="...">
                         </div>
                         <div class="col-md-8">
                             <div class="card-body">
                                @auth
                                 <button class="btn btn-link" wire:click.prevent='download({{$epreuve->id}})'><h6 class="card-title">{{$epreuve->name}}_{{$epreuve->year}}</h6></button>
                                 @else
                                    <h6 class="card-title">{{$epreuve->name}}_{{$epreuve->school->slug}}</h6>
                                    <p class="text-danger"><a href="{{ route('login')}}">Connectez-vous</a> avant de pouvoir telecharger l'epreuve!</p>
                                 @endauth
                                 <p class="card-text"><small class="text-body-secondary">{{ \Carbon\Carbon::parse($epreuve->created_at)->diffForHumans()}}</small></p>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="pagination pagination-sm">
                    {{-- {{ $epreuves->links() }} --}}
                </div>
             </div>
             @empty
             <img src="{{asset('nodata.svg')}}" alt="" height="100px">
                <br>
                <span class="text-center">Acun epreuve n'a ete trouver</span>
            @endforelse
         </div>
         @endif
    </div>
</div>

