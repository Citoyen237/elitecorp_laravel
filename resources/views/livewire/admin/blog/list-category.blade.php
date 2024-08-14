<div>
    <table class="table datatable">
        <thead>
            <tr>
                <th>Nom de la categorie</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>

            @forelse($categories as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td class="text-center">
                    <a href="{{ route('admin.blog.categories.edit', $item->id) }}" class=' btn btn-primary'><i
                            class='bi bi-pencil-square'></i></a>
                    <a href="{{ route('admin.blog.categories.delete', $item->id) }}" class=' btn btn-danger'>
                            <i class='bi bi-trash-fill'></i></a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center">
                    <img src="{{ asset ('nodata.png')}}" alt="" height="100px">
                    <br>
                    <span>Acune categorie n'a ete trouver</span>
                </td>
            </tr>
            @endforelse
    </table>
</div>
