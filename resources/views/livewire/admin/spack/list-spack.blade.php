<div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">

        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card-body">
        <h5 class="card-title">
          <a href="{{route('admin.spack.create')}}" class=' btn btn-primary'>Ajouter un Abonnement</a>
        </h5>
        <!-- Table with stripped rows -->
        <table class="table datatable">
          <thead>
            <tr>
              <th>Titre</th>
              <th>Ecole</th>
              <th>Prix(FCFA)</th>
              <th>Ancien prix(FCFA)</th>
              <th>Duree</th>
              <th>Utilisateur</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>

            @forelse($spacks as $spack)

            <tr>
              <td>{{$spack->title}}</td>
              <td>{{$spack->school->school}}</td>
              <td>{{number_format($spack->prix, 2, ',', '.')}}</td>
              <td>{{number_format($spack->old_price, 2, ',', '.')}}</td>
              <td>{{$spack->duree}}</td>
              <td>{{$spack->user->name}}</td>
              <td class="text-center">
                  <a href="{{ route('admin.spack.update', $spack->id)}}"  class=' btn btn-primary'><i class='bi bi-pencil-square'></i></a>
                  <a href="{{ route('admin.spack.delete', $spack->id)}}"  class=' btn btn-danger' name='supprimer'><i class='bi bi-trash-fill'></i></a>
              </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">
                    <img src="{{asset('nodata.svg')}}" alt="" height="100px">
                    <br>
                    <span>Acun abonnement n'a ete trouver</span>
                </td>
            </tr>
            @endempty
              </table>
        <!-- End Table with stripped rows -->
      </div>
</div>
