<div class="row">
    <table class="table">
        <thead>
            @if (empty($orders) || $orders->isEmpty())
            <tr>
                <td colspan="5" class="text-center">
                    <img src="{{asset('nodata.svg')}}" alt="" height="100px">
                    <br>
                    <span>Vous n'avez aucun abonnement</span>
                </td>
            </tr>
            @else
            <tr class="text-primary">
                <th>Abonnement</th>
                <th>Ecoles associes</th>
                <th>Date de debut</th>
                <th>Date expiration</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)

            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->spack->title }}</td>
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
                {{-- {% comment %} <td class="text-center">
                    <a href="" class=' btn btn-primary'><i class='bi bi-pencil-square'></i></a>
                    <a href="" class=' btn btn-danger' name='supprimer'><i class='bi bi-trash-fill'></i></a>
                </td> {% endcomment %} --}}
            </tr>
            @endforeach
            @endforeach
            @endif
        </tbody>
    </table>
</div>
