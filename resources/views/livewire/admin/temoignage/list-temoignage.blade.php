<div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">

        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('admin.temoignage.create')}}" class='btn btn-primary'>Ajouter un temoignage</a>
        </h5>
        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Proffession</th>
                    <th>Message</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($temoignages as $temoignage)
                <tr>
                    <td>{{$temoignage->name}}</td>
                    <td>{{$temoignage->proffession}}</td>
                    <td>{{$temoignage->message}}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.temoignage.update', $temoignage->id) }}" name='modifier'
                            class=' btn btn-primary'><i class='bi bi-pencil-square'></i></a href="">
                        <a href="{{ route('admin.temoignage.delete', $temoignage->id) }}" class=' btn btn-danger'
                            name='supprimer'><i class='bi bi-trash-fill'></i></a href="">
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <img src="{{asset('nodata.svg')}}" alt="" height="100px">
                        <br>
                        <span>Acun temoignage n'a ete trouver</span>
                    </td>
                </tr>
               @endforelse
        </table>
        <!-- End Table with stripped rows -->
    </div>
</div>

