<div class="card-body">
    <table class="table datatable">
        <thead>
            @if (empty($orders) || $orders->isEmpty())
            <tr>
                <td colspan="5" class="text-center">
                    <img src="{{asset('nodata.svg')}}" alt="" height="100px">
                    <br>
                    <span>Acun abonnement n'a ete trouver</span>
                </td>
            </tr>
            @else
            <tr>
                <th>Nom utilisateur</th>
                <th>Ecole</th>
                <th>Date de debut</th>
                <th>Date expiration</th>
                <th>Status</th>
                {{-- <th class="text-center">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)

            @foreach($order->items as $item)
            <tr>
                <td>{{ $order->user->name }}, {{ $order->user->prenom }}</td>
                <td>{{$item->spack->school->school}}_{{$item->spack->school->city}}</td>
                <td>{{ $item->created_at->format('d/m/Y H:s') }}</td>
                <td>{{ $item->expiration_date->format('d/m/Y H:s')}}</td>
                <td>


                    @if ($item->expiration_date->isPast())
                    <span class="badge rounded-pill bg-danger">expire</span>
                    @else
                    <span class="badge rounded-pill bg-success">en cour</span>
                    @endif


                </td>
                {{-- <td class="text-center">
                    <a href="" class=' btn btn-primary'><i class='bi bi-pencil-square'></i></a>
                    <a href="" class=' btn btn-danger' name='supprimer'><i class='bi bi-trash-fill'></i></a>
                </td> --}}
            </tr>
            @endforeach
            @endforeach
        </tbody>
        @endif


    </table>

    <!-- End Table with stripped rows -->
</div>
