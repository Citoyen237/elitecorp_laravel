<div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">

        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('admin.cour.create')}}" class='btn btn-primary'>Ajouter un cour</a>
        </h5>
        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Utilisateur</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($cours as $cour)
                <tr>
                    <td>{{$cour->name}}</td>
                    <td>{{$cour->description}}</td>
                    <td>{{$cour->user->prenom}},{{$cour->user->name}}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.cour.update', $cour->id) }}" name='modifier'
                            class=' btn btn-primary'><i class='bi bi-pencil-square'></i></a href="">
                        <a href="{{ route('admin.cour.delete', $cour->id) }}" class=' btn btn-danger'
                            name='supprimer'><i class='bi bi-trash-fill'></i></a href="">
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <img src="{{asset('nodata.svg')}}" alt="" height="100px">
                        <br>
                        <span>Acun cour n'a ete trouver</span>
                    </td>
                </tr>
               @endforelse
        </table>
        <!-- End Table with stripped rows -->
    </div>
</div>

