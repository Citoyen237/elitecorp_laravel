<div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">

        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('admin.test.create')}}" class='btn btn-primary'>Ajouter une epreuve</a>
        </h5>
        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th>Nom_annee</th>
                    <th>Filiere</th>
                    <th>Niveau</th>
                    <th>Cursus</th>
                    <th>Ecole</th>
                    {{-- abreviation ecole --}}
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($tests as $test)
                <tr>
                    <td>{{$test->name}}_{{$test->year}}</td>
                    <td>{{$test->stream ? $test->stream->name : 'non trouver'}}</td>
                    <td>{{$test->level ? $test->level->name : 'non trouver'}}</td>
                    <td>{{$test->curriculum ? $test->curriculum->name : 'non trouver'}}</td>
                    <td>{{$test->school->school}}_{{$test->school->city}}</td>
                    <td class="text-center">
                        {{-- <a href="{{ route('admin.test.update', $test->id) }}" name='modifier'
                            class=' btn btn-primary'><i class='bi bi-pencil-square'></i></a href=""> --}}
                        <a href="{{ route('admin.test.delete', $test->id) }}" class=' btn btn-danger'
                            name='supprimer'><i class='bi bi-trash-fill'></i></a href="">
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">
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
