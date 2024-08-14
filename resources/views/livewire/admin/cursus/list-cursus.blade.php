<div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">

        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('admin.cursus.create')}}" class='btn btn-primary'>Ajouter un cursus</a>
        </h5>
        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Ecole</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($cursuss as $cursus)
                <tr>
                    <td>{{$cursus->name}}</td>
                    <td>{{$cursus->school->school}}_{{$cursus->school->city}}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.cursus.update', $cursus->id) }}" name='modifier'
                            class=' btn btn-primary'><i class='bi bi-pencil-square'></i></a href="">
                        <a href="{{ route('admin.cursus.delete', $cursus->id) }}" class=' btn btn-danger'
                            name='supprimer'><i class='bi bi-trash-fill'></i></a href="">
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">
                        <img src="{{asset('nodata.svg')}}" alt="" height="100px">
                        <br>
                        <span>Acun cursus n'a ete trouver</span>
                    </td>
                </tr>
               @endforelse
        </table>
        <!-- End Table with stripped rows -->
    </div>
</div>
