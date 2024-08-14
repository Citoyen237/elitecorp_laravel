<div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">

        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('admin.stream.create')}}" class='btn btn-primary'>Ajouter une filiere</a>
        </h5>
        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Niveau</th>
                    <th>Cursus</th>
                    <th>Ecole</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($streams as $stream)
                <tr>
                    <td>{{$stream->name}}</td>
                    <td>{{$stream->level ? $stream->level->name : 'non trouver'}}</td>
                    <td>{{$stream->curriculum ? $stream->curriculum->name : 'non trouver'}}</td>
                    <td>{{$stream->school->school}}_{{$stream->school->city}}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.stream.update', $stream->id) }}" name='modifier'
                            class=' btn btn-primary'><i class='bi bi-pencil-square'></i></a href="">
                        <a href="{{ route('admin.stream.delete', $stream->id) }}" class=' btn btn-danger'
                            name='supprimer'><i class='bi bi-trash-fill'></i></a href="">
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <img src="{{asset('nodata.svg')}}" alt="" height="100px">
                        <br>
                        <span>Acun cursus n'a ete trouver</span>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
    </div>
</div>
