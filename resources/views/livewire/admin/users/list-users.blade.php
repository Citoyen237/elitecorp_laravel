<div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">

        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <!-- Table with stripped rows -->


            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Nom & Prenom</th>
                        <th>Email</th>
                        <th>Email-verifier</th>
                        <th>Telephone</th>
                        <th>Role</th>
                        <!-- <th>Status</th> -->
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{$user->name}},{{$user->prenom}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->telephone}}</td>
                        <td>
                            @if($user->is_admin)
                            <span class="badge rounded-pill bg-warning">admin</span>
                            @else
                            <span class="badge rounded-pill bg-success">Simple</span>
                            @endif
                        </td>
                        <td class="text-center">

                            @if($user->is_admin)
                            <button type="submit" title="Désactiver le compte " class="btn btn-success">
                                <i class="bi bi-unlock-fill"></i>
                            </button type="submit">
                            @else
                            @if($user->is_active)
                            <button type="submit" title="Désactiver le compte " wire:click="isActive({{ $user }})"
                                class="btn btn-success">
                                <i class="bi bi-unlock-fill"></i>
                            </button type="submit">
                            @else
                            <button type="submit" title="Activer le compte" wire:click="isActive({{ $user }})"
                                class="btn btn-outline-danger">
                                <i class="bi bi-lock-fill"></i>
                            </button type="submit">
                            @endif
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            <img src="{{asset('nodata.svg')}}" alt="" height="100px">
                            <br>
                            <span>Acun utilisateur n'a ete trouver</span>
                        </td>
                    </tr>
                    @endforelse

            </table>

            <!-- End Table with stripped rows -->
        </div>
    </div>

</div>
