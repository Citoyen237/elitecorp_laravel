<!-- Table with stripped rows -->
<table class="table datatable">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Categorie</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($articles as $item)
        <tr>
            <td>{{$item->title}}</td>
            <td>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 15))}}</td>
            <td>{{$item->category->name}}</td>
            <td class="text-center">
                <a href="{{route('admin.blog.article.delete', $item->id)}}" class='btn btn-danger'><i class='bi bi-trash-fill'></i></a>
                <a href="" class=' btn btn-primary'><i class='bi bi-pencil-square'></i></a>

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">
                <img src="{{asset('nodata.svg')}}" alt="" height="100px">
                <br>
                <span>Acune article n'a ete trouver</span>
            </td>
        </tr>
        @endforelse
</table>
<!-- End Table with stripped rows -->
