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
                    <th>Email</th>
                    <th>Messages</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($messages as $message)
                <tr>
                    <td>
                        @if($message->is_read)
                        {{$message->email}}
                        @else
                        <h6 wire:click='isRead({{$message}})' class="text-primary">{{$message->email}}</h6>
                        @endif
                    </td>
                    </td>
                    <td>{{$message->message}}</td>

                    <td>
                        @if ($message->is_read)
                        <h4><i class="bi bi-check2-all text-success"></i></h4>
                        @else
                        <h4><i class="bi bi-check-lg"></i></h4>
                        @endif
                    </td>

                    <td class="text-center">
                        <a href="{{route('admin.message.repondre', $message->id)}}" name='modifier' class=' btn btn-primary'><i class='bi bi-pencil-square'></i></a
                            href="">
                        <a href="{{route('admin.message.delete', $message->id)}}" class=' btn btn-danger' name='supprimer'><i class='bi bi-trash-fill'></i></a href="">
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
