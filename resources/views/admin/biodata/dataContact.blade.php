<div class="table-responsive pt-2 pb-2 mb-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Social</th>
                <th scope="col">Contact</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contact as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->profile_id }}</td>
                    <td>{{ $item->social_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a id="{{ $item->id }}" class="btn btn-warning editContact" data-bs-toggle="modal" data-bs-target="#ModalEdit" style="color: white;"><i class="bi bi-pencil-square"></i></a>
                        <a id="{{ $item->id }}" class="btn btn-danger border-0 deleteContact"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>

